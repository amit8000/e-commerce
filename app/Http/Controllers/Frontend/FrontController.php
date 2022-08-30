<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
public function index(){
    $feature_product =Products::where('trending', '1')->take(16)->get();
    $trending_category= Category::where('popular','0')->take(15)->get();
    return view ('frontend.index',compact('feature_product','trending_category'));
}

public function category(){
    $category=Category::where('status','1')->get();
    return view('frontend.category',compact('category'));
}
public function viewcategory($slug){

    if(Category::where('slug',$slug)->exists()){
     $category =Category::where('slug',$slug)->first();
     $products =Products::where('cate_id',$category->id)->where('status','1')->get();
     return view('frontend.product.index',compact('category','products'));
    }else{
        return redirect('/')->with('status','sulg doesnot exists ');
    }
    

}

public function productview($cate_slug,$prod_name){
  
    if(Category::where('slug',$cate_slug)->exists()){
     if(Products::where('name',$prod_name)->exists()){
         $products=Products::where('name',$prod_name)->first();
         return view('frontend.product.view',compact('products'));
     }else{
        return redirect('/')->with('status','this link is broken');
     }
    }else{
        return redirect('/')->with('status','no such category found');
    }
}
}
