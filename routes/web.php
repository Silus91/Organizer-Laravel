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
Route::patch('cards{card}/collections/{collection}/tasks/{task}/completed', 'TasksController@completed');

Route::get('cards', 'CardsController@index');
Route::get('cards/create', 'CardsController@create');
Route::post('cards', 'CardsController@store');
Route::get('cards/{card}', 'CardsController@show');
Route::get('cards/{card}/edit', 'CardsController@edit');
Route::patch('cards/{card}', 'CardsController@update');
Route::delete('cards/{card}', 'CardsController@destroy');

Route::resource('cards.collections', 'CollectionsController');

Route::resource('cards.collections.tasks', 'TasksController');

Auth::routes();

Route::get('/', 'HomeController@index');
