<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('employees/{id?}', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('employees', [\App\Http\Controllers\EmployeeController::class, 'create']);
Route::put('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'delete']);

Route::get('posts/{id?}', [\App\Http\Controllers\PostsController::class, 'getPost']);
Route::post('posts', [\App\Http\Controllers\PostsController::class, 'create']);
Route::put('posts/{id}', [\App\Http\Controllers\PostsController::class, 'update']);
Route::delete('posts/{id}', [\App\Http\Controllers\PostsController::class, 'delete']);
