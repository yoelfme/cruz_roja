<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'AdminController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => []], function() {
    Route::resource('books', 'BooksController');
    Route::resource('prizes', 'PrizesController');
    Route::resource('raffles', 'RafflesController');
    Route::resource('sellers', 'SellersController');
    Route::resource('tickets', 'TicketsController');
    Route::resource('users', 'UsersController');
    Route::resource('winners', 'WinnersController');
});

Route::controllers([
	'/' => 'Auth\AuthController'
]);
