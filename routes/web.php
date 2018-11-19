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
Route::post('/searchinfo', ['as'=>'postSearch','uses'=>'SearchController@postSearch']);
Route::get('/searchinfo', ['as'=>'getSearch','uses'=>'SearchController@getSearch']);
//Thanh menu
Route::get('/scholarship', ['as'=>'getScholarships','uses'=>'GetDataToViewController@getScholarships']);

Route::get('/contest', ['as'=>'getContests','uses'=>'GetDataToViewController@getContests']);

Route::get('/workshop', ['as'=>'getWorkshops','uses'=>'GetDataToViewController@getWorkshops']);



Route::get('/contact', function () {
    return view('contact');
});
Route::get('/personal_info', ['as'=>'getPersonal','uses'=>'GetDataToViewController@getPersonal']);

Route::get('/personal_info_edit', ['as'=>'getPersonalEdit','uses'=>'GetDataToViewController@getPersonalEdit']);


Route::get('/post', function () {
    return view('post');
});

Route::get('/scholarship/{id}', ['as'=>'getScholarshipDetail','uses'=>'GetDataToViewController@getScholarshipDetail']);

Route::get('/dashboard', function(){
	return view('dashboard');
});

Route::get('/dashpage', 'DatabaseController@routeDashBoard');

Route::group(['prefix'=>'manage'], function(){
	Route::group(['prefix'=>'scholarship'], function(){
		Route::get('/', 'DatabaseController@getAllScholar');
		Route::get('delete/{id}', 'DatabaseController@delScholar');
	});
	Route::group(['prefix'=>'account'], function(){
		Route::get('', 'DatabaseController@getAllAccount');
		Route::get('ban/{id}', 'DatabaseController@banAccount');
		Route::get('del/{id}', 'DatabaseController@delAccount');
	});
});
// Route::get('/manager/{userid}', 'DatabaseController@getData');

