<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Takebook;
use App\Models\Student;
use App\Models\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class TakebookController extends Controller
{

 public function index(Request $request){
    $student = Student::where(['isDeleted'=>0])->get();
    $book = Book::where(['isDeleted'=>0])->get();
    $library = User::where('id',$request->id)->get();
    $takebook = Takebook::where('id',$request->id)->first();
    return view('takebook.index',compact('student','book','library','takebook'));
 }

 public function add(Request $request){
    $validator = Validator::make($request->all(), [
     
        'studentid' =>[ 'required',function ($attribute, $value, $fail){
          $student = Student::find($value);
          $st = DB::table('takebooks')->where('studentid',$value)->where('status',0)->count() >= 2;
          if($student->id = $st ){
              $fail('This student already taken two book.');
          }
        }],
        'bookid' => ['required',function ($attribute, $value, $fail){
          $book = Book::find($value);
          $c = DB::table('takebooks')->where('bookid',$value)->where('status',0)->count(); 
          if ($book->stock <= $c) {
              $fail('The book not available.');
          }
      }],
        'to_date' => 'required|after_or_equal:today',
      ], [
        'bookid.required' => 'The Book field is required.',
        'studentid.required' => 'The student field is required.',
        'to_date.required' => 'The Date field is required.',
      ]);
      if ($validator->fails()) {
        return response()->json(array(
          'error' => 1,
          'vderror' => 1,
          'errors' => $validator->getMessageBag()->toArray(),
        ), 200);
      }

      $takebook =new Takebook();
      $takebook->studentid =$request->studentid;
      $takebook->bookid = $request->bookid;
      $takebook->libraryid = Auth::user()->id;
      $takebook->to_date = $request->to_date;
      
    //   $takebook->save();
      if ($takebook->save()) {
        return response()->json(array(
          'error' => 0,
          'msg' => "Take Book has been created successfully."
        ), 200);
      } else {
        return response()->json(array(
          'error' => 1,
          'msg' => "Take Book failed to create."
        ), 200);
      }
   
 }
 public function status(Request $request)
  {

    $takebook = Takebook::where('id', $request->id)->first();
    // echo"<pre>";print_r($takebook);exit;
    if ($takebook) {
      if ($takebook->status) {
        $takebook->status = 0;
      } else {
        $takebook->status = 1;
      }
      $takebook->return_date =date("Y-m-d H:i:s") ;
      $takebook->save();
      return response()->json(array(
        'error' => 0,
        'msg' => "Take book  status has been changed successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Take book status failed to change."
      ), 200);
    }
  }
 public function list(Request $request){
    if (!$request->ajax()) {
        return response()->json([
          "status" => "fail",
          "message" => "Bad Request."
        ], 401);
      }
  
      $list = Takebook::whereHas('student',function ($q){
                                $q->where(['isDeleted'=>0]);
                                })
                                ->whereHas('book',function ($q){
                                $q->where(['isDeleted'=>0]);
                                })->get();
      return datatables($list)
      ->addIndexColumn()
        ->addColumn('studentid',function($row){
        return (empty($row->student->fname)?'':$row->student->fname).' '.(empty($row->student->lname)?'':$row->student->lname);
        })
        ->addColumn('bookid',function($row){
            return empty($row->book->name)?'':$row->book->name;
        })
        ->addColumn('to_date',function($row){
          return empty($row->to_date)?'':(date("d-m-Y",strtotime($row->to_date)));
          })
          ->addColumn('status', function ($row) {
            if ($row->status) {
              return '<button type="button" id="btn_red"  class="btn btn-sm btn-green text-white"  onclick="disable('.($row->id).')">Return</button>';
            } else {
              return '<button type="button"  class="btn btn-sm btn-red text-white" onclick="changestatus('.($row->id).')">Isuue</button>';
            }
          })
        ->addColumn('action', function ($row) {
            $btn = '';
          if ($row->status != 1) {
            $btn .= '<button type="button" onclick="edit(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class="far fa-edit" aria-hidden="true"></i></button>';
        }else{
          $btn .= '<button type="button" onclick="view(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class=" fas fa-eye" aria-hidden="true"></i></button>';
        }
          return $btn;
        })
        ->rawColumns(['action', 'status','bookid','studentid'])
        ->make(true);
    }

   
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentid' => 'required',
            // 'studentid' =>[ 'required',function ($attribute, $value, $fail){
            //   $student = Student::find($value);
            //   $st = DB::table('takebooks')->where('studentid',$value)->where('status',0)->count() >= 2;
            //   if($student->id = $st ){
            //       $fail('This student already taken two book.');
            //   }
            // }],
            // 'bookid' => 'required',
            'bookid' => ['required',function ($attribute, $value, $fail){
              $book = Book::find($value);
              $c = DB::table('takebooks')->where('bookid',$value)->where('status',0)->count(); 
              if ($book->stock <= $c) {
                  $fail('The book not available.');
              }
          }],
            'to_date'=> 'required|after_or_equal:today'
           
        ],[
          'bookid.required' => 'The Book field is required.',
          'studentid.required' => 'The student field is required.',
          'to_date.required' => 'The Date field is required.',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                'error' => 1,
                'vderror' => 1,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);
        }
            $takebook = Takebook::where('id',$request->id)->first();
            $takebook->studentid=$request->studentid;
            $takebook->bookid = $request->bookid;
            $takebook->to_date = $request->to_date;
            $takebook->libraryid = Auth::user()->id;
            if($takebook->save()){
                return response()->json(array(
                    'error' => 0,
                    'msg' => " Book details has been updated successfully."
                ), 200);
            }else{
                return response()->json(array(
                    'error' => 1,
                    'msg' => "Book details failed to edit."
                ), 200);
            }
          }
  public function get(Request $request){
   $takebook = Takebook::where('id',$request->id)->with(['student','book'])->first();
    return $takebook;
  }

 }


