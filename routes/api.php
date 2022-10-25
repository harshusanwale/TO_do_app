<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;



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
Route::post('login', [UserController::class, 'customLogin']);
Route::post('register', [UserController::class, 'customRegistration']);
Route::group(['middleware' => 'auth:api'],function(){ 
Route::post('todo/add', [TaskController::class, 'addTask']);
Route::post('todo/status', [TaskController::class, 'statusChange']);
});

