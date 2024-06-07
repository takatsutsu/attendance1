<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AtteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! */

Route::middleware('auth')->group(function () {
    // メール認証済みのユーザー向けルート
    Route::middleware('verified')->group(function () {
        Route::get('/', [AtteController::class, 'index']);
        Route::post('/workstart', [AtteController::class, 'workstart']);
        Route::post('/workend', [AtteController::class, 'workend']);
        Route::post('/breakstart', [AtteController::class, 'breakstart']);
        Route::post('/breakend', [AtteController::class, 'breakend']);
        Route::get('/sumsearch', [AtteController::class, 'sumsearch']);
        Route::post('/sumresearch', [AtteController::class, 'sumresearch']);
        Route::get('/sumresearch', [AtteController::class, 'sumresearch']);
    });

    // メール認証が必要なユーザー向けルート
    Route::get('/email/verify', function () {
        return view('auth.user_thanks');
    })->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});