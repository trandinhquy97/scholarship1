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
Route::post('/personal_info_edit', ['as'=>'postInfoEdit','uses'=>'GetDataToViewController@postInfoEdit']);
Route::get('/changepw', ['as'=>'getPersonalEdit','uses'=>'GetDataToViewController@getPasswordEdit']);
Route::post('/changepw', ['as'=>'getPersonalEdit','uses'=>'GetDataToViewController@postPasswordEdit']);

Route::get('/posthb', ['as'=>'getPosthb','files' => true,'uses'=>'GetDataToViewController@getPosthb']);
Route::post('/posthb', ['as'=>'postPosthb','files' => true,'uses'=>'GetDataToViewController@postPosthb']);


Route::get('/scholarship/{id}', ['as'=>'getScholarshipDetail','uses'=>'GetDataToViewController@getScholarshipDetail']);
Route::get('/scholarship/{idHocBong}/dangky', ['as'=>'getScholarshipDetail','uses'=>'RegistScholarshipController@registScholarship']);
Route::post('/scholarship/{id}/comment',['as'=>'postComment','uses'=>'SendCommentsController@postComment']);

Route::get('/workshop/{id}', ['as'=>'getWorkshopDetail','uses'=>'GetDataToViewController@getWorkshopDetail']);
Route::post('/workshop/{id}/comment',['as'=>'postCommentWorkShop','uses'=>'SendCommentsController@postCommentWorkShop']);

Route::get('/contest/{id}', ['as'=>'getContestDetail','uses'=>'GetDataToViewController@getContestDetail']);
Route::post('/contest/{id}/comment',['as'=>'postCommentContest','uses'=>'SendCommentsController@postCommentContest']);

Route::get('/dashboard', 'DatabaseController@routeDashBoard');

Route::get('/dashpage', 'DatabaseController@routeBoardSide');

Route::group(['prefix'=>'manage'], function(){
	Route::group(['prefix'=>'scholarship'], function(){
		Route::get('/', 'DatabaseController@getAllScholar');
		Route::delete('/', 'DatabaseController@deleteScholar');
		Route::get('delete/{id}', 'DatabaseController@delScholar');
	});
	Route::group(['prefix'=>'account'], function(){
		Route::post('', 'DatabaseController@createAccount');
		Route::get('', 'DatabaseController@getAllAccount');
		Route::put('', 'DatabaseController@changeAccount');
		Route::delete('', 'DatabaseController@deleteAccount');
	});
    Route::group(['prefix'=>'post'], function(){
        Route::get('/', 'DatabaseController@getAllPost');
        Route::get('approval/{id}', 'DatabaseController@approvalPost');
        Route::get('new/{id}', 'DatabaseController@newPost');
    });
    Route::group(['prefix'=>'ownpost'], function(){
        Route::get('/', 'DatabaseController@getOwnPost');
    });
    Route::group(['prefix'=>'comments'], function(){
        Route::get('/', 'DatabaseController@getAllComments');
        Route::get('/deletecomment/{id}', 'DatabaseController@delComment');
    });
    Route::group(['prefix'=>'commentssevent'], function(){
        Route::get('/', 'DatabaseController@getAllCommentsEvent');
        Route::get('deletecomment/{id}', 'DatabaseController@delComment');
    });
});

Route::get('t', 'DatabaseController@test1');