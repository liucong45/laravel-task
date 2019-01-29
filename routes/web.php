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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ProjectsController@index');
Route::resource('projects', 'ProjectsController');
Route::get('tasks/search', 'TasksController@search')->name('tasks.search');
Route::get('tasks/chart','TasksController@chart')->name('tasks.chart');
Route::post('tasks/{id}/check','TasksController@check')->name('tasks.check');
Route::resource('tasks', 'TasksController');
Route::post('tasks/{task}/steps/complete','StepController@completeAll')->name('steps.complete');
Route::post('tasks/{task}/steps/{step}/toggle','StepController@toggle')->name('steps.toggle');
Route::resource('tasks.steps', 'StepController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
