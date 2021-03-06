<?php

Route::get('/',['uses' => 'PagesCtrl@home','as' => 'front.home']);
Route::get('/home',['uses' => 'PagesCtrl@home','as' => 'front.home']);
Route::get('/about',['uses' => 'PagesCtrl@about','as' => 'front.about']);
Route::get('/vision',['uses' => 'PagesCtrl@vision','as' => 'front.vision']);

Route::get('/hymn',['uses' => 'PagesCtrl@hymn','as' => 'front.hymn']);
Route::get('/academic',['uses' => 'PagesCtrl@academic','as' => 'front.academic']);
Route::get('/academic/show/{data}', ['uses' => 'PagesCtrl@academic_show','as' => 'front.academic.show']);
Route::get('/contact',['uses' => 'PagesCtrl@contact','as' => 'front.contact']);
Route::get('/list_jobs',['uses' => 'JobsCtrl@list_jobs','as' => 'front.list_jobs']);
Route::get('/list_jobs/show/{id}', ['uses' => 'JobsCtrl@show','as' => 'front.show']);
Route::get('/list_activity',['uses' => 'ActivityCtrl@list_activity','as' => 'front.list_activity']);
Route::get('/list_activity/show/{id}', ['uses' => 'ActivityCtrl@show','as' => 'front.activity.show']);


Route::get('/auth/redirect/{provider}', ['uses' => 'SocialiteCtrl@redirect_facebook','as' => 'auth.facebook']);
Route::get('/auth/callback/{provider}', ['uses' => 'SocialiteCtrl@callback_facebook','as' => 'auth.facebookcall']);


// Route::get('/auth/facebook', ['uses' => 'SocialiteCtrl@redirect_facebook','as' => 'auth.facebook']);
// Route::get('/auth/facebook/callback', ['uses' => 'SocialiteCtrl@callback_facebook','as' => 'auth.facebookcall']);

// Route::get('/auth/twitter', ['uses' => 'SocialiteCtrl@redirect_twitter','as' => 'auth.twitter']);
// Route::get('/auth/twitter/callback', ['uses' => 'SocialiteCtrl@callback_twitter']);


//Route::group(['middleware' => 'Admin'],function(){
//});


// Alumni Request - view by admin
Route::group(['middleware' => 'Admin','prefix' => 'alumni'],function(){
	Route::get('/', ['uses' => 'AlumniCtrl@index','as' => 'alumni.list']);
	Route::get('/edit/{id}', ['uses' => 'AlumniCtrl@edit','as' => 'alumni.edit']);
	Route::post('/update/{id}', ['uses' => 'AlumniCtrl@update','as' => 'alumni.update']);
	Route::delete('/delete', ['uses' => 'AlumniCtrl@delete','as' => 'alumni.delete']);
	Route::get('/data', ['uses' => 'AlumniCtrl@getdata','as' => 'alumni.data']);
	Route::post('/message', ['uses' => 'AlumniCtrl@message','as' => 'alumni.message']);
});

// Special Message Sending
Route::post('/message', ['uses' => 'AlumniCtrl@message','as' => 'alumni.message']);


// Request - view by alumni
Route::group(['middleware' => 'auth','prefix' => 'request'],function(){
	Route::get('/', ['uses' => 'RequestCtrl@index','as' => 'request.list']);
	Route::get('/create', ['uses' => 'RequestCtrl@create','as' => 'request.create']);
	Route::post('/store', ['uses' => 'RequestCtrl@store','as' => 'request.store']);
	Route::get('/edit/{id}', ['uses' => 'RequestCtrl@edit','as' => 'request.edit']);
	Route::post('/update/{id}', ['uses' => 'RequestCtrl@update','as' => 'request.update']);
	Route::get('/destroy/{id}', ['uses' => 'RequestCtrl@destroy','as' => 'request.destroy']);
	Route::delete('/delete', ['uses' => 'RequestCtrl@delete','as' => 'request.delete']);
	Route::get('/data', ['uses' => 'RequestCtrl@getdata','as' => 'request.data']);
	// Route::post('/message', ['uses' => 'RequestCtrl@message','as' => 'request.message']);
});



