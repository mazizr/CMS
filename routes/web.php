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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth']],
function () {
    Route::get('/', function () {
        return view('backend.index');
    });
    route::resource('kategori','KategoriController');
    route::resource('tag','TagController');
    route::resource('artikel','ArtikelController');
}
);

Route::get('/tes', function () {
    return view('layouts.backend');
}); 

Route::group(['prefix'=>'/'],
function () {
    route::get('/','FrontendController@index');
    route::get('about','FrontendController@about');
    route::get('blog','FrontendController@blog');
    route::get('blog/{artikel}','FrontendController@singleblog');
    route::get('blog-tag/{tag}','FrontendController@blogtag');
    route::get('blog-kategori{kategori}','FrontendController@blogkategori');
}
);