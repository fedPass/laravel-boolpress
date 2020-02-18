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

// homepage pubblica
Route::get('/','HomeController@index')->name('public.home');
//pagina pubblica visualizzazione post
Route::get('/blog','PostController@index')->name('blog');

Auth::routes();
//pagine relative alla gestione dei post
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');
});
