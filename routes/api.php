<?php

use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('books', BookController::class);

// Route::get('/books', [BookController::class,'index']);
// Route::post('/books', [BookController::class,'store']);
// Route::get('/books/{book}', [BookController::class,'show']);
// // update
// Route::put('/books/{book}', [BookController::class, 'update']);
// // delete
// Route::delete('/books/{book}', [BookController::class, 'destroy']);


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('me', [AuthenticationController::class, 'me'])->middleware('auth:sanctum');
Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');