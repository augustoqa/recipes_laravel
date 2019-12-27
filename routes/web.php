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

Route::prefix('recipe-classes')->group(function () {
    Route::get('/', 'RecipeClassController@index')
        ->name('recipe-classes');

    Route::get('{id}', 'RecipeClassController@show')
        ->name('recipe-classes.show');

    Route::get('create', 'RecipeClassController@create')
        ->name('recipe-classes.create');

    Route::post('/', 'RecipeClassController@store')
        ->name('recipe-classes.store');

    Route::get('{id}/edit', 'RecipeClassController@edit')
        ->name('recipe-classes.edit');

    Route::put('{id}/update', 'RecipeClassController@update')
        ->name('recipe-classes.update');

    Route::delete('{id}/delete', 'RecipeClassController@delete')
        ->name('recipe-classes.delete');
});

// recipes routes
Route::prefix('recipes')->group(function () {
    Route::get('/', 'RecipeController@index')->name('recipes');

    Route::get('create', 'RecipeController@create')->name('recipes.create');

    Route::get('{recipe}', 'RecipeController@show')->name('recipes.show');

    Route::post('/', 'RecipeController@store')->name('recipes.store');

    Route::get('{recipe}/edit', 'RecipeController@edit')->name('recipes.edit');

    Route::patch('{recipe}', 'RecipeController@update')->name('recipes.update');

    Route::delete('{recipe}', 'RecipeController@delete')->name('recipes.delete');
});