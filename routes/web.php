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

// Routes for creating children entities
Route::get('/campaigns/{campaign}/insertion_orders/create', 'InsertionOrderController@create');
Route::get('/campaigns/{campaign}/line_items/create', 'LineItemController@create');
Route::get('/campaigns/{campaign}/creatives/create', 'CreativeController@create');

// Children resources for everything else
Route::resource('insertion_orders', 'InsertionOrderController')->except([
                                                                            'create', 'index', 'show'
                                                                        ]);
Route::resource('line_items', 'LineItemController')->except([
                                                                'create', 'index', 'show'
                                                            ]);
Route::resource('creatives', 'CreativeController')->except([
                                                                'create', 'index', 'show'
                                                            ]);

Route::resource('values', 'FieldValueController');

Route::view('/imprint', 'imprint')->name('imprint');
Route::view('/policy', 'policy')->name('policy');;

Route::get('/platform', 'PlatformController@index');
Route::post('/platform', 'PlatformController@update');


// CAN BE REMOVED LATER, JUST FOR TESTING COMPONENTS
Route::get('/home', 'HomeController@index')->name('home');
