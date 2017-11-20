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

 public function getDelete($id){
     $parent = Cate::where('parent_id',$id)->count();
     if ($parent == 0) {
       # code...

    
     $cate = Cate::find($id);
     $cate->delete($id);
         return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Xoa thanh cong']);
          }
          else{
            echo "<script type='text/javascript' >
            alert('Xin loi! Ban khong the xoa category');
            window.location = '";
              echo route('admin.cate.list');
              echo "'
            </script>";
          }
    }
    public function getEdit($id){ 
      $data =Cate::findOrFail($id)->toArray();
      $parent = Cate::select('id','name','parent_id')->get()->toArray();
      return view('admin.cate.edit',compact('parent','data','id'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
          ["txtCateName"=>"required"],
          ["txtCateName.required" =>"Xin hay nhap category"]
         );
        $cate = Cate::find($id);
    $cate->name = $request->txtCateName;
    $cate->alias = changeTitle($request->txtCateName);
    $cate->order = $request->txtOrder;
    $cate->parent_id =$request->sltParent;
    $cate->keywords =$request->txtKeywords;
    $cate->description =$request->txtDescription;
    $cate->save(); 
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'sua thanh cong']);

       }
}

