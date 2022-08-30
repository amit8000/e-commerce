@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <h3>Category page</h3>
    </div>
    <div class="card-body">
        <!-- table-responsive -->
    <table class="table table-hover table-bordered table-striped ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($category as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>
                <img src="{{asset('image/uploads/'.$item->image)}}" alt="image here" height="100px;" width=100px; >
            </td>
            <td>
                <a href="{{url('edit-cate/'.$item->id)}}" onclick="confirm('Are you sure update are not ')"><button class="btn btn-primary">Edit</button></a>
                <a href="{{url('delete-category/'.$item->id)}}" onclick="confirm('Are you sure delete are not ')" ><button class="btn btn-danger">Delete</button></a>

            </td>            

        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</div>

@endsection