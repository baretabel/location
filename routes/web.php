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

Route::get('/', 'MainController@home');

Route::get('/resa/{id}', 'MainController@show');

Route::get('/new', 'MainController@resa');

Route::get('/car', 'MainController@voiture');

Route::post('/form', 'MainController@create');

Route::post('/resa', 'MainController@reser');

Route::get('/sup/{id}', 'MainController@sup');

Route::get('/del/{id}', 'MainController@del');

Route::get('/val/{id}', 'MainController@val');

Route::post('/mod', 'MainController@modif');

Route::get('/list', 'MainController@reservations');