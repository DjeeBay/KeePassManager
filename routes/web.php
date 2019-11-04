<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/user', 'UserController');
    Route::resource('/category', 'CategoryController');

    Route::post('/icon/add', 'IconController@add');
    Route::resource('/icon', 'IconController');

    Route::get('/keepass/import/', 'KeepassController@getImport')->name('keepass.get_import');
    Route::get('/keepass/{category_id}', 'KeepassController@get')->name('keepass.get');
    Route::delete('/keepass/{category_id}/delete/{id}', 'KeepassController@delete')->name('keepass.delete');
    Route::post('/keepass/{category_id}/save', 'KeepassController@save')->name('keepass.save');
    Route::post('/keepass/import', 'KeepassController@import')->name('keepass.import');

    Route::get('/historic/index', 'HistoricController@index')->name('historic.index');
    Route::get('/historic/restore/{id}', 'HistoricController@restore')->name('historic.restore');
});
