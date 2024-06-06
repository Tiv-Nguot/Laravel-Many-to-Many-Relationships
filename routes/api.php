<?php

use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user/list',[UserController::class,'index']);
Route::get('/user/show/{id}',[UserController::class,'show']);
Route::post('/user/create',[UserController::class,'store']);
Route::put('/user/update/{id}',[UserController::class,'update']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);

Route::get('/group/list',[GroupController::class,'index']);
Route::get('/group/show/{id}',[GroupController::class,'show']);
Route::post('/group/create',[GroupController::class,'store']);
Route::put('/group/update/{id}',[GroupController::class,'update']);
Route::delete('/group/delete/{id}',[GroupController::class,'destroy']);

Route::get('/user_group/list',[UserGroupController::class,'index']);
Route::get('/user_group/show/{id}',[UserGroupController::class,'show']);
Route::post('/user_group/create',[UserGroupController::class,'store']);
Route::put('/user_group/update/{id}',[UserGroupController::class,'update']);
Route::delete('/user_group/delete/{id}',[UserGroupController::class,'destroy']);