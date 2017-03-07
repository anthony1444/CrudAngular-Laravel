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

Route::group(['middleware' => 'auth','prefix' => 'panel'], function () {
    
 Route::get('/api/v1/workers/{id?}', 'Workers@index');
Route::post('/api/v1/workers', 'Workers@store');
Route::post('/api/v1/workers/{id}', 'Workers@update');
Route::delete('/api/v1/workers/{id}', 'Workers@destroy');
Route::get('/', function ()    {
       return view('index');
   });

Route::get('/', 'HomeController@index');
});
//Route::resource('/api/v1/workers/','Workers');

Route::get('/', 'HomeController@index');
Auth::routes();  
  
