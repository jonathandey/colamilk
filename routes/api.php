<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api']], function() {
	Route::get('/albums', 'Api\AlbumsController@index');

	Route::get('/album', 'Api\AlbumsController@load');
	Route::post('/album', 'Api\AlbumsController@create');
	Route::delete('/album', 'Api\AlbumsController@delete');
	Route::put('/album', 'Api\AlbumsController@update');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
