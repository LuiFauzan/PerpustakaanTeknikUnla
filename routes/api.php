<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaApiController;
use App\Http\Controllers\UsersApiController;
use App\Http\Controllers\UserBooksController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('books', CobaApiController::class);
Route::get('/books',[CobaApiController::class,'index']);
Route::apiResource('users', UsersApiController::class);
Route::get('/users',[UsersApiController::class,'index']);
