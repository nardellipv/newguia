<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function() {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});


Auth::routes();


//web
Route::get('/', 'HomeController@index')->name('home');

Route::view('/contacto', 'web.contact.contact')->name('contact');
Route::view('/terminos', 'web.contact.term')->name('term');
Route::view('/privacidad', 'web.contact.policity')->name('policity');

Route::get('/blog/listado', 'BlogController@listBlog')->name('list.blog');
Route::get('/blog/{slug}', 'BlogController@postBlog')->name('post.blog');
Route::get('/post/like/{id}', 'BlogController@postBlogLike')->name('postBlog.like');

Route::post('/newsletter/add', 'NewsLetterController@add')->name('newsletter.add');

Route::get('/recetas', 'RecipeController@listRecipes')->name('list.recipes');
Route::get('/recetas/{slug}', 'RecipeController@recipes')->name('recipes');
Route::get('/recetas/like/{id}', 'RecipeController@recipeLike')->name('recipe.like');


//emails
Route::post('/mailcustomers/{id}', 'EmailController@MessageClientToCommerce')->name('MessageClientToCommerce');
Route::post('/contacto/sendMail', 'EmailController@MailContactToSite')->name('MailContactToSite');

// comercio perfil
Route::get('votes_positive/{slug}', 'CommerceController@positive')->name('positive');
Route::get('/productos/{slug}', 'CommerceController@listProduct')->name('list.productCommerce');
Route::get('/comercios', 'ListingController@index')->name('listing.index');
Route::get('/comercios/{slug}', 'ListingController@searchProvince')->name('listing.searchProvince');
Route::get('/{slug}', 'CommerceController@index')->name('name.commerce');