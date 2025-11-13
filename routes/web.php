<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Comment Route
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Patients Route (public)
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

// // Dashboard (protected)
// Route::get('/dashboard', [PatientController::class, 'index'])
//     ->middleware('auth')->name('dashboard');

// Language Routes
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        cookie()->queue('locale', $locale, 60 * 24 * 365); // حفظ لمدة سنة
    }
    return redirect()->back();
})->name('lang.switch');
