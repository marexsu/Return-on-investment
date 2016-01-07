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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('home', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::post('calculation', array('as' => 'calculation', 'uses' => 'HomeController@calculation'));
Route::post('budget', array('as' => 'budget','uses' => 'AjaxController@budget'));
Route::post('budget_amount', array('as' => 'budget_amount','uses' => 'AjaxController@budget_amount'));
Route::post('visitors_cloud', array('as' => 'visitors_cloud','uses' => 'AjaxController@visitors_cloud'));
Route::post('percentage', array('as' => 'percentage','uses' => 'AjaxController@percentage'));
