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
Route::post('/respuesta/respondToClient', 'EmailController@respondToClient')->name('respondToClient');


//job Admin
Route::get('/register-users', 'Admin\JobController@userRegister')->name('jobUsers.register');
Route::get('/register-users-newsLetter', 'Admin\JobController@userRegisterNewsLetter')->name('jobUsers.registerNewsLetter');
Route::get('/increment-visit', 'Admin\JobController@commercesIncrement')->name('jobCommerces.increment');
Route::get('/sitemap', 'Admin\JobController@sitemap')->name('jobCommerces.sitemap');

//Job Site
Route::get('/send-news', 'JobSiteController@sendNewsLetters')->name('jobNews.sendNewsLetters');
Route::get('/contact-copy', 'JobSiteController@usersCopyNewsLetter')->name('jobCopy.userToNewsLetter');
Route::get('/resume-client', 'JobSiteController@resumeClient')->name('jobResume.resumeClient');
Route::get('/top-visit-commerces', 'JobSiteController@topVisitCommerces')->name('jobTop.visitCommerces');
Route::get('/top-votes-commerces', 'JobSiteController@topVotesCommerces')->name('jobTop.votesCommerces');
Route::get('/message-no-read', 'JobSiteController@messageNoRead')->name('jobMessage.messageNotRead');
// Route::get('/recomendar', 'JobSiteController@recommnedMail')->name('recommend.email');
Route::get('/missyou', 'JobSiteController@missYou')->name('missYou.email');


// comercio perfil
Route::get('votes_positive/{slug}', 'CommerceController@positive')->name('positive');
Route::get('/productos/{slug}', 'CommerceController@listProduct')->name('list.productCommerce');
Route::get('/comercios', 'ListingController@index')->name('listing.index');
Route::get('/comercios/{slug}', 'ListingController@searchProvince')->name('listing.searchProvince');
Route::get('/{slug}', 'CommerceController@index')->name('name.commerce');