<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', 'Services\ServicesController@index');
Route::get('/services/{id}/delete','Services\ServicesController@delete')->where('id', '[0-9]+');
Route::get('/services/add',['as' => 'services', 'uses' => 'Services\ServicesController@create']);
Route::post('/services/add',['as' => 'services_store', 'uses' => 'Services\ServicesController@store']);
Route::get('/services/{id}/edit',['as' => 'services_edit', 'uses' => 'Services\ServicesController@edit']);
Route::post('/services/edit',['as' => 'services_update', 'uses' => 'Services\ServicesController@update']);

Route::get('/types', 'Types\TypesController@index');
Route::get('/types/{id}/delete','Types\TypesController@delete')->where('id', '[0-9]+');
Route::get('/types/add',['as' => 'types', 'uses' => 'Types\TypesController@create']);
Route::post('/types/add',['as' => 'types_store', 'uses' => 'Types\TypesController@store']);


Route::get('/services_types_mapping', 'Mapper\ServicesTypesMappingController@index');
Route::get('/services_types_mapping/add', 'Mapper\ServicesTypesMappingController@create');
