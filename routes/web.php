<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ],
    function()
    {
        Route::get('/', [
            'uses' => 'Marketing\MainController@index',
            'as' => 'main',
        ]);

        Route::get('/product-details/{product}', [
            'uses' => 'Marketing\MainController@productDetails',
            'as' => 'marketing.product_details',
        ]);

        Route::get('/product-order-form/{product}', [
            'uses' => 'Marketing\MainController@productOrderForm',
            'as' => 'marketing.product_order_form',
        ]);

        Route::post('/make-order/{product}', [
            'uses' => 'Marketing\MainController@makeOrder',
            'as' => 'marketing.make_order',
        ]);

        Route::get('/make-order/{product}', [
            'uses' => 'Marketing\MainController@makeOrder',
            'as' => 'marketing.make_order',
        ]);
    }
);

/*Route::post('/make-order', [
    'uses' => 'Marketing\MainController@postOrderForm',
    'as' => 'marketing.make_order',
]);*/

Route::post('/send-message-contacts-form', [
    'uses' => 'Marketing\MainController@postContactForm',
    'as' => 'marketing.post_contact_form',
]);

Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::get('admin/logout', 'Admin\Auth\LoginController@logout');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => [ 'auth' ]
    ],
    function()
    {
        Route::get('/', function() {
            return redirect(route('dashboard'));
        });

        Route::get('/dashboard', [
            'uses' => 'Admin\DashboardController@index',
            'as' => 'dashboard',
        ]);

        Route::get('/sections/products/list', [
            'uses' => 'Admin\ProductsController@index',
            'as' => 'admin.sections.products.index',
        ]);

        Route::get('/sections/products/list/create', [
            'uses' => 'Admin\ProductsController@create',
            'as' => 'admin.sections.products.create',
        ]);

        Route::get('/sections/products/list/edit/{product}', [
            'uses' => 'Admin\ProductsController@edit',
            'as' => 'admin.sections.products.edit',
        ]);

        Route::post('/sections/products/list/create', [
            'uses' => 'Admin\ProductsController@createOrUpdate',
            'as' => 'admin.sections.products.editPost',
        ]);

        Route::post('/sections/products/list/edit/{product}', [
            'uses' => 'Admin\ProductsController@createOrUpdate',
            'as' => 'admin.sections.products.editPost',
        ]);

        Route::get('/sections/products/list/delete/{product}', [
            'uses' => 'Admin\ProductsController@delete',
            'as' => 'admin.sections.products.delete',
        ]);

        Route::get('/sections/products/delete-height/{height}', [
            'uses' => 'Admin\ProductsController@delete_height',
            'as' => 'admin.sections.products.delete_height',
        ]);

        Route::post('/sections/products/add-height/{product}', [
            'uses' => 'Admin\ProductsController@add_height',
            'as' => 'admin.sections.products.add_height',
        ]);

        Route::get('/sections/products/toggle-height-available/{height}', [
            'uses' => 'Admin\ProductsController@toggle_height_available',
            'as' => 'admin.sections.products.toggle_height_available',
        ]);

        Route::get('/sections/products/fixing', [
            'uses' => 'Admin\SectionsController@fixingIndex',
            'as' => 'admin.sections.products.fixing.index',
        ]);

        Route::post('/sections/products/fixing', [
            'uses' => 'Admin\SectionsController@fixingUpdate',
            'as' => 'admin.sections.products.fixing.update',
        ]);

        Route::get('/sections/main', [
            'uses' => 'Admin\SectionsController@mainIndex',
            'as' => 'admin.sections.main.index',
        ]);

        Route::post('/sections/main', [
            'uses' => 'Admin\SectionsController@mainUpdate',
            'as' => 'admin.sections.main.update',
        ]);

        Route::get('/sections/about', [
            'uses' => 'Admin\SectionsController@aboutIndex',
            'as' => 'admin.sections.about.index',
        ]);

        Route::post('/sections/about', [
            'uses' => 'Admin\SectionsController@aboutUpdate',
            'as' => 'admin.sections.about.update',
        ]);

        Route::get('/sections/contacts', [
            'uses' => 'Admin\SectionsController@contactsIndex',
            'as' => 'admin.sections.contacts.index',
        ]);

        Route::post('/sections/contacts', [
            'uses' => 'Admin\SectionsController@contactsUpdate',
            'as' => 'admin.sections.contacts.update',
        ]);

        Route::get('/seo', [
            'uses' => 'Admin\SeoController@index',
            'as' => 'admin.seo.index',
        ]);

        Route::post('/seo', [
            'uses' => 'Admin\SeoController@update',
            'as' => 'admin.seo.update',
        ]);

        Route::get('/users', [
            'uses' => 'Admin\Auth\RegisterController@getList',
            'as' => 'admin.users.index',
        ]);

        Route::get('/users/register', [
            'uses' => 'Admin\Auth\RegisterController@showRegistrationForm',
            'as' => 'admin.users.register',
        ]);

        Route::post('/users/register', [
            'uses' => 'Admin\Auth\RegisterController@postRegister',
            'as' => 'admin.users.register',
        ]);

        Route::get('/users/edit/{user}', [
            'uses' => 'Admin\Auth\RegisterController@getEdit',
            'as' => 'admin.users.edit',
        ]);

        Route::post('/users/edit/{user}', [
            'uses' => 'Admin\Auth\RegisterController@postEdit',
            'as' => 'admin.users.edit',
        ]);

        Route::get('/users/delete/{user}', [
            'uses' => 'Admin\Auth\RegisterController@getDelete',
            'as' => 'admin.users.delete',
        ]);
    }
);