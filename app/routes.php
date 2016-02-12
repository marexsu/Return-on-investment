<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::get('home', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::post('calculation', array('as' => 'calculation', 'uses' => 'HomeController@calculation'));
Route::post('budget', array('as' => 'budget','uses' => 'AjaxController@budget'));
Route::post('budget_amount', array('as' => 'budget_amount','uses' => 'AjaxController@budget_amount'));
Route::post('visitors_cloud', array('as' => 'visitors_cloud','uses' => 'AjaxController@visitors_cloud'));
Route::post('percentage', array('as' => 'percentage','uses' => 'AjaxController@percentage'));
Route::get('overview', array('as' => 'overview','uses' => 'HomeController@overview'));
Route::get('login', array('as' => 'login','uses' => 'HomeController@log_in'));
Route::get('log_out', array('as' => 'log_out','uses' => 'HomeController@log_out'));