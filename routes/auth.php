<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name("login");
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

    Route::get('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('password.update');
});


