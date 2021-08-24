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

Route::resource('noticias', 'NoticiaController');

Route::get('/', function () {
    $noticias = DB::table('noticias')
        ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
        ->where('noticias.estatus', 1)
        ->select('noticias.*', 'categorias.descripcion as categoriadescripcion')
        ->get();
    return view('welcome', ['noticias' => $noticias]);
});
Route::get('/show/{id}', function ($id) {
    $noticia = DB::table('noticias')
        ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
        ->where('noticias.id', $id)
        ->select('noticias.*', 'categorias.descripcion as categoriadescripcion')
        ->first();
    return view('show', ['noticia' => $noticia]);
});
