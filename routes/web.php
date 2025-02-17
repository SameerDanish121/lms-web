<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('forgot');
Route::get('/datacell/dashboard', function () {
    $userData = session('userData');

    // Store user ID in session for later use
    if (!empty($userData['user_id'])) {
        session(['user_id' => $userData['user_id']]);
    }

    return view('datacell_Home', compact('userData'));
})->name('datacell.dashboard');

Route::get('/admin/dashboard', function () {
    $userData = session('userData'); 

    // Store user ID in session for later use
    if (!empty($userData['user_id'])) {
        session(['user_id' => $userData['user_id']]);
    }

    return view('Admin_Home', compact('userData'));
})->name('admin.dashboard');


Route::get('/clear-session', function () {
    Session::flush(); // Clears all session data
    return response()->json(['status' => 'success', 'message' => 'Session cleared successfully.']);
});