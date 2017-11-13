<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use App\Cate;
class CateController extends Controller
{
    //
    public function getList(){
    	$cate = Cate::all();
    	return view('admin.cate.list',['cate'=>$cate]);
    }
    public function getAdd(){
      $parent = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
  public function postAdd(CateRequest $request){
    	// return view('admin.cate.add');
  	// print_r($request->txtCateName);
  	$cate = new Cate;
  	$cate->name = $request->txtCateName;
  	$cate->alias = changeTitle($request->txtCateName);
  	$cate->order = $request->txtOrder;
  	$cate->parent_id =$request->sltParent;
    $cate->keywords =$request->txtKeywords;
    $cate->description =$request->txtDescription;
    $cate->save();
    return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'nhap thanh cong']);
    // ->with(['flash_level'=>'success','flash_message'=>'nhap thanh cong'])
     }
}

