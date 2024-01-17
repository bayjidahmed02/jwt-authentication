<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


Route::view('/registration', 'pages.auth.registration-page')->name('registration');
Route::view('/login', 'pages.auth.login-page')->name('login');
Route::view('/send-otp', 'pages.auth.send-otp-page')->name('send.otp');
Route::view('/verify-otp', 'pages.auth.verify-otp-page')->name('verify.otp');
Route::view('/reset-password', 'pages.auth.reset-pass-page')->name('reset.password')->middleware([TokenVerificationMiddleware::class]);
Route::view('/profile', 'pages.dashboard.profile-page')->name('profile')->middleware([TokenVerificationMiddleware::class]);
Route::view('/dashboard', 'pages.dashboard.dashboard')->name('dashboard')->middleware([TokenVerificationMiddleware::class]);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/registration', [UserController::class, 'registration']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/send-otp', [UserController::class, 'sendOTP']);
Route::post('/verify-otp', [UserController::class, 'verifyOTP']);
Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
