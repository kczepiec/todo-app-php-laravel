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
    return redirect()->route('app.index');
});

Auth::routes();

Route::prefix('todo')->group(function () {
    Route::get('/', 'AppController@index')->name('app.index');
    Route::get('/create', 'TaskController@create')->name('task.create');
    Route::get('/edit/{id}', 'TaskController@edit')->name('task.edit');
    
    Route::get('/task/{id}', 'TaskController@show')->name('task.show');
    Route::put('/task/{id}', 'TaskController@update')->name('task.update');
    Route::post('/', 'TaskController@store')->name('task.store');
    Route::delete('/task/{id}/destroy', 'TaskController@destroy')->name('task.destroy');
});