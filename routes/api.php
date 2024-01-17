<?php

use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobDivisiController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/jobs', JobsController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/job-divisi', JobDivisiController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/access', AccessController::class);
    Route::get('/profile', [AuthenticationController::class, 'profile']);
    Route::put('/profile/update', [AuthenticationController::class, 'editprofile']);
});