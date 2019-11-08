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

Route::get('/', function () {return redirect('/campaigns');});
Auth::routes();

Route::resource('campaigns', 'CampaignController');

Route::view('/imprint', 'imprint')->name('imprint');
Route::view('/policy', 'policy')->name('policy');;

Route::get('/platform', 'PlatformController@index');
Route::post('/platform', 'PlatformController@update');
Route::get('/home', 'HomeController@index')->name('home');
