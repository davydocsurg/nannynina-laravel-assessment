<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// fetch all users
Route::get('all-users', [UserController::class, 'fetchAllUsers']);

// fetch only verfied users
Route::get('verified-users', [UserController::class, 'fetchVerifiedUsers']);

// fetch only older users
Route::get('older-users', [UserController::class, 'fetchOlderUsers']);

// fetch only African users
Route::get('african-users', [UserController::class, 'fetchAfricanUsers']);

// fetch users by gender
Route::get('users-by-gender', [UserController::class, 'fetchUsersByGender']);
