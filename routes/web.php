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

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::redirect('/', '/restrito');

    Route::group(['namespace' => 'Restrito', 'as' => 'restrito.'], function () {
    
        Route::get('/restrito', 'RestritoController@index');
        Route::resource('/restrito/usuarios', 'UserController');
    });
});
