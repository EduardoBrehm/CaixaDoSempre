<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextGeneratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/generate-text', [TextGeneratorController::class, 'generate']);

