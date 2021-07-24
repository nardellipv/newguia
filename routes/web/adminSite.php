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

    Route::get('/perfil/editar-comercio/{slug}', 'AdminClient\CommerceController@updateCommerce')->name('commerce.update');
    Route::post('/perfil/editar-comercio/paso-1/{slug}', 'AdminClient\CommerceController@editCommerceStep1')->name('commerce.editCommerceStep1');
    Route::get('/perfil/editar-comercio/paso-2/modificar', 'AdminClient\CommerceController@updateCommerceStep2')->name('commerce.updateCommerceStep2');
    Route::get('/perfil/editar-comercio/provincia', 'AdminClient\CommerceController@chooseEditProvince')->name('commerce.chooseEditProvince');
    Route::post('/perfil/editar-comercio/paso-2/{slug}', 'AdminClient\CommerceController@updateCommerceStep2')->name('commerce.updateCommerceStep2');

    Route::get('/perfil/editar-comercio/borrar-caracteristica/{id}', 'AdminClient\CommerceController@deleteCharacteristic')->name('commerce.deleteCharacteristic');
    Route::get('/perfil/editar-comercio/borrar-pago/{id}', 'AdminClient\CommerceController@deletePayment')->name('commerce.deletePayment');

    Route::get('/perfil/productos', 'AdminClient\ProductController@list')->name('product.list');
    Route::get('/perfil/nuevo-producto', 'AdminClient\ProductController@addNew')->name('product.addNew');
    Route::post('/perfil/agregar-producto', 'AdminClient\ProductController@storeNew')->name('product.storeNew');
    Route::get('/perfil/editar-producto/{id}', 'AdminClient\ProductController@editProduct')->name('product.edit');
    Route::post('/perfil/actualizar-producto/{id}', 'AdminClient\ProductController@updateProduct')->name('product.update');
    Route::get('/perfil/eliminar-producto/{id}', 'AdminClient\ProductController@deleteProduct')->name('product.delete');

    Route::get('/perfil/mensajes', 'AdminClient\MessageController@list')->name('message.list');
});
