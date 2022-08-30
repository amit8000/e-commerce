<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products =Products::all();
        return view('admin.products.index',compact('products'));
    }
    public function addProduct(){
        $category = Category::all();
        return view('admin.products.addproducts',compact('category'));
    }
    
   public function insert(Request $request){

    $products = new Products();
    if($request->hasFile('image')){
        $file = $request->file('image');
        $ext =$file->getClientOriginalExtension();
        $filename =time().'.'.$ext;
        $file->move('prodImage/uploades/',$filename);
        $products->image=$filename;
    }
    
    $products->cate_id= $request->input('cate_id');
    $products->name= $request->input('name');
    $products->small_description= $request->input('samll_description');
    $products->description= $request->input('description');
    $products->original_price= $request->input('original_price');
    $products->selling_price= $request->input('selling_price');
    $products->qty= $request->input('qty');
    $products->tax= $request->input('tax');
    $products->status= $request->input('status');
    $products->trending	= $request->input('trending');
    $products->meta_title= $request->input('meta_title');
    $products->meta_keywords= $request->input('meta_keywords');
    $products->meta_description	= $request->input('meta_descrip');
    $products->save();
    return redirect('products')->with('status','Product Added Successfuly');

 
 
}



public function edit($id){
    $products = Products::find($id);
    return view('admin.products.editproduct',compact('products'));
}

public function updateProduct(Request $request,$id){
 $products= Products::find($id);  
 if($request->hasFile('image')){
    $path = 'prodImage/uploades/'.$products->image;
    if(File::exists($path)){
        File::delete($path);
    }
 
    $file = $request->file('image');
    $ext =$file->getClientOriginalExtension();
    $filename =time().'.'.$ext;
    $file->move('prodImage/uploades/',$filename);
    $products->image=$filename;
}


$products->name= $request->input('name');
$products->small_description= $request->input('samll_description');
$products->description= $request->input('description');
$products->original_price= $request->input('original_price');
$products->selling_price= $request->input('selling_price');
$products->qty= $request->input('qty');
$products->tax= $request->input('tax');
$products->status= $request->input('status');
$products->trending	= $request->input('trending');
$products->meta_title= $request->input('meta_title');
$products->meta_keywords= $request->input('meta_keywords');
$products->meta_description	= $request->input('meta_descrip');
$products->update();
return redirect('products')->with('status','Product Update Successfuly');


}

public function deleteProduct($id){
    $products = Products::find($id);
    if($products->image){
        $path = 'prodImage/uploades/'.$products->image;
        if(File::exists($path)){
            File::delete($path);

        }
    }
    $products->delete();

    return redirect('products')->with('status','delete product Successfuly');
}
}