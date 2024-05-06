<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FriendController;
use App\Http\Controllers\Api\SchoolController;

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/schools',[SchoolController::class,'index']);

Route::middleware('api-auth')->group(function () {
    Route::apiResource('/friends',FriendController::class)->only(['index','show']);
    Route::get('/profile',[UserController::class,'index']);
    Route::get('/edit-profile',[UserController::class,'showProfile']);
    Route::post('/edit-profile',[UserController::class,'updateProfile']);
    Route::patch('/edit-password',[UserController::class,'updatePassword']);
});