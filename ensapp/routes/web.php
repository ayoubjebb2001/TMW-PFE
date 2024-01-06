<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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
    return view('index');
});

// Show register Teacher Form
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

// Store Teacher Data
Route::post('/teacher', [TeacherController::class, 'store']);

// Show Teacher Login form 
Route::get('/teacher/signin', [TeacherController::class,'login'])->name('teacher.login')->middleware('guest');

// Show Edit Teacher Form
Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->middleware('auth');

// Update Teacher
Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->middleware('auth');

// Delete Teacher
Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->middleware('auth');

 
// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Log In User
Route::post('/authenticate', [UserController::class, 'authenticate']);

// Show register student Form
Route::get('/student/create', [StudentController::class, 'create'])->name('student.signup');

// Store student Data
Route::post('/student', [StudentController::class, 'store']);

// Show student Login form 
Route::get('/student/signin', [StudentController::class,'login'])->name('student.login')->middleware('guest');

// Show Edit student Form
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->middleware('auth');

// Update student
Route::put('/student/{student}', [StudentController::class, 'update'])->middleware('auth');

// Delete student
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->middleware('auth');
