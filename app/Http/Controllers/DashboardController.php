<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class DashboardController extends Controller
{

    public function index(Request $request){
        $department = Department::get();
        return view('dashboard.home',compact('department'));
    }

    public function getdashboarddata(Request $request){


        $dashcount['users'] = User::where(['isDeleted'=>0])->count();
        $dashcount['enable_users'] = User::where(['isDeleted'=>0,'status'=> 1])->count();
        $dashcount['student'] = Student::where(['isDeleted'=>0])->count();
        $dashcount['book'] = Book::where(['isDeleted'=>0])->count();
        $dashcount['issue_book'] = Takebook::whereHas('student',function ($q){
            $q->where(['isDeleted'=>0]);
            })
            ->whereHas('book',function ($q){
            $q->where(['isDeleted'=>0]);
            })->where(['status'=> 0])->count();
        return $dashcount;
    }
}