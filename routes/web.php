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
//ogni slug ha la sua pagina
Route::get('/blog/{slug}','PostController@show')->name('blog.show');
//pagina con form contatti
Route::get('/contatti', 'HomeController@contatti')->name('contatti');
//pagina che riceve i dati del form contatti
Route::post('/contatti', 'HomeController@contattiStore')->name('contatti.store');
//pagina di conferma invio messaggio da form contatti
Route::get('/thanks','HomeController@thanks')->name('thanks');
//ogni categoria ha la sua pagina
Route::get('/blog/category/{slug}','PostController@showCategory')->name('blog.category');
//ogni tag ha la sua pagina
Route::get('/blog/tag/{slug}','PostController@showTag')->name('blog.tag');

//impedisce la registrazione, solo admin può aggiungere users (eventualmente tramite CRUD su UserController)
Auth::routes(['register'=>false]);

//pagine relative alla gestione dei post
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');
});
