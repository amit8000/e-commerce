<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category =Category::all();
        return view('admin.category.index',compact('category'));
    }
    function addCategory(){
        return view('admin.category.addcategory');
    }

    function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext =$file->getClientOriginalExtension();
            $filename =time().'.'.$ext;
            $file->move('image/uploads/',$filename);
            $category->image=$filename;
        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular')==TRUE ? '1':'0';

        $category->meta_title=$request->input('meta_title');   
        $category->meta_descrip=$request->input('meta_descrip');
        $category->meta_keywords=$request->input('meta_keywords');

         $category->save();
         return redirect('/dashboard')->with('status' ,'Category Added Successfuly');

    }
    public function edit($id){
        $category= Category::find($id);
       return  view('admin.category.editcategory',compact('category'));
    }
    public function updateCategory(Request $request,$id){
        $category =Category::find($id);
        if($request->hasFile('image')){
            $path = 'image/uploads/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext =$file->getClientOriginalExtension();
            $filename =time().'.'.$ext;
            $file->move('image/uploads/',$filename);
            $category->image=$filename;
        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE ? '1':'0';
        $category->popular=$request->input('popular')==TRUE ? '1':'0';

        $category->meta_title=$request->input('meta_title');   
        $category->meta_descrip=$request->input('meta_descrip');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->update();
        return redirect('dashboard')->with('status','updated Successfuly');

     
    }
    public function destroyCategory($id){

        $category = Category::find($id);
        if($category->image){
            $path = 'image/uploads/'.$category->image;
            if(File::exists($path)){
                File::delete($path);

            }
        }
        $category->delete();

        return redirect('categories')->with('status','delete category Successfuly');

    }
}
