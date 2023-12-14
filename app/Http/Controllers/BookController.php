<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Takebook;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
class BookController extends Controller
{

    public function index(Request $request)
  {
    $contact =Book::all();
    return view('book.index',compact('contact'));
  }

    public function add(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:50|unique:books|',
      'author' => 'required|max:50|',
      
    ], [
      // 'name.alpha_space' => 'The name must only contain letters.',
      'author.max' => 'The author must not be greater than 50 characters.',
      'author.required' => 'The author field is required.',
      'name.required' => 'The name field is required.'
    ]);
    if ($validator->fails()) {
      return response()->json(array(
        'error' => 1,
        'vderror' => 1,
        'errors' => $validator->getMessageBag()->toArray(),
      ), 200);
    }
    $book = new Book();
    $book->name = $request->name;
    $book->author = $request->author;
    
    if ($book->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Book has been created successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Book failed to create."
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

    $list = Book::where(['isDeleted'=>0])->get();
    return datatables($list)
      ->addIndexColumn()
      ->addColumn('cdate', function ($row) {
        return date('m/d/Y', strtotime($row->created_at));
      })
    
      ->addColumn('action', function ($row) {
        $btn ='';
        $btn .='<button type="button" onclick="edit(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class="far fa-edit" aria-hidden="true"></i></button>';
        if(Takebook::where(['bookid'=> $row->id])->count() == 0){
          $btn .=' <button type="button" onclick="departdeleted(' . ($row->id) . ')" class="btn btn-outline-danger btn-sm" mr-p5><i class="far fa-trash-alt" aria-hidden="true"></i></button>';
        }
        $btn .=' <button type="button" onclick="stock(' . ($row->id) . ')" class="btn btn-outline-purple btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>';
        
        return $btn;
      })
      ->rawColumns(['action', 'status'])
      ->make(true);
  }
  public function get(Request $request)
  {
    $stock = Book::where('id', $request->id)->first();
    return $stock;
  }

  public function edit(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:50|',
        'author' => 'required|max:50|',
        
      ], [
        // 'name.alpha_space' => 'The name must only contain letters.',
        'author.max' => 'The author must not be greater than 50 characters.',
        'author.required' => 'The author field is required.',
        'name.required' => 'The name field is required.'
      ]);
      if ($validator->fails()) {
        return response()->json(array(
          'error' => 1,
          'vderror' => 1,
          'errors' => $validator->getMessageBag()->toArray(),
        ), 200);
      }

    $book = Book::where('id', $request->id)->first();
  
    $book->name = $request->name;
    $book->author = $request->author;
    if ($book->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Book has been updated successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Book failed to update."
      ), 200);
    }
  }

  
  
  public function delete(Request $request){

    // $book = Book::where('id',$request->id)->first();
    if(Book::softDelete(['id'=>$request->id])){
      return response()->json(array(
        'error' => 0,
        'msg' => "Book has been deleted successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Book failed to update."
      ), 200);
    }

  }
  public function stock(Request $request){
    $stock =Book::where('id', $request->id)->first();
    return $stock;
  }

  public function addstock(Request $request)
  {
    $book = Book::where('id',$request->id)->first();
    $book->stock = $book->stock + $request->stock;
    if ($book->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Book has been added successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Book failed to added."
      ), 200);
    }
  }
}
