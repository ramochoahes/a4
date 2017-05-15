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

Route::get('/', 'ValController@getVal');
Route::get('validation', 'ValController@getVal');

Route::get('site', 'ValController@returnSite');
Route::get('sitetwo', 'ValController@returnSiteTwo');
Route::get('makeClass', 'ModelController@createFunction');
Route::get('editClass', 'ModelController@editFunction');
Route::post('editClass', 'ModelController@saveEditFunction');
Route::get('deleteClass', 'ModelController@confirmDelete');
Route::post('deleteClass', 'ModelController@delete');

Route::get('deleteSearch', 'ModelController@searchDelete');
