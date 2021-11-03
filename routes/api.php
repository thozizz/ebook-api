<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
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

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/Book', [BookController::class, 'index']);
Route::get('/Book/{id}', [BookController::class, 'show']);
Route::get('/Author', [AuthorController::class, 'index']);
Route::get('/Author/{id}', [AuthorController::class, 'show']);

//protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('Book', BookController::class)->except('create', 'edit', 'show','index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('Author', AuthorController::class)->except('create', 'edit', 'show', 'index');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});