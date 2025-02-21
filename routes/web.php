<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextGeneratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapsuleController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/generate-text', [TextGeneratorController::class, 'generate']);

// Rotas de Autenticação
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    // Rotas de Recuperação de Senha
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas das Cápsulas
    Route::get('/capsules/create', [CapsuleController::class, 'create'])->name('capsules.create');
    Route::post('/capsules', [CapsuleController::class, 'store'])->name('capsules.store');
});
