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

Route::get('/', ['as'=>'getIndex','uses'=>'GetDataToViewController@getIndex']);
Route::get('/login', ['as'=>'getLogin','uses'=>'CustomLoginController@getLogin']);
Route::post('/login', ['as'=>'postLogin','uses'=>'CustomLoginController@postLogin']);
Route::get('/logout', ['as'=>'getLogout','uses'=>'LogoutController@getLogout']);

Route::get('/signup', ['as'=>'getSignup','uses'=>'SignupController@getSignup']);
Route::post('/signup', ['as'=>'postSignup','uses'=>'SignupController@postSignup']);
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/searchinfo', function () {
    return view('searchinfo');
});


//Thanh menu
Route::get('/scholarship', ['as'=>'getScholarships','uses'=>'GetDataToViewController@getScholarships']);

Route::get('/contest', ['as'=>'getContests','uses'=>'GetDataToViewController@getContests']);

Route::get('/workshop', ['as'=>'getWorkshops','uses'=>'GetDataToViewController@getWorkshops']);

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/post', function () {
    return view('post');
});

Route::get('/scholarship/{id}', ['as'=>'getScholarshipDetail','uses'=>'GetDataToViewController@getScholarshipDetail']);





