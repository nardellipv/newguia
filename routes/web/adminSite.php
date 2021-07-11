<?php

use Illuminate\Support\Facades\Route;

//admin client
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', 'AdminClient\ProfileController@index')->name('profile');

    Route::get('/perfil/actualizar', 'AdminClient\ProfileController@updateData')->name('profile.updateData');
    Route::post('/perfil/actualizar/{id}', 'AdminClient\ProfileController@update')->name('profile.update');

    Route::get('/perfil/recetas', 'AdminClient\RecipeController@create')->name('recipe.create');
    Route::post('/perfil/recetas/crear', 'AdminClient\RecipeController@addCreate')->name('recipe.addCreate');

    Route::get('/perfil/nuevo-comercio', 'AdminClient\CommerceController@create')->name('commerce.create');
    Route::post('/perfil/nuevo-comercio/paso-1', 'AdminClient\CommerceController@addCommerceStep1')->name('commerce.addCommerceStep1');
    Route::get('/perfil/nuevo-comercio/paso-2/crear', 'AdminClient\CommerceController@createCommerceStep2')->name('commerce.createCommerceStep2');
    Route::get('/perfil/nuevo-comercio/provincia', 'AdminClient\CommerceController@chooseProvince')->name('commerce.chooseProvince');
    Route::post('/perfil/nuevo-comercio/paso-2', 'AdminClient\CommerceController@addCommerceStep2')->name('commerce.addCommerceStep2');
});
