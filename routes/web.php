<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Signup;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;

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

Route::get('/', [Index::class, 'index']);
Route::get('/signup', [Signup::class, 'form']);
Route::post('/signup', [Signup::class, 'signup']);
Route::get('/login', [Login::class, 'form'])->name('login');
Route::post('/login', [Login::class, 'authenticate']);
Route::get('/logout', [Login::class, 'logout']);
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [Dashboard::class, 'index']);
    Route::get('/dashboard/add', [Dashboard::class, 'add']);
    Route::post('/dashboard/add', [Dashboard::class, 'addFeed']);
	Route::get('/dashboard/{feedId}', [Dashboard::class, 'readFeed']);
	Route::get('/dashboard/delete/{feedId}', [Dashboard::class, 'deleteFeed']);
});