// Report - Alumni
Route::group(['middleware' => 'Admin','prefix' => 'report/alumni'],function(){
	Route::get('/', ['uses' => 'ReportAlumniCtrl@index','as' => 'report.alumni.list']);
	Route::get('/edit/{id}', ['uses' => 'ReportAlumniCtrl@edit','as' => 'report.alumni.edit']);
	Route::post('/update/{id}', ['uses' => 'ReportAlumniCtrl@update','as' => 'report.alumni.update']);
	Route::delete('/delete', ['uses' => 'ReportAlumniCtrl@delete','as' => 'report.alumni.delete']);
	Route::get('/data', ['uses' => 'ReportAlumniCtrl@getdata','as' => 'report.alumni.data']);
});





// Activity
Route::group(['middleware' => 'Admin','prefix' => 'activity'],function(){
	Route::get('/', ['uses' => 'ActivityCtrl@index','as' => 'activity.list']);
	Route::get('/create', ['uses' => 'ActivityCtrl@create','as' => 'activity.create']);
	Route::post('/store', ['uses' => 'ActivityCtrl@store','as' => 'activity.store']);
	Route::get('/edit/{id}', ['uses' => 'ActivityCtrl@edit','as' => 'activity.edit']);
	Route::post('/update/{id}', ['uses' => 'ActivityCtrl@update','as' => 'activity.update']);
	Route::get('/destroy/{id}', ['uses' => 'ActivityCtrl@destroy','as' => 'activity.destroy']);
	Route::delete('/delete', ['uses' => 'ActivityCtrl@delete','as' => 'activity.delete']);
	Route::get('/data', ['uses' => 'ActivityCtrl@getdata','as' => 'activity.data']);
});



// Jobs
Route::group(['middleware' => 'Admin','prefix' => 'jobs'],function(){
	Route::get('/', ['uses' => 'JobsCtrl@index','as' => 'jobs.list']);
	Route::get('/create', ['uses' => 'JobsCtrl@create','as' => 'jobs.create']);
	Route::post('/store', ['uses' => 'JobsCtrl@store','as' => 'jobs.store']);
	Route::get('/edit/{id}', ['uses' => 'JobsCtrl@edit','as' => 'jobs.edit']);
	Route::post('/update/{id}', ['uses' => 'JobsCtrl@update','as' => 'jobs.update']);
	Route::get('/destroy/{id}', ['uses' => 'JobsCtrl@destroy','as' => 'jobs.destroy']);
	Route::delete('/delete', ['uses' => 'JobsCtrl@delete','as' => 'jobs.delete']);
	Route::get('/get_all_data', ['uses' => 'JobsCtrl@get_all_data','as' => 'jobs.data']);
});




//PROFILE
Route::group(['middleware' => 'auth','prefix' => 'profile'],function(){	
	Route::get('/', ['uses' => 'ProfileCtrl@index','as' => 'profile.index']);
	Route::post('/storeimage', ['uses' => 'ProfileCtrl@storeimage','as' => 'profile.storeimage']);
	Route::post('/storeprofile', ['uses' => 'ProfileCtrl@storeprofile','as' => 'profile.storeprofile']);
	Route::post('/storeemail', ['uses' => 'ProfileCtrl@storeemail','as' => 'profile.storeemail']);
	Route::post('/storepassword', ['uses' => 'ProfileCtrl@storepassword','as' => 'profile.storepassword']);
	Route::get('/profilelogs', ['uses' => 'ProfileCtrl@profilelogs','as' => 'profile.logs']);
	Route::post('/deleteimage', ['uses' => 'ProfileCtrl@deleteimage','as' => 'profile.deleteimage']);
});



Route::get('/admin',   ['middleware' => 'auth','uses' => 'PagesCtrl@admin','as' => 'admin.home']);


// Authentication Routes...
Route::get('user/login', ['uses'=>'Auth\AuthController@showLoginForm','as' => 'user.login'] );
Route::post('user/login', 'Auth\AuthController@login');
Route::get('user/logout', ['uses'=>'Auth\AuthController@logout','as' => 'user.signout']);


// Registration Routes...
Route::post('user/register', 'Auth\AuthController@register');
Route::get('user/registration', 'Auth\AuthController@showRegistrationForm');

// Password Reset Routes...
Route::get('user/reset/{token?}', 'Auth\PasswordController@showResetForm');		//get reset form
Route::post('user/email', 'Auth\PasswordController@sendResetLinkEmail');		//send link
Route::post('user/reset', 'Auth\PasswordController@reset');						//reset pass


Route::get('/settings', ['uses' => 'PagesCtrl@settings','as' => 'settings']);
Route::get('/help', ['uses' => 'PagesCtrl@help','as' => 'help']);
