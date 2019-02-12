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

//rutas accessibles slo si el usuario no se ha logueado
//Route::group(['middleware' => 'guest'], function () {

	Auth::routes();
//});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
//Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@welcome')->name('inicio');
	Route::get('/', 'HomeController@index')->name('entrar');

//});

//rutas accessibles solo para el usuario administrador
//Route::group(['middleware' => 'usuarioAdmin'], function () {
	

	Route::resource('examens','ExamenController')->middleware('usuarioAdmin');

	Route::resource('preguntas','PreguntaController')->middleware('usuarioAdmin');

	Route::get('/preguntasIndex/{id}', 'PreguntaController@indexE')->name('indexE')->middleware('usuarioAdmin');
	
	Route::resource('users', 'UserController')->middleware('usuarioAdmin');

//});

//rutas accessibles solo para el usuario standard
//Route::group(['middleware' => 'usuarioStandard'], function () {	

	Route::get('/examen/{id}', 'HomeController@examen')->name('examen');

	//Route::get('/home', 'controladorApp@home')->name('home');

	Route::get('/iniciarExamen/{id}','HomeController@iniciarExamen')->name('iniciarExamen');

//});