<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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
})->name('dashboard');

Route::get('/student/signup', function () {
    return view('students.signup');
})->name('students.signup');

Route::get('/student/signin', function () {
    return view('students.signin');
})->name('students.signin');

Route::get('/teacher', function () {
    return view('students.signin');
})->name('teacher.index');

Route::resource('/teacher', TeacherController::class)->names([
    'index' => 'teacher.index'
]);;
