@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
     <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
             <textarea name="description" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">popular</label>
                <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
             <textarea name="meta_title" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Descrip</label>
             <textarea name="meta_descrip" class="form-control"  rows="3"></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
             <textarea name="meta_keywords" class="form-control"  rows="3"></textarea>
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