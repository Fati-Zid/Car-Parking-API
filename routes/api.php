<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Authentication;
use App\Http\Middleware\Authenticate;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', Authentication\RegisterController::class);
Route::post('auth/login', Authentication\RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [Authentication\ProfileController::class, 'show']);
    Route::put('profile', [Authentication\ProfileController::class, 'update']);
    Route::put('password', Authentication\PasswordUpdateController::class);
    Route::put('logout', Authentication\LogoutController::class);
});
