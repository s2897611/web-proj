<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::post('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('jobs/browse', array('as' => 'job.browse', 'uses' => 'JobController@browse'));
Route::get('jobs/search_jobs', array('as' => 'job.search_jobs', 'uses' => 'JobController@search_jobs'));
Route::post('jobs/search_jobs', array('as' => 'job.search', 'uses' => 'JobController@search'));
Route::get('users/documentation', array('as' => 'user.documentation', 'uses' => 'UserController@documentation'));
Route::resource('job', 'JobController');
Route::resource('user', 'UserController');
Route::resource('application', 'ApplicationController');
Route::get('/', array('as'=>'home', 'uses'=> 'JobController@index')); 