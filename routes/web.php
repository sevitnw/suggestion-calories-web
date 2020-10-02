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

Route::middleware(['auth:sanctum', 'verified'])->get('/', 'Dashboard@index')->name('root');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'Dashboard@index')->name('dashboard');
Route::group(['middleware' => ['auth:sanctum', 'verified'] ], function () {
    Route::group(['prefix' => 'log-calories',], function () {
        Route::get('/', 'LogCaloriesUser@index')->name('log-calories');
        Route::post('/', 'LogCaloriesUser@store')->name('log-calories.store');
    });
});