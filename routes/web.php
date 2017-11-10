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
Route::get('/xinchao',function(){
	return "Chao ban";
});
Route::get('/lap-trinh/{monhoc}',function($monhoc){
	return "Hoc Lap Trinh .$monhoc"; 
});
Route::get('call-view',function(){
	$hoten = "than viet bach";
	return view('view',compact('hoten'));
});
Route::get('call-layout',function(){

	return view('layouts.sub');
});
Route::get('test-controller','TestController@testAction');