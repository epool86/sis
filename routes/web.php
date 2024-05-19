<?php

use Illuminate\Support\Facades\Route;

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

/***
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
//show
//edit
//delete
***/

Route::get('/', function(){ return view('welcome'); })->name('welcome');
Auth::routes(); //login, register

Route::group(['middleware' => ['auth']], function(){

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	//student
	Route::group([
		'as' => 'student.', //route name
	], function(){
		Route::resource('enrollment', 'App\Http\Controllers\Student\EnrollmentController');
	});

	//admin
	Route::group([
		'middleware' => ['admin'], //middleware name
		'prefix' => 'admin', //url prefix
		'as' => 'admin.', //route name
	], function(){
		Route::resource('student', 'App\Http\Controllers\StudentController');
		Route::resource('course', 'App\Http\Controllers\CourseController');
		Route::get('/deleted/course', [App\Http\Controllers\CourseController::class, 'indexRestore'])->name('course.restore');
		Route::get('/deleted/course/{course}', [App\Http\Controllers\CourseController::class, 'indexRestorePost'])->name('course.restore.post');
		Route::get('/enrollment', [App\Http\Controllers\EnrollmentController::class, 'index'])->name('enrollment.index');
	});

});
