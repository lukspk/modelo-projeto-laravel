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
        Route::post('/restrito/submenus/get-dados-redirecionamento', 'SubmenusController@getDadosRedirecionamento')->name('menus.submenus.get.dados.redirecionamento');
        Route::post('/restrito/submenus/set-dados-redirecionamento', 'SubmenusController@setDadosRedirecionamento')->name('menus.submenus.set.dados.redirecionamento');
        Route::get('/restrito', 'RestritoController@index');
        Route::get('/restrito/menus/{menu}/submenus', 'SubmenusController@index')->name('menus.submenus.index');
        Route::get('/restrito/menus/{menu}/submenus/create', 'SubmenusController@create')->name('menus.submenus.create');
        Route::post('/restrito/menus/{menu}/submenus', 'SubmenusController@store')->name('menus.submenus.store');
        Route::resource('/restrito/menus', 'MenusController');
        Route::get('/restrito/perfil', 'UserController@openPerfilUser')->name('open.perfil.user');
        Route::resource('/restrito/usuarios', 'UserController');
//        Route::get('/restrito/menus', 'MenusController@index')->name('menu.primario.index');
//        Route::get('/restrito/menus/create', 'MenusController@create')->name('menu.primario.create');
//        Route::post('/restrito/menus/store', 'MenusController@store')->name('menu.primario.store');

        Route::resource('restrito/configuracao','ConfigurationController');
    });
});

Route::group(['namespace' => 'Publico','as' => 'publico.'], function () {
    Route::get('/{url}','SiteController@index')->name('site.index');
    Route::get('/{url}/{menu}','SiteController@menusSecundarios')->name('site.menus.secundarios');
    Route::get('/{url}/{menu}/email','SiteController@formularioEmail')->name('site.menus.secundarios.formulario.email');
    Route::post('/{url}/{menu}/send-mail','SiteController@sendMail')->name('site.menus.secundarios.send.email');
});
//Route::get('/restrito', function() {
//    return view('welcome');
//})->name('restrito')->middleware('auth');
