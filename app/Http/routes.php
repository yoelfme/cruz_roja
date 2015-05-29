<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'middleware' => []], function() {
    Route::resource('books', 'BooksController');
    Route::resource('prizes', 'PrizeController');
    Route::resource('raffles', 'RaffleController');
    Route::resource('seller', 'SellersController');
    Route::resource('tickets', 'TicketsController');
    Route::resource('users', 'UsersController');
    Route::resource('winners', 'WinnersController');
});

Route::controllers([
	'/' => 'Auth\AuthController'
]);
