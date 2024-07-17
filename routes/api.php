<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Задание 1. CRUD для Блога
Route::resource('blogs', BlogController::class);

// Задание 2. Отправка сообщения на почту
Route::post('mail',[UserController::class,'sendMail']);

// Задание 3. Отправка сообщения в телеграм
Route::post('telegram',[UserController::class,'sendTelegram']);

