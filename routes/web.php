<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware' => 'guest'], function() {
    // register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    // login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');



// });


// logout
Route::group(['middleware' => 'auth'], function(){
    // home
    Route::get('/home', [HomeController::class, 'index'])->name('category.list');
    // admin
    // ================== implement category route
    Route::get('/category', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    // update
    Route::get('/category/{categoryId}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{categoryId}', [CategoryController::class, 'update'])->name('category.update');
    // delete
    Route::delete('/category/{categoryId}', [CategoryController::class, 'destroy'])->name('category.delete');



    // ================== implement class feature and route
    Route::get('/class', [ClassController::class, 'index'])->name('class.list');
    // class create
    Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
    Route::post('/class', [ClassController::class, 'store'])->name('class.store');
    // class edit
    Route::get('/class/{classId}/edit', [ClassController::class, 'edit'])->name('class.edit');
    Route::put('/class/{classId}', [ClassController::class, 'update'])->name('class.update');
    // class delete
    Route::delete('/class/{classId}', [ClassController::class, 'destroy'])->name('class.delete');
    // class search
    Route::get('/class/search', [ClassController::class, 'search'])->name('search');

    // ================== implement student feature and route
    Route::get('/student', [StudentController::class, 'index'])->name('student.list');
    // student create
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    // student edit
    Route::get('/student/{studentId}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{studentId}', [StudentController::class, 'update'])->name('student.update');
    // student delete
    Route::delete('/student/{studentId}', [StudentController::class, 'destroy'])->name('student.delete');
    // student search
    // Route::get('/student/search', ['StudentController@search']);
    Route::get('/student/search', [StudentController::class, 'search'])->name('search');

    // ================== implement attendance and route
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.list');
    // attendance create
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    // attendance edit
    Route::get('/attendance/{attendanceId}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::put('/attendance/{attendanceId}', [AttendanceController::class, 'update'])->name('attendance.update');
    // attendance delete
    Route::delete('/attendance/{attendanceId}', [AttendanceController::class, 'destroy'])->name('attendance.delete');
    // attendance search
    Route::get('/attendance/search', [AttendanceController::class, 'search'])->name('search');
    // logout
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
