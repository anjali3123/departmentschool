<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Student;
use App\Models\ExportReport;
use App\Models\Book;
use App\Models\File;
use App\Models\Takebook;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Pagination\Paginator;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class FileController extends Controller
{
 
    public function index(){
         
       
        return view('file.index');
        
    }
 public function add(Request $request){

    
        $validator = Validator::make($request->all(), [
            // 'fileno' => 'required',
            'filename' => 'required|max:10240',
            'name' => 'required|max:50'
        ], [

        
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                'error' => 1,
                'vderror' => 1,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);
        }

        $data = $request->all();
        $allFile = count($request->file('filename'));

        for ($i = 0; $i < $allFile; $i++) {
            $ac = new File();
            $file = $request->filename[$i];
            $fileName = time() . '.' . $file->getClientOriginalName();
            move_uploaded_file($file->getPathName(), public_path('uploads/fileupload/' . $fileName));
            $ac->filename = $fileName;
            $ac->name = $request->name;
           
            $ac->save();
            
        }
        
      
        // for ($i = 0; $i < $allFile; $i++) {
        //     $file= $request->file('filename'.$i);
        //     echo "<pre>"; print_r($file);exit;

        //     $fileName = time() . '.' . $file->getClientOriginalName();

        //     move_uploaded_file($file->getPathName(), public_path('uploads/fileupload/' . $fileName));
        //     $ac= new File();
        //     $ac->filename = $fileName;
        // }
        // echo "<pre>";print_r($ac);exit;


        // if ($request->filename > 0) {

        //     for ($x = 0; $x < $request->filename; $x++) {
        //         $f = new File();
        //         if ($request->hasFile('filename' . $x)) {
        //             $file= $request->file('filename' . $x);

        //             // $path = $file->store('public/files');
        //             // $name = $file->getClientOriginalName();
        //             $fileName = time() . '.' . $file->getClientOriginalName();

        //             move_uploaded_file($file->getPathName(), public_path('uploads/fileupload/' . $fileName));

        //             $insert[$x]['filename'] = $fileName;
                   
        //         }
        //         echo"<pre>";print_r($insert);exit;
        //     }

        //     File::insert($insert);
            if($ac->save()){
            return response()->json(array(
                'error' => 0,
                'msg' => "file sheet has been created successfully."
            ), 200);
        }else {
            return response()->json(array(
                'error' => 1,
                'msg' => "file sheet failed to create."
            ), 200);
        }

 }

    function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_key as $val) {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }
        return $file_ary;
    }
 public function addaa(Request $request){

    echo"<pre>";print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            // 'fileno' => 'required',
            'filename' => 'required|max:10240',
            'name' => 'required|max:50'
        ], [

        
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                'error' => 1,
                'vderror' => 1,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);
        }

        $data = $request->all();
       


       
        $files = [];

        if ($request->file('filename')) {
            foreach ($request->file('filename') as $key => $file) {
                // $fileName = time().rand(1,99).'.'.$file->extension();  
                // $file->move(public_path('uploads/fileupload/'. $fileName));
                $fileName = time() . '.' . $file->getClientOriginalName();

                move_uploaded_file($file->getPathName(), public_path('uploads/fileupload/' . $fileName));

             $files[]=['filename'=> $fileName,'name'=>$request->name];
            }
        }
        // echo"<pre>";print_r($files);exit;

        File::insert($files);


        // foreach ($files as $key => $file) {
            
        //     File::create($file);
        // }
            // echo "<pre>"; print_r($file);
            // exit;
        // $os = new File();
        // $os->filename = $fileName;
        // $os->name = $request->name;
        
        if ($files) {
            
            // $audit->log($mdt,$os->toArray());
            return response()->json(array(
                'error' => 0,
                'msg' => "file sheet has been created successfully."
            ), 200);
        } else {
            return response()->json(array(
                'error' => 1,
                'msg' => "file sheet failed to create."
            ), 200);
        }

 }
}