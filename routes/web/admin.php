<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth','UserType'])->group(function () {
    Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/admin/blog/list', 'Admin\AdminBlogController@listBlogAdmin')->name('admin.listBlog');
    Route::get('/admin/blog/create', 'Admin\AdminBlogController@createBlog')->name('admin.createBlog');
    Route::post('/admin/blog/store', 'Admin\AdminBlogController@storeBlog')->name('admin.storeBlog');
    Route::get('/admin/blog/view/{id}', 'Admin\AdminBlogController@viewBlog')->name('admin.viewBlog');
    Route::patch('/admin/blog/edit/{id}', 'Admin\AdminBlogController@editBlog')->name('admin.editBlog');
    Route::get('/admin/blog/active/{id}', 'Admin\AdminBlogController@activeBlog')->name('admin.activeBlog');
    Route::get('/admin/blog/desactive/{id}', 'Admin\AdminBlogController@desactiveBlog')->name('admin.desactiveBlog');

    Route::get('/admin/user/create', 'Admin\AdminUserController@userCreate')->name('admin.userCreate');
    Route::post('/admin/user/create', 'Admin\AdminUserController@userStore')->name('admin.userStore');
    Route::get('/admin/user/edit/{id}', 'Admin\AdminUserController@userEdit')->name('admin.userEdit');

    Route::get('/admin/newsletter', 'Admin\AdminNewsLetterController@listNewsLetter')->name('admin.listNewsLetter');
    Route::get('/admin/newsletter/delete/{id}', 'Admin\AdminNewsLetterController@deleteNewsLetter')->name('admin.deleteNewsLetter');

    Route::get('/admin/exportar-usuarios', 'Admin\ExportController@exportUserComplete')->name('admin.exportUserComplete');
    Route::get('/admin/exportar-owners', 'Admin\ExportController@exportUserOwners')->name('admin.exportUserOwners');
    Route::get('/admin/exportar-newsletters', 'Admin\ExportController@exportNewsLetters')->name('admin.exportNewsLetters');

    Route::get('/admin/listado-comercios', 'Admin\CommercesController@listCommerces')->name('admin.listCommerce');
    Route::get('/admin/editar-comercios/{id}', 'Admin\CommercesController@EditCommerces')->name('admin.commerceEdit');
    Route::post('/admin/update-comercios/{id}', 'Admin\CommercesController@UpdateCommerces')->name('admin.commerceUpdate');
    
    Route::get('/admin/notifications', 'Admin\NotificationUpdateController@notificationList')->name('admin.notificationList');
    Route::post('/admin/notification-crear', 'Admin\NotificationUpdateController@notificationCreate')->name('admin.notificationCreate');
    Route::get('/admin/notification-on/{id}', 'Admin\NotificationUpdateController@notificationOn')->name('admin.notificationOn');
    Route::get('/admin/notifications-off/{id}', 'Admin\NotificationUpdateController@notificationOff')->name('admin.notificationOff');
    Route::get('/admin/notifications-delete/{id}', 'Admin\NotificationUpdateController@notificationDelete')->name('admin.notificationDelete');
});