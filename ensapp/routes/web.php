<?php

use App\Models\Module;
use App\Models\Filiere;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Inscription;
use App\Models\DepartmentChief;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\DepartmentChifController;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class,'login'])->name('login');
    Route::post('/login', [UserController::class,'authenticate'])->name('authenticate');
    Route::resource('student',StudentController::class);
});

Route::get('/home', [StudentController::class,'index'])->name('home')->middleware('auth','checkRole:student, chef, teacher');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [userController::class,'logout'])->name('logout');
   
});

Route::resource('inscription', InscriptionController::class)->middleware('auth','checkRole:student');

Route::middleware(['auth', 'checkRole:teacher,chef'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dash'])->name('dashboard');

    Route::resource('module', ModuleController::class);
    Route::resource('course',CourseController::class);
    //
    Route::resource('filiere', FiliereController::class);
    Route::resource('teacher', TeacherController::class);

});

Route::middleware(['auth', 'checkRole:chef'])->group(function () {

    Route::resource('chef',DepartmentChifController::class);
    Route::get('/module/create/{id}', [ModuleController::class, 'create'])->name('module.create');
    Route::get('modules/{module}/edit/{id}', [ModuleController::class, 'edit'])->name('module.edit');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('course/create/{id}', [CourseController::class, 'create'])->name('course.create');
    Route::get('list_inscription', [InscriptionController::class, 'list'])->name('inscription.list');
    Route::post('list_inscription/action', [InscriptionController::class, 'action'])->name('inscription.action');
    Route::get('list_students', [InscriptionController::class, 'students'])->name('inscription.students');
    
});

// Route::resource('user', UserController::class);

// Route::get('/student/signup',[StudentController::class,'signup'])->name('student.signup');

// Route::get('/teacher/signup',[TeacherController::class,'signup'])->name('teacher.signup');
// Route::get('/student/signup',[StudentController::class,'signup'])->name('student.signup');
// Route::get('/logout', [userController::class,'logout'])->name('logout')->middleware('auth');
// Route::resource('teacher', TeacherController::class);
// Route::resource('student',StudentController::class);