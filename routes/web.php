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

Route::pattern('id', '[0-9]+');

Route::get('/recipe-classes', 'RecipeClassController@index')
    ->name('recipe-classes');

Route::get('/recipe-classes/{id}', 'RecipeClassController@show')
    ->name('recipe-classes.show');

Route::get('/recipe-classes/create', 'RecipeClassController@create')
    ->name('recipe-classes.create');

Route::post('/recipe-classes', 'RecipeClassController@store')
    ->name('recipe-classes.store');

Route::get('/recipe-classes/{id}/edit', 'RecipeClassController@edit')
    ->name('recipe-classes.edit');

Route::put('/recipe-classes/{id}/update', 'RecipeClassController@update')
    ->name('recipe-classes.update');

Route::delete('/recipe-classes/{id}/delete', 'RecipeClassController@delete')
    ->name('recipe-classes.delete');
