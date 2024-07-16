<?php

use App\Http\Controllers\BlogController;
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


Route::resource('blogs', BlogController::class);

///** Получение всех записей */
//Route::get('index', [BlogController::class,'index']);
//
///** Добавление записи*/
//Route::post('add', [BlogController::class,'store']);
//
///** Редактирование записи по id */
//Route::put('edit/{id}', [BlogController::class,'update']);
//
///** Удаление записи по id */
//Route::delete('delete/{id}', [BlogController::class,'destroy']);
