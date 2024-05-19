<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExemploMail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;

/**
 * Authentication routes for the API
 *
 * This group of routes is used for authentication and authorization of the API.
 * It allows the user to login, logout, refresh and retrieve their current information.
 */
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login-api');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout-api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh-api');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api')->name('me-api');
});

Route::get('/testar-email', function () {
    $mailData = [
        'title' => 'This is Test Mail'
    ];

    Mail::to('email@example.com')->send(new ExemploMail($mailData));
    return 'E-mail enviado com sucesso!';
});

Route::get('/test', [TestController::class, 'test'])->name('test-api');
