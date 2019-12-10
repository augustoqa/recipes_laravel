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

Route::get('/recipe-classes', 'RecipeClassController@index');

Route::get('/recipe-classes/{id}', 'RecipeClassController@show')
    ->where('id', '[0-9]+');

Route::get('/recipe-classes/create', 'RecipeClassController@create');

Route::post('/recipe-classes', 'RecipeClassController@store');

Route::get('/recipe-classes/{id}/edit', 'RecipeClassController@edit');

Route::put('/recipe-classes/{id}/update', 'RecipeClassController@update');

Route::delete('/recipe-classes/{id}/delete', 'RecipeClassController@delete');
