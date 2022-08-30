@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit /Update product</h4>
    </div>
    <div class="card-body">
     <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">category</label>
            <select class="form-select" class="form-control"name="cate_id">
                <option value="">{{$products->category->name}}</option>
               
            </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$products->name}}" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">small Description</label>
             <textarea name="samll_description" class="form-control"  rows="3">{{$products->small_description}}</textarea>
            </div>
          
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
             <textarea name="description" class="form-control"  rows="3">{{$products->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">original price</label>
                <input type="number" name="original_price" value="{{$products->original_price}}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">selling price</label>
                <input type="number" name="selling_price" value="{{$products->selling_price}}"  class="form-control">
            </div>
           
            <div class="col-md-6 mb-3">
                <label for="">qty</label>
                <input type="number"  value="{{$products->qty}}" name="qty"class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">tax</label>
                <input type="number"  value="{{$products->tax}}" name="tax"class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" name="status" {{$products->status == '1'? 'checked':''}}  value="1">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">trending</label>
                <input type="checkbox" {{$products->trending == '1'? 'checked':''}} value="1" name="trending">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
             <textarea name="meta_title" class="form-control"  rows="3">{{$products->meta_title}}</textarea>
            </div>
          

            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
             <textarea name="meta_keywords" class="form-control"  rows="3">{{$products->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Descrip</label>
             <textarea name="meta_descrip" class="form-control"  rows="3">{{$products->meta_description}}</textarea>
            </div>
            @if($products->image)
            <img src="{{asset('prodImage/uploades/'.$products->image)}}" height="100px;" width="100px;">
            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">update</button>
            </div>

        </div>

     </form>
    </div>
</div>
@endsection