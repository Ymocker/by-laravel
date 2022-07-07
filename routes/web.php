<?php

use Illuminate\Support\Facades\Route;

//======== Frontend routes ==========================================================

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.', 'middleware' => 'Statistic'], function () {
    Route::get('/', 'FrontendController@index');
    Route::get('/index', 'FrontendController@index');
    Route::get('/about', 'FrontendController@about');
    Route::get('/catalog/{sel?}', 'FrontendController@catalog');
    Route::get('/candy/{id?}', 'FrontendController@candy');
    Route::post('/about/send/message', 'FrontendController@sendMessage');
    Route::post('/auth', 'FrontendController@sendPass');
    Route::get('/ps', 'FrontendController@recovery');
    Route::get('/rec/{id}', 'FrontendController@access');
});

Route::get('/products', function () {
    return view('frontend.products');
})->middleware('Statistic');

Route::get('/contact', function () {
    return view('frontend.contact');
})->middleware('Statistic');

Route::get('/login', function () {
    return view('frontend.loginpage');
});

Route::get('/forget', function () {
    return view('frontend.forget');
});



//======== Backend routes ==========================================================

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'CheckIfAdmin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */

    Route::get('/', 'BackendController@index')->name('adminroute');
    Route::get('/settings', 'BackendController@settings');
    Route::get('/security', 'BackendController@security');
    Route::post('/securityChange', 'BackendController@securityChange');
    Route::get('/catalog', 'BackendController@editCatalog');
    Route::get('/box', 'BackendController@box');
    Route::get('/newBox', 'BackendController@newBox');
    Route::post('/addbox', 'BackendController@addBox')->name('addBox');
    Route::get('/boxEdit/{id?}', 'BackendController@boxEdit');
    Route::post('/boxUpdate/{id}', 'BackendController@boxUpdate')->name('boxUpdate');
    Route::get('/candy/{id?}/{rand?}', 'BackendController@candy');
    Route::get('/candyEdit/{id?}', 'BackendController@candyEdit');
    Route::post('/candyUpdate/{id}', 'BackendController@candyUpdate')->name('candyUpdate');
    Route::get('/delcandy/{id}', 'BackendController@candyDelete');
    Route::get('/delbox/{id}', 'BackendController@delbox');
    Route::get('/new', 'BackendController@newCandy');
    Route::get('/logout', 'BackendController@logout');
    Route::post('/add', 'BackendController@candyAdd')->name('candyAdd');
    Route::post('/candyEdit/picupload', 'BackendController@picUpload')->name('picupload');

});


