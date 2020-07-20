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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/showAll', 'TaskController@showAll')->name('showAll');
Route::get('/uploadTask/{content}', 'TaskController@create')->name('task.create');
Route::get('/taskDone/{id}', 'TaskController@done')->name('task.done');
Route::get('/removeTask/{id}', 'TaskController@destroy')->name('task.remove');
