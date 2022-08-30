@extends('layouts.front')

@section('title')

lkwshop

@endsection

@section('content')
@include('layouts.inc.frontslider')
<div class="py-5">
    <div class="container">
        <h3>Feature Product</h3>
        <div class="row">
            @foreach($feature_product as $prod)
            <div class="col-md-3 mt-3">
                <div class="card">
                    <img src="{{asset('prodImage/uploades/'.$prod->image)}}" height="250" width="200" alt="image product">
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <strong>price:-Rs{{$prod->selling_price}}</small></strong><br>
                        <strong><small><s>Rs{{$prod->original_price}}</s></small></strong>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <h3>
            Trending Product</h3>
        <div class="row">
            @foreach($trending_category as $cate)
            <div class="col-md-3 mt-3">
                <a href="{{url('view_category/'.$cate->slug)}}">

                    <div class="card">
                        <img src="{{asset('image/uploads/'.$cate->image)}}" height="250" width="200" alt="image product">
                        <div class="card-body">
                            <h5>{{$cate->name}}</h5>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection