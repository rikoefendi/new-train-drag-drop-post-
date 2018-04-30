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


Route::get('demos/tasks','DemoController@showTasks');
Route::patch('demos/tasks/{id}', 'DemoController@updateTasksStatus');
Route::put('demos/tasks/updateAll', 'DemoController@updateTasksOrder');


Route::get('/post', 'PostController@index');
Route::get('/post/{id}', 'PostController@show');
Route::delete('/post/{id}', 'PostController@destroy');

Route::post('/post', 'PostController@store');
Route::post('/post/{id}', 'PostController@update');
