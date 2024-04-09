<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AtteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! */

Route::middleware('auth')->group(function () {
    Route::get('/', [AtteController::class, 'index']);
    Route::post('/workstart', [AtteController::class, 'workstart']);
    Route::post('/workend', [AtteController::class, 'workend']);
    Route::post('/breakstart', [AtteController::class, 'breakstart']);
    Route::post('/breakend', [AtteController::class, 'breakend']);
    Route::get('/sumsearch', [AtteController::class, 'sumsearch']);
    Route::post('/sumresearch', [AtteController::class, 'sumresearch']);
});
