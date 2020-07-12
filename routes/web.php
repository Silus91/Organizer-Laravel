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

Route::patch('cards/{card}/collections/{collection}/tasks/{task}/completed', 'TasksController@completed');

Route::resource('cards', 'CardsController');

Route::resource('cards.collections', 'CollectionsController');

Route::resource('cards.collections.tasks', 'TasksController');

Auth::routes();

Route::get('/', 'HomeController@index');
