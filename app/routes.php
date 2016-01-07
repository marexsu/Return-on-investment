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
Route::post('budget{budget_percentage}/{objective_amount}/{conversion_rate}/{paid_income}/{add_words_income}/{avarage_order}', array('as' => 'budget','uses' => 'AjaxController@budget'));
