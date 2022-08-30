@extends('layouts.front')

@section('title')

<h3 >{{$category->name}}</h3>



@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-info border-top">


<div class="container">
<h5 class="mb-0">Collection /{{$category->name}}</h5>
</div>
</div>
<div class="py-5">
    <div class="container">
  
        <div class="row">
        <h3 >{{$category->name}}</h3>
        

          
    
            @foreach($products as $prod)
                    <div class="col-md-2 mb-3">
                       
                        <div class="card">
                           
                        <a href="{{url('category/'.$category->slug.'/'.$prod->name)}}">
                      
                            <img src="{{asset('prodImage/uploades/'.$prod->image)}}" height="200px"; width="200px"; alt="product image" >
                            <div class="cart-body">
                                <h6>
                                {{$prod->name}}
                                </h6>
                                <span class="float-start">price:-Rs{{$prod->selling_price}}</span>
                                <span class="float-end"><s>price:-Rs{{$prod->original_price}}</s></span>

                            
                            </div>
                        </a>
                        </div>
                    </div>
                   @endforeach
                 </div>
                
        
            </div>
        </div>

@endsection