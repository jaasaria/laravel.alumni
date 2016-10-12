<?php

Route::get('/',['uses' => 'PagesCtrl@home','as' => 'front.home']);
Route::get('/home',['uses' => 'PagesCtrl@home','as' => 'front.home']);

Route::get('/about',['uses' => 'PagesCtrl@about','as' => 'front.about']);





//TICKET
Route::group(['middleware' => 'auth','prefix' => 'tickets'],function(){
	Route::get('/', ['uses' => 'TicketCtrl@index','as' => 'ticket.index']);
	Route::get('/create', ['uses' => 'TicketCtrl@create','as' => 'ticket.create']);
	Route::get('/read/{id}', ['uses' => 'TicketCtrl@read','as' => 'ticket.read']);

	Route::post('/store', ['uses' => 'TicketCtrl@store','as' => 'ticket.store']);
	Route::post('/reply/{id}', ['uses' => 'TicketCtrl@StoreReply','as' => 'ticket.reply']);
	Route::get('/get_all_data', ['uses' => 'TicketCtrl@get_all_data','as' => 'tickets.get_all_data']); //json format 
	// - use only for fetching note data
});


//PROFILE
Route::group(['middleware' => 'auth','prefix' => 'profile'],function(){	
	Route::get('/', ['uses' => 'ProfileCtrl@index','as' => 'profile.index']);
	Route::post('/storeimage', ['uses' => 'ProfileCtrl@storeimage','as' => 'profile.storeimage']);
	Route::post('/storeprofile', ['uses' => 'ProfileCtrl@storeprofile','as' => 'profile.storeprofile']);
	Route::post('/storeemail', ['uses' => 'ProfileCtrl@storeemail','as' => 'profile.storeemail']);
	Route::post('/storepassword', ['uses' => 'ProfileCtrl@storepassword','as' => 'profile.storepassword']);
	Route::get('/get_all_logs', ['uses' => 'ProfileCtrl@get_all_logs','as' => 'get_all_logs']);
	Route::post('/deleteimage', ['uses' => 'ProfileCtrl@deleteimage','as' => 'profile.deleteimage']);
});



//NOTES
Route::group(['middleware' => 'auth','prefix' => 'notes'],function(){
	Route::get('/', ['uses' => 'NoteCtrl@index','as' => 'note_list']);
	Route::get('/create', ['uses' => 'NoteCtrl@create','as' => 'note_create']);
	Route::post('/store', ['uses' => 'NoteCtrl@store','as' => 'note_store']);
	Route::get('/edit/{id}', ['uses' => 'NoteCtrl@edit','as' => 'note_edit']);
	Route::post('/update/{id}', ['uses' => 'NoteCtrl@update','as' => 'note_update']);
	Route::get('/destroy/{id}', ['uses' => 'NoteCtrl@destroy','as' => 'note_destroy']);
	Route::delete('/delete', ['uses' => 'NoteCtrl@delete','as' => 'note_delete']);
	Route::get('/get_all_data', ['uses' => 'NoteCtrl@get_all_data','as' => 'get_all_data']); //json format - use only for fetching note data
});


Route::get('/admin',   ['middleware' => 'auth','uses' => 'PagesCtrl@admin','as' => 'admin.home']);


// Authentication Routes...
Route::get('user/login', ['uses'=>'Auth\AuthController@showLoginForm','as' => 'user.login'] );
Route::post('user/login', 'Auth\AuthController@login');
Route::get('user/logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::post('user/register', 'Auth\AuthController@register');
Route::get('user/registration', 'Auth\AuthController@showRegistrationForm');

// Password Reset Routes...
Route::get('user/reset/{token?}', 'Auth\PasswordController@showResetForm');		//get reset form
Route::post('user/email', 'Auth\PasswordController@sendResetLinkEmail');		//send link
Route::post('user/reset', 'Auth\PasswordController@reset');						//reset pass

Route::get('/help', ['uses' => 'PagesCtrl@help','as' => 'help']);
