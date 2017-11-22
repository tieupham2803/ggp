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
		Route::get('delete/{id}',['as'=>'admin.cate.delete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.edit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.edit','uses'=>'CateController@postEdit']);

	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);
		Route::get('delete/{id}',['as'=>'admin.product.delete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.edit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.edit','uses'=>'ProductController@postEdit']);

	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'userController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'userController@postAdd']);
		Route::get('list',['as'=>'admin.user.list','uses'=>'userController@getList']);
		Route::get('delete/{id}',['as'=>'admin.user.delete','uses'=>'userController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.edit','uses'=>'userController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.edit','uses'=>'userController@postEdit']);

	});
});