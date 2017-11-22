<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cate;
use App\Product;
use App\ProductImage;
use File;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    //
   public function getList(){
    	$product = Product::all();
    	return view('admin.product.list',['product'=>$product]);
    }
    public function getAdd(){

       $cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }
  public function postAdd(ProductRequest $request){
    	// return view('admin.cate.add');
  	// print_r($request->txtCateName);
  	$product = new Product ;
    $file_name = $request->file('fImages')->getClientOriginalName();
    // name', 'alias', 'price','intro','content','image','keywords','description','user_id','cate_id']
  	$product->name = $request->txtName;
  	$product->alias = changeTitle($request->txtName);
  	$product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->image = $file_name;
        $product->user_id = 1;

  	$product->cate_id =$request->sltParent;
    $product->keywords =$request->txtKeywords;
    $product->description =$request->txtDescription;
    $request->file('fImages')->move('public/uploads/images',$file_name);
    $product->save();
    $product_id  = $product->id;
    if($request->hasFile('fProductDetail')){
       foreach ($request->File('fProductDetail') as $file ) {
         # code...
        $product_img = new ProductImage();
        if(isset($file)){
          $product_img->image = $file->getClientOriginalName();
          $product_img->product_id = $product_id; 
          $file->move('public/uploads/images/details', $file->getClientOriginalName());
          $product_img->save();        }
       }
    }

    return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'nhap thanh cong']);
    // ->with(['flash_level'=>'success','flash_message'=>'nhap thanh cong'])
     }

 public function getDelete($id){
     $product_detail = Product::find($id)->pimage->toArray();
     print_r($product_detail);
     foreach ($product_detail as $value ) {
       # code...
      File::delete('public/uploads/images/details/'.$value["image"]);
     }
    $product = Product::find($id);
    File::delete('public/uploads/images/'.$product->image);
    $product->delete($id);
     return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'xoa thanh cong']);
    }
    public function getEdit($id){ 
         $cate = Cate::select('id','name','parent_id')->get()->toArray();
         $product = Product::find($id);
      // $data =Cate::findOrFail($id)->toArray();
      // $parent = Cate::select('id','name','parent_id')->get()->toArray();
         // print_r($product["cate_id"]);
      return view('admin.product.edit',compact('cate','product'));
    }
    public function postEdit(Request $request,$id){
    //     $this->validate($request,
    //       ["txtCateName"=>"required"],
    //       ["txtCateName.required" =>"Xin hay nhap category"]
    //      );
    //     $cate = Cate::find($id);
    // $cate->name = $request->txtCateName;
    // $cate->alias = changeTitle($request->txtCateName);
    // $cate->order = $request->txtOrder;
    // $cate->parent_id =$request->sltParent;
    // $cate->keywords =$request->txtKeywords;
    // $cate->description =$request->txtDescription;
    // $cate->save(); 
    //     return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'sua thanh cong']);

       }
}
