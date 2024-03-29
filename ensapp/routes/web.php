<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;

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
    return view('dashboard');
})->name('dashboard');


Route::resource('user', UserController::class);
Route::resource('module', ModuleController::class);
Route::resource('course',CourseController::class);
Route::resource('inscription', InscriptionController::class);
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'authenticate'])->name('authenticate');
Route::get('/teacher/signup',[TeacherController::class,'signup'])->name('teacher.signup');
Route::get('/student/signup',[StudentController::class,'signup'])->name('student.signup');
Route::get('/logout', [userController::class,'logout'])->name('logout')->middleware('auth');
Route::resource('teacher', TeacherController::class);
Route::resource('student',StudentController::class);