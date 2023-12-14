<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Student;
use App\Models\Takebook;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

use Psy\TabCompletion\Matcher\FunctionsMatcher;

class StudentController extends Controller
{
  public function index()
  {
    $department = Department::where(['status'=>1])->get(); 
    return view('student.index',compact('department'));
  }

  public function add(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'fname' => 'required|max:50|alpha_dash',
      'lname' => 'required|max:50|alpha_dash',
      'departmentid' => 'required',
      'roll_no' => 'required|unique:students',
      'gender' => 'required',
      'address' => 'required',
      'phoneno' => 'required|numeric|digits_between:6,14',
      'email' => 'required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i|max:50',
    ], [
        'roll_no' => 'The roll no field is required.',
        'departmentid.required' => 'The department field is required.',
        'fname.required' => 'The first name field is required.',
        'lname.required' => 'The last name field is required.',
        'gender.required' => 'The gender field is required.',
        'email.required' => 'The email field is required.',
        'email.regex' => 'The email must be a valid email address.',
        'phoneno.required' => 'The phone no field is required.',
        'phoneno.numeric' => 'The phone no must be a number.',
        'phoneno.digits_between' => 'The phone no must be between 6 and 14 digits.',
        'address.required' => 'The address field is required.',
    ]);
    if ($validator->fails()) {
      return response()->json(array(
        'error' => 1,
        'vderror' => 1,
        'errors' => $validator->getMessageBag()->toArray(),
      ), 200);
    }
    $student = new Student();
    $student->fname = $request->fname;
    $student->lname = $request->lname;
    $student->departmentid = $request->departmentid;
    $student->phoneno = $request->phoneno;
    $student->email = $request->email;
    $student->roll_no = $request->roll_no;
    $student->gender = $request->gender;
    $student->address = $request->address;
    if ($student->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Student has been created successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Student failed to create."
      ), 200);
    }
  }

  public function list(Request $request)
  {
    
    if (!$request->ajax()) {
      return response()->json([
        "status" => "fail",
        "message" => "Bad Request."
      ], 401);
    }

    $list = Student::whereHas('department',function ($q){
        $q->where(['status'=>1]);
    })->where(['isDeleted'=>0])->get();
    // $list = Student::get();
    // echo"<pre>";print_r($list);exit;
    return datatables($list)
      ->addIndexColumn()
     
      ->addColumn('departmentid',function($row){
        return empty($row->department->name)?'':$row->department->name;
    })
      ->addColumn('action', function ($row) {

      $btn ='' ;
      $btn .='<button type="button" onclick="edit(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class="far fa-edit" aria-hidden="true"></i></button>';
      if(Takebook::where(['studentid'=>$row->id])->count() == 0){
      $btn .='<button type="button" onclick="departdeleted(' . ($row->id) . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt" aria-hidden="true"></i></button>';
      } 
      // return '<button type="button" onclick="edit(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class="far fa-edit" aria-hidden="true"></i></button>
        // <button type="button" onclick="departdeleted(' . ($row->id) . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt" aria-hidden="true"></i></button>';
        return $btn;
      })
     
      ->rawColumns(['action', 'status'])
      ->make(true);
  }
  public function get(Request $request)
  {
    return  Student::where('id', $request->id)->first();
  }

  public function edit(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'fname' => 'required|max:50|alpha_dash',
        'lname' => 'required|max:50|alpha_dash',
        'departmentid' => 'required',
        'roll_no' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'phoneno' => 'required|numeric|digits_between:6,14',
        'email' => 'required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i|max:50',
      ], [
          'roll_no' => 'The roll no field is required.',
          'departmentid.required' => 'The department field is required.',
          'fname.required' => 'The first name field is required.',
          'lname.required' => 'The last name field is required.',
          'gender.required' => 'The gender field is required.',
          'email.required' => 'The email field is required.',
          'email.regex' => 'The email must be a valid email address.',
          'phoneno.required' => 'The phone no field is required.',
          'phoneno.numeric' => 'The phone no must be a number.',
          'phoneno.digits_between' => 'The phone no must be between 6 and 14 digits.',
          'address.required' => 'The address field is required.',
      ]);
      if ($validator->fails()) {
        return response()->json(array(
          'error' => 1,
          'vderror' => 1,
          'errors' => $validator->getMessageBag()->toArray(),
        ), 200);
      }

    $student = Student::where('id', $request->id)->first();
    $student->fname = $request->fname;
    $student->lname = $request->lname;
    $student->departmentid = $request->departmentid;
    $student->phoneno = $request->phoneno;
    $student->email = $request->email;
    $student->roll_no = $request->roll_no;
    $student->gender = $request->gender;
    $student->address = $request->address;
    if ($student->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Student has been updated successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Student failed to update."
      ), 200);
    }
  }
  public function importfile(Request $request){
    //  echo "<pre>"; print_r($data->getPathName()); exit;
  
    $file = $request->file;
    // echo "<pre>"; print_r($file->getPathName()); exit;
    
    if(($handle = fopen($file->getPathName(), 'r')) !== FALSE)
    {
      // echo "<pre>"; print_r($data); echo "</pre>";
      $i = 0;
      while(($data = fgetcsv($handle, 1000, ',')) !== FALSE)
      {
        if ($i == 0) {
          $i++;
          continue;
        }
        // $all_data =  _r($data); echo "</pre>";
        $insd = array(
          'fname' => $data[0],
          'lname' => $data[1],
          'email' => $data[2],
          'phoneno' => $data[3],
          'roll_no'=>$data[4],
          'gender' => $data[5],
          'address' => $data[6],
        );
        $insert = DB::table('students')->insert($insd);
      }
  if($insert){
      return redirect()->route('student.index')->with('showalert',['success','The file has been import']);;
  }else{
    return redirect()->route('student.index')->with('showalert',['danger','The file has been import is feil']);;
  }
    }
   
  }


//   public function status(Request $request)
//   {

//     $department = Department::where('id', $request->id)->first();
//     if ($department) {
//       if ($department->status) {
//         $department->status = 0;
//       } else {
//         $department->status = 1;
//       }
//       $department->save();
//       return response()->json(array(
//         'error' => 0,
//         'msg' => "Department status has been changed successfully."
//       ), 200);
//     } else {
//       return response()->json(array(
//         'error' => 1,
//         'msg' => "Department status failed to change."
//       ), 200);
//     }
//   }
  
  public function delete(Request $request){

    $student = Student::softDelete(['id'=>$request->id]);
   
    if($student)
    {
      return response()->json(array(
        'error' => 0,
        'msg' => "Student has been deleted successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Student failed to update."
      ), 200);
    }

  }
}
