@extends('layouts.front')

@section('title')

category

@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Caregories</h2>
              <div class="row">
            @foreach($category as $cate)
                    <div class="col-md-2 mb-3">
                        <a href="{{url('view_category/'.$cate->slug)}}">
                        <div class="card">
                            <img src="{{asset('image/uploads/'.$cate->image)}}" height="200px"; width="200px"; alt="category image" >
                            <div class="cart-body">
                                <h4>
                                {{$cate->name}}
                                </h4>
                                <p>{{$cate->description}}</p>

                              </div> 
                        </div>
                        </a>
                    </div>
                
            @endforeach
                
                 </div>
            </div>
        </div>
    </div>

</div>
@endsection