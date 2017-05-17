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

Route::get('/debug', function() {

 echo '<pre>';

 echo '<h1>Environment</h1>';
 echo App::environment().'</h1>';

 echo '<h1>Debugging?</h1>';
 if(config('app.debug')) echo "Yes"; else echo "No";

 echo '<h1>Database Config</h1>';
     echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;
     /*
 The following commented out line will print your MySQL credentials.
 Uncomment this line only if you're facing difficulties connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
 //print_r(config('database.connections.mysql'));
