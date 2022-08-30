@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
     <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
            <select class="form-select" class="form-control"name="cate_id">
                <option value="">Select a category</option>
                 @foreach($category as $item)
                 <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">small Description</label>
             <textarea name="samll_description" class="form-control"  rows="3"></textarea>
            </div>
          
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
             <textarea name="description" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">original price</label>
                <input type="number" name="original_price"class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">selling price</label>
                <input type="number" name="selling_price"class="form-control">
            </div>
           
            <div class="col-md-6 mb-3">
                <label for="">qty</label>
                <input type="number" name="qty"class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">tax</label>
                <input type="number" name="tax"class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" name="status" value="1">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">trending</label>
                <input type="checkbox" value="1" name="trending">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
             <textarea name="meta_title" class="form-control"  rows="3"></textarea>
            </div>
          

            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
             <textarea name="meta_keywords" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Descrip</label>
             <textarea name="meta_descrip" class="form-control"  rows="3"></textarea>
            </div>
             <div class="col-md-12">
            <input type="file" name="image" class="form-control">
            </div>
        

            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">submit</button>
            </div>

        </div>

     </form>
    </div>
</div>
@endsection



