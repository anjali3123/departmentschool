<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TakebookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard'));
   
});
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('verify', [AuthController::class, 'login'])->name('login.verify');
Route::post('post-registration', [AuthController::class, 'add'])->name('register.post'); 


Route::group(['middleware' => ['auth']], function () {
#User route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/getdashboarddata', [DashboardController::class, 'getdashboarddata'])->name('dashboard.getdashboarddata');
// Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/changepassword', [UserController::class, 'passwordchange'])->name('user.changepassword');
Route::post('/user/passwordupdate', [UserController::class, 'passwordupdate'])->name('user.passwordupdate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
#end User route


#Librarian route 
Route::get('/Librarian', [LibrarianController::class, 'librarian'])->name('librarian.index');
Route::get('/Librarian/create', [LibrarianController::class, 'create'])->name('librarian.create');
Route::post('/Librarian/add', [LibrarianController::class, 'add'])->name('librarian.add');
Route::get('/Librarian/list', [LibrarianController::class, 'list'])->name('librarian.list');
Route::get('/Librarian/get/{id}
', [LibrarianController::class, 'get'])->name('librarian.get');
Route::post('/Librarian/edit', [LibrarianController::class, 'edit'])->name('librarian.edit');
Route::post('/Librarian/status', [LibrarianController::class, 'status'])->name('librarian.status');
Route::post('/Librarian/delete', [LibrarianController::class, 'delete'])->name('librarian.delete');
#end Librarian route


#department route 
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::post('/department/add', [DepartmentController::class, 'add'])->name('department.add');
Route::get('/department/list', [DepartmentController::class, 'list'])->name('department.list');
Route::get('/department/get', [DepartmentController::class, 'get'])->name('department.get');
Route::post('/department/edit', [DepartmentController::class, 'edit'])->name('department.edit');
Route::post('/department/status', [DepartmentController::class, 'status'])->name('department.status');
Route::post('/department/delete', [DepartmentController::class, 'delete'])->name('department.delete');
#end department route


#student route 
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student/add', [StudentController::class, 'add'])->name('student.add');
Route::get('/student/list', [StudentController::class, 'list'])->name('student.list');
Route::get('/student/get', [StudentController::class, 'get'])->name('student.get');
Route::post('/student/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/status', [StudentController::class, 'status'])->name('student.status');
Route::post('/student/delete', [StudentController::class, 'delete'])->name('student.delete');
Route::post('importfile', [StudentController::class, 'importfile'])->name('importfile');



#end student route
Route::get('/file', [FileController::class, 'index'])->name('file.index');
Route::post('/file/add', [FileController::class, 'add'])->name('file.add');

#book route 
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::post('/book/add', [BookController::class, 'add'])->name('book.add');
Route::get('/book/list', [BookController::class, 'list'])->name('book.list');
Route::get('/book/get', [BookController::class, 'get'])->name('book.get');
Route::get('/book/stock', [BookController::class, 'stock'])->name('stock.get');
Route::get('/book/stockget', [BookController::class, 'stockget'])->name('stock.stockget');
Route::post('/book/edit', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book/addstock', [BookController::class, 'addstock'])->name('book.addstock');
Route::post('/book/status', [BookController::class, 'status'])->name('book.status');
Route::post('/book/delete', [BookController::class, 'delete'])->name('book.delete');
#end book route

#takebook route
Route::get('/takebook', [TakebookController::class, 'index'])->name('takebook.index');
Route::post('/takebook/add', [TakebookController::class, 'add'])->name('takebook.add');
Route::get('/takebook/list', [TakebookController::class, 'list'])->name('takebook.list');
Route::get('/takebook/get', [TakebookController::class, 'get'])->name('takebook.get');
Route::post('/takebook/edit', [TakebookController::class, 'edit'])->name('takebook.edit');
Route::post('/takebook/status', [TakebookController::class, 'status'])->name('takebook.status');
#end takebook route

Route::get('/report/takebook', [ReportController::class, 'index'])->name('report.takebook');
Route::get('/report/takebookexport', [ReportController::class, 'export'])->name('report.takebookexport');


});