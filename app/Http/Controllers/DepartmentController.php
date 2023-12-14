<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class DepartmentController extends Controller
{
  public function index()
  {
    return view('department.index');
  }

  public function add(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:50|unique:departments',
      'code' => 'required|max:50|',
      'status' => 'required',
    ], [
      // 'name.alpha_space' => 'The name must only contain letters.',
      'code.max' => 'The code must not be greater than 50 characters.',
      'code.required' => 'The code field is required.',
      'name.required' => 'The name field is required.'
    ]);
    if ($validator->fails()) {
      return response()->json(array(
        'error' => 1,
        'vderror' => 1,
        'errors' => $validator->getMessageBag()->toArray(),
      ), 200);
    }
    $department = new Department();
    $department->name = $request->name;
    $department->code = $request->code;
    $department->status = $request->status;
    if ($department->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Department has been created successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Department failed to create."
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

    $list = Department::get();
    return datatables($list)
      ->addIndexColumn()
      ->addColumn('cdate', function ($row) {
        return date('m/d/Y', strtotime($row->created_at));
      })
      ->addColumn('status', function ($row) {
        if ($row->status) {
          return '<button type="button" class="btn btn-sm btn-green text-white" onclick="changestatus('.($row->id).')">Enable</button>';
        } else {
          return '<button type="button" class="btn btn-sm btn-red text-white" onclick="changestatus('.($row->id).')">Disable</button>';
        }
      })
      ->addColumn('action', function ($row) {
        return '<button type="button" onclick="edit(' . ($row->id) . ')" class="btn btn-outline-info btn-sm mr-p5"><i class="far fa-edit" aria-hidden="true"></i></button>
        <button type="button" onclick="departdeleted(' . ($row->id) . ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt" aria-hidden="true"></i></button>';
      })
      ->rawColumns(['action', 'status'])
      ->make(true);
  }
  public function get(Request $request)
  {
    return  Department::where('id', $request->id)->first();
  }

  public function edit(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:50|',
      'code' => 'required|max:50|',
      'status' => 'required',
    ], [
      // 'name.alpha_space' => 'The name must only contain letters.',
      'code.max' => 'The code must not be greater than 50 characters.',
      'code.required' => 'The code field is required.',
      'name.required' => 'The name field is required.'
    ]);
    if ($validator->fails()) {
      return response()->json(array(
        'error' => 1,
        'vderror' => 1,
        'errors' => $validator->getMessageBag()->toArray(),
      ), 200);
    }

    $department = Department::where('id', $request->id)->first();
    
    $department->name = $request->name;
    $department->code = $request->code;
    $department->status = $request->status;
    if ($department->save()) {
      return response()->json(array(
        'error' => 0,
        'msg' => "Department has been updated successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Department failed to update."
      ), 200);
    }
  }

  public function status(Request $request)
  {

    $department = Department::where('id', $request->id)->first();
    if ($department) {
      if ($department->status) {
        $department->status = 0;
      } else {
        $department->status = 1;
      }
      $department->save();
      return response()->json(array(
        'error' => 0,
        'msg' => "Department status has been changed successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Department status failed to change."
      ), 200);
    }
  }
  
  public function delete(Request $request){

    $department = Department::where('id',$request->id)->first();
    if($department->delete()){
      return response()->json(array(
        'error' => 0,
        'msg' => "Department has been deleted successfully."
      ), 200);
    } else {
      return response()->json(array(
        'error' => 1,
        'msg' => "Department failed to update."
      ), 200);
    }

  }
}
