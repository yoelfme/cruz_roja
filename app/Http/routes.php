<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'middleware' => []], function() {

});

Route::controllers([
	'/' => 'Auth\AuthController'
]);
