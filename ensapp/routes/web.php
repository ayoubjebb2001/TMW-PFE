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

Route::get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::get('/', function () {
    return view('students.index');
})->name('home');

Route::get('signup', function () {
    return view('students.signup');
})->name('students.signup');

Route::get('signin', function () {
    return view('students.signin');
})->name('students.signin');

Route::get('/teacher', function () {
    return view('students.signin');
})->name('teacher.index');


// Teachers Routes:

Route::resource('/teacher', TeacherController::class)->names([
    'index' => 'teacher.index'
]);

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

Route::get('/teacher/edit', [TeacherController::class, 'edit'])->name('teacher.edit');

