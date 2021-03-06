<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function () {


    Route::get('/',function(){

       // return view('layout.layout');
        return view('pages.main.home');
    });

    Route::get('/contact',function(){
        return view('pages.main.categoryView');
    });

    Route::get('/index', 'PagesController@index');

    Route::get('/category', 'PagesController@category');

    Route::get('cart', 'CartHandle@add');
    Route::post('cart', 'CartHandle@add');

    Route::post('cartUpdate', 'CartHandle@update');

    Route::get('checkoutCreate', 'PagesController@create');
    Route::post('checkoutCreate', 'PagesController@store');

    Route::post('checkoutCreate1', 'PagesController@store1');

    Route::post('checkoutCreate2', 'PagesController@store2');

    Route::post('checkout4', 'PagesController@checkout4');

    Route::get('category.{id}','PagesController@show');

    Route::get('/sample', 'CartHandle@test');

    Route::get('about', 'PagesController@about');

    Route::get('about/create', 'PagesController@create');

    Route::get('sample', 'PagesController@sample');

    Route::get('about/{id}', 'PagesController@show');

    Route::get('sample1', 'PagesController@sample1');
    Route::get('/cat.{catName}','mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}','mPageController@viewItDets');




});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
