@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <h3>Products page</h3>
    </div>
    <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>category</th>
            <th>Name</th>
            <th>Original price</th>
            <th>Selling price</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($products as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->original_price}}</td>
            <td>{{$item->selling_price}}</td>

            <td>
                <img src="{{asset('prodImage/uploades/'.$item->image)}}" alt="image here" height="100px;" width=100px; >
            </td>
            <td>
                <a href="{{url('edit-prod/'.$item->id)}}" onclick="confirm('Are you sure update are not ')"><button class="btn btn-primary">Edit</button></a>
                <a href="{{url('delete-prod/'.$item->id)}}" onclick="confirm('Are you sure delete are not ')" ><button class="btn btn-danger">Delete</button></a>

            </td>

        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</div>

@endsection