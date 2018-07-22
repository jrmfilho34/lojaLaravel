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
    return view('welcome',['dado' => '1']);
})->name('welcome');
Route::get('/produtos', function () {
    return view('produtos',['dado'=> '2']);
})->name('produtos');
Route::get('/carinho', function () {
    return view('carinho',['dado'=> '3']);
})->name('carinho');

/*Route::get('/feminino', function () {
    return view('Categoria Feminino.feminino',['dado' => '1']);
})->name('feminino');*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/postar','AdminController@armazenar')->name('postar');
Route::get('/categorias', 'CategoriaController@index')->name('feminino');
Route::get('/publicacoes', 'PublicacoesController@buscar')->name('publicacoes');
Route::get('/deletar/{id}', 'PublicacoesController@deletar')->name('deletar');
Route::get('/editar/{id}', 'PublicacoesController@editar')->name('editar');
Route::post('/edicao', 'AdminController@upload')->name('edicao');
Route::get('/imagens', function () {
    return view('usuario.imagens');
})->name('imagens');

Route::get('/postagens', function () {
    return view('Admin.postagens');
})->name('postagens');
