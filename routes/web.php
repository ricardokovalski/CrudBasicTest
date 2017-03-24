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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {

	Route::get('', function() {
		return view('admin.index');
	});
	
	Route::resource('lots', 'LotController');
	Route::resource('categories', 'CategoryController');
	Route::resource('products', 'ProductController');

	Route::get('exportXml', ['as' => 'products.export', 'uses' => 'ProductController@exportXml']);

	Route::get('importXml', ['as' => 'products.import', 'uses' => 'ProductController@importXml']);
	Route::post('importXml', ['as' => 'products.import.store', 'uses' => 'ProductController@importXmlStore']);

	Route::get('relatorio', ['as' => 'products.relatorio', 'uses' => 'ProductController@relatorioXml']);
});
