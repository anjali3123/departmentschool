<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Validation\Rule;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class LibrarianController extends Controller
{
    public function librarian()
    {
        $department = Department::where(['status'=>1])->get();
        return view('librarian.index',compact('department'));
    }
    public function create()
    {      
      $department = Department::where(['status'=>1])->get();
        
        return view('librarian.add',compact('department'));
    }
    public function add(Request $request)
    {  
        
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'username' => 'required|unique:users',
            'username' => ['required','max:50',
            Rule::unique('users','username')->where(function ($query){
                return $query->where('isDeleted', 0);
            }),],
            'email' => ['required','regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i','max:50',
            Rule::unique('users','email')->where(function ($query){
                return $query->where('isDeleted', 0);
            }),],
            // 'email' => 'required|max:50|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i',
            'status' => 'required',
            'departmentid' => 'required',
            'phoneno' => 'required|numeric|digits_between:6,14',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*+_-]{8,}$/',
        ], [
       
        'password.regex' => 'The password  must be have at least 8 characters long 1 uppercase & 1 lowercase character 1 number. . ',
        'phoneno.required' => 'The phone no field is required.',
        'phoneno.numeric' => 'The phone no must be a number.',
        'phoneno.digits_between' => 'The phone no must be between 6 and 14 digits.',
      ]);
      if ($validator->fails()) {
        return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
        // echo "<pre>"; print_r($request->all()); exit;
        $data = $request->all();

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->departmentid = $request->departmentid;
        $user->phoneno = $request->phoneno;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        // $user->save();
        if ($user->save()) {

          return redirect()->route('librarian.index')->with('showalert',['success','Librarian has been created successfully.']);
        }else{
            return redirect()->route('librarian.index')->with('showalert',['danger','Librarian failed to create.']);
        }
          //   return response()->json(array(
          //     'error' => 0,
          //     'msg' => "Librarian has been created successfully."
          //   ), 200);
          // } else {
          //   return response()->json(array(
          //     'error' => 1,
          //     'msg' => "Librarian failed to create."
          //   ), 200);
          // }
        }
    
        public function list(Request $request)
        {
          if (!$request->ajax()) {
            return response()->json([
              "status" => "fail",
              "message" => "Bad Request."
            ], 401);
          }
      
          $list = User::where(['isDeleted'=>0])->get();
          return datatables($list)
            ->addIndexColumn()
            ->addColumn('departmentid',function($row){
              return empty($row->department->name)?'':$row->department->name;
          })
            ->addColumn('status', function ($row) {
                if ($row->status) {
                  return '<button type="button" class="btn btn-sm btn-green text-white" onclick="changestatus('.($row->id).')">Enable</button>';
                } else {
                  return '<button type="button" class="btn btn-sm btn-red text-white" onclick="changestatus('.($row->id).')">Disable</button>';
                }
              })
            ->addColumn('action', function ($row) {
              
              return '<a href="'.route('librarian.get',($row->id)).'" class="btn btn-outline-info btn-sm mr-p5"><i class="fa fa-edit" aria-hidden="true"></i></a>
              <button type="button" onclick="departdeleted(' . ($row->id) . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt" aria-hidden="true"></i></button>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
        }
        public function get(Request $request)
        {
          $department = Department::where(['status'=>1])->get();
          $user = User::where('id', $request->id)->first();
          return view('librarian.edit',compact('user','department'));
        }
        public function status(Request $request)
      {

        $user = User::where('id', $request->id)->first();
        if ($user) {
          if ($user->status) {
            $user->status = 0;
          } else {
            $user->status = 1;
          }
          $user->save();
          return response()->json(array(
            'error' => 0,
            'msg' => "Librarian status has been changed successfully."
          ), 200);
        } else {
          return response()->json(array(
            'error' => 1,
            'msg' => "Librarian status failed to change."
          ), 200);
        }
      }

      public function edit(Request $request)
      {
        $id = User::where('id',$request->id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'username' => 'required',
            // 'email' => 'required|max:50|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i',
            'username' => ['required','max:50',
            Rule::unique('users','username')->where(function ($query){
                return $query->where('isDeleted', 0);
            })->ignore($id,'id'),],
            'email' => ['required','regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i','max:50',
            Rule::unique('users','email')->where(function ($query){
                return $query->where('isDeleted', 0);
            })->ignore($id,'id'),],
            'status' => 'required',
            'departmentid' => 'required',
            'phoneno' => 'required|numeric|digits_between:6,14',
            ], [
              'phoneno.required' => 'The phone no field is required.',
              'phoneno.numeric' => 'The phone no must be a number.',
              'phoneno.digits_between' => 'The phone no must be between 6 and 14 digits.',
            ]);
            if ($validator->fails()) {
              return redirect()
              ->back()
              ->withErrors($validator)
              ->withInput();
          }

        $user = User::where('id',$request->id)->first();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->departmentid = $request->departmentid;
        $user->phoneno = $request->phoneno;
        $user->status = $request->status;
        if ($user->save()) {
          return redirect()->route('librarian.index')->with('showalert',['success','Librarian has been updated successfully.']);
        }else{
            return redirect()->route('librarian.index')->with('showalert',['danger','Librarian failed to update.']);
        }
      }


      public function delete(Request $request){

        // $user = User::where('id',$request->id)->first();
        if(User::softDelete(['id'=>$request->id]))
        {
          return response()->json(array(
            'error' => 0,
            'msg' => "Librarian has been deleted successfully."
          ), 200);
        } else {
          return response()->json(array(
            'error' => 1,
            'msg' => "Librarian failed to update."
          ), 200);
        }

      }

}
