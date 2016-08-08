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

Route::get('/', [
  'uses' => 'LinkController@getMakeUrl',
  ]);

Route::post('/make',[
  'uses' => 'LinkController@postMakeUrl',
  'as' => 'post.url'
  ]);

Route::get('/{hash}',[
  'uses' => 'LinkController@getUse',
  'as' => 'use.url'
  ]);