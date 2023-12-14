<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Student;
use App\Models\ExportReport;
use App\Models\Book;
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

class ReportController extends Controller
{
public function index(Request $request){

    $student = Student::where(['isDeleted'=>0])->get();
    $book = Book::where(['isDeleted'=>0])->get();
    $requ = $request->all();
    $filter = [];

     if (!empty($request->studentid)) {
        $filter['studentid'] = $request->studentid;
      }
      if (!empty($request->bookid)) {
        $filter['bookid'] = $request->bookid;
      }


    
    $list = Takebook::whereHas('student',function ($q){
        $q->where(['isDeleted'=>0]);
        })
        ->whereHas('book',function ($q){
        $q->where(['isDeleted'=>0]);
        })->where($filter)->where(function ($q) use($requ){
        if (!empty($requ['from_date'])) {
            $q->where('created_at','>=',date("Y-m-d H:i:s",strtotime($requ['from_date'])).' 00:00:00');
        }
        if (!empty($requ['to_date'])) {
            $q->where('created_at','<=',date("Y-m-d H:i:s",strtotime($requ['to_date'])).' 23:59:59');
        }
        })->orderBy('id', 'DESC')
        ->paginate(3);
        $list->appends($requ)->links();
    return view('report.takebook',compact('list','filter','student','book','requ'));
}

public function export(Request $request){
    $requ = $request->all();
    $filter = [];

     if(!empty($request->studentid)) {
        $filter['studentid'] = $request->studentid;
      }
      if (!empty($request->bookid)) {
        $filter['bookid'] = $request->bookid;
      }


    
    $list = Takebook::whereHas('student',function ($q){
        $q->where(['isDeleted'=>0]);
        })
        ->whereHas('book',function ($q){
        $q->where(['isDeleted'=>0]);
        })->where($filter)->where(function ($q) use($requ){
        if (!empty($requ['from_date'])) {
            $q->where('created_at','>=',$requ['from_date'].' 00:00:00');
        }
        if (!empty($requ['to_date'])) {
            $q->where('created_at','<=',$requ['to_date'].' 23:59:59');
        }
        })->get();
        return Excel::download(new ExportReport(['list'=>$list,'filter'=>$filter,"viewpage" => "takebookexport"]), 'Takebook-Listing.xlsx');

}
}
