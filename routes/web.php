<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('login');
Route::get('/register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'customRegistration']); 
Route::post('/login', [UserController::class, 'customLogin']); 

Route::group(['middleware' => 'auth'],function(){
Route::get('dashboard', [UserController::class, 'dashboard']); 
Route::get('logout', [UserController::class, 'logout']);
Route::get('userlist', [UserController::class, 'userDashboard']);

Route::get('addtask', [UserController::class, 'userAddTask']);
Route::post('submit-form', [UserController::class, 'storeTask']);

Route::get('edit/{id}', [UserController::class, 'statusChange']);
Route::post('edit_form/{id}', [UserController::class, 'edit_status']);
});


    
    
