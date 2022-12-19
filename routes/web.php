<?php

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

Route::get('/twitter/login', [App\Http\Controllers\MyPageController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/twitter/login', [App\Http\Controllers\MyPageController::class, 'login'])
    ->middleware('guest');

Route::get('/twitter/callback', [App\Http\Controllers\MyPageController::class, 'callback']);


Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');