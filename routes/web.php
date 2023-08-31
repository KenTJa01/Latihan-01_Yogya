<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/signin', [SigninController::class, 'index'])->middleware("guest");
Route::post('/signin', [SigninController::class, 'authenticate']);

Route::post('/logout', [SigninController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);


Route::get('/student', [StudentController::class, 'index']);
Route::post('/student', [StudentController::class, 'store']);
Route::post('/student/edit', [StudentController::class, 'update']);
Route::post('/student/delete', [StudentController::class, 'delete']);

Route::get('/subject', [SubjectController::class, 'index']);
Route::post('/subject', [SubjectController::class, 'store']);
Route::post('/subject/edit', [SubjectController::class, 'update']);
Route::post('/subject/delete', [SubjectController::class, 'delete']);

Route::get('/enrollment', [EnrollmentController::class, 'index']);
Route::post('/enrollment', [EnrollmentController::class, 'store']);

Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/filter', [ReportController::class, 'filter']);
Route::get('/report/export', [ReportController::class, 'export']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'edit']);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::post('/user/edit', [UserController::class, 'update']);
