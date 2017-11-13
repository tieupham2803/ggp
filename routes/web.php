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
// Route::get('/xinchao',function(){
// 	return "Chao ban";
// });
// Route::get('/lap-trinh/{monhoc}',function($money_format(format, number)hoc){
// 	return "Hoc Lap Trinh .$monhoc"; 
// });
Route::get('call-view',function(){
	$hoten = "than viet bach";
	return view('view',compact('hoten'));
});
Route::get('call-layout',function(){

	return view('layouts.sub');
});
Route::get('test-controller','TestController@testAction');
Route::get('test',function(){
		return view('admin.product.add'); 
});
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'cate'],function(){
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);
	});
});