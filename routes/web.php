<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/datacell/dashboard', function () {
    return view('datacell.dashboard');
})->name('datacell.dashboard');


Route::get('/Admin', function () {
    return view('Admin_Home');
})->name('Admin.home');


Route::get('/uploadStudents', function () {
    return view('uploadStudents');
})->name('uploadStudents');

Route::get('/datacell_home', function () {
    return view('datacell_Home');
})->name('datacell.home');

Route::get('/Upload', function () {
    return view('Upload');
})->name('Upload');


Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot');

Route::get('/courses', function () {
    return view('allcourses');
})->name('courses');
Route::get('/view', function () {
    return view('dashboard');
})->name('dash');