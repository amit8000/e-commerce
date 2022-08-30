@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>edit/update category</h4>
    </div>
    <div class="card-body">
     <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" value="{{$category->name}}" name="name" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
             <textarea name="description" class="form-control" rows="3">{{$category->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" {{$category->status =='1'?'checked':''}} name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">popular</label>
                <input type="checkbox" {{$category->popular =='1'?'checked':''}} name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
             <textarea name="meta_title" class="form-control" rows="3">{{$category->meta_title}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Descrip</label>
             <textarea name="meta_descrip" class="form-control" rows="3">{{$category->meta_descrip}}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
             <textarea name="meta_keywords" class="form-control" rows="3">{{$category->meta_keywords}}</textarea>
            </div>
            @if($category->image)
            <img src="{{asset('image/uploads/'.$category->image)}}" height="100px;" width="100px;">
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