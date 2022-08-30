


@extends('layouts.front')

@section('title',$products->name)




@section('content')

<div class="py-3 mb-4 shadow-sm bg-info border-top">


<div class="container">
    <h5 class="mb-0">Collection /{{$products->category->name}}/{{$products->name}}</h5>
</div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
          
                <div class="col-md-4 border-right">
                    <img src="{{asset('prodImage/uploades/'.$products->image)}}"  height="200px"; width="200px"; >
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                    {{$products->name}}
                    @if($products->trending == '1')
                    <label style="font-size:16px" class="float-end badge bg-danger trending_tag" for="">Trending</label>
                    @endif
                    </h2>
                    <hr>
                    <strong><label class="mb-3" for="">Original Price::<s>Rs{{$products->original_price}}</s></label></strong><br>
 
                    <strong><label class="mb-3" for="">Selling Price::Rs{{$products->selling_price}}</label></strong>
          
                     <p class="mt-3">
                       <strong><p>{{ $products->small_description}}</p></strong>
                     </p>
                     <hr>
                     @if($products->qty>0)
                     <label class="badge bg-success" for="">In stock</label>
                     @else
                     <label class="badge bg-danger" for="">out of stock</label>
                     @endif
                     <div class="row mt-2">
                        <div class="col-md-2">
                       
                            <form action="" id="form_refresh"  method="POST">
                                @csrf
                            <input type="hidden" value="{{$products->id}}"  class="product_id">

                            <strong><label  for="">Quantity</label></strong>
                            <div class="input-group text-center  mb-3">
                                <span class="input-group-text inc-btn ">+</span>
                                <input type="text" name="quantity"  value="1" class="form-control quantity-input">
                                <span class="input-group-text dec-btn ">-</span>

                            </div>
                 
                        </div>
                        <div class="col-md-10">
                            <br>
                    
                            <button type="button" class="btn btn-success me-3  float-start">Add to Wishlist<i class="fa fa-heart"></i></button>
                            @if($products->qty>0)
                             <button type="submit" class="btn btn-primary me-3 " id="add_to_cart">Add to Cart <i class="fa fa-shopping-cart"></i> </button><br>
                             @endif
                        </div>
                        </form>
                       <h4>Description</h4>
                        <strong><p>{{ $products->description}}</p></strong>

                     </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
     <div class="container">
        <div class="row">
             <div id="wrapper">
                <ul id="bzoom">
                <li>
                <img class="bzoom_thumb_image" src="{{asset('prodImage/uploades/'.$products->image)}}" title="first img" />
                <img class="bzoom_big_image" src="https://via.placeholder.com/70x70"/>
                </li>
                <li>
                <img class="bzoom_thumb_image" src="{{asset('prodImage/uploades/'.$products->image)}}" title="first img" />
                <img class="bzoom_big_image" src="https://via.placeholder.com/70x70"/>
                </li>
                <li>
                <img class="bzoom_thumb_image" src="{{asset('prodImage/uploades/'.$products->image)}}" title="first img" />
                <img class="bzoom_big_image" src="https://via.placeholder.com/70x70"/>
                </li>
                <li>
                <img class="bzoom_thumb_image" src="{{asset('prodImage/uploades/'.$products->image)}}" title="first img" />
                <img class="bzoom_big_image" src="https://via.placeholder.com/70x70"/>
                </li>

                </ul>

                <script src="{{ asset('plugin/js/jqzoom.js') }}"></script>
                
                <!-- <script
                  src="https://code.jquery.com/jquery-3.6.0.min.js"
                  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                  crossorigin="anonymous"></script> -->
                <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
                 <script type="text/javascript" src="{{ asset('plugin/js/jqzoom.js') }}"></script>
                 <script type="text/javascript">
                $(document).ready(function() {  
                    
               $("#bzoom").zoom({
	              zoom_area_width: 300,
                  autoplay_interval :3000,
                  small_thumbs : 4,
                   autoplay : false
                 });

                });
               </script>
            </div>
        </div>
     </div>

@endsection
@section('scripts')


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.5.0-beta/scripts/jquery.ajaxy.min.js" ></script> -->

    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
     <script src="{{asset('front/js/jquery.min.js')}}"></script> 
    
    <script>
$(document).ready(function() {  

      
$('.inc-btn').click(function(e){

  e.preventDefault();

   var quantity = $('.quantity-input').val();

   var value =parseInt(quantity,10);
   value=isNaN(value)? 0 : value;
   if(value <10){
      value++;
      $('.quantity-input').val(value);
   }

   });
       $('.dec-btn').click(function(e){
          
       e.preventDefault();

      var quantity_dec = $('.quantity-input').val();

      var value =parseInt(quantity_dec,10);
      value=isNaN(value)? 0 : value;
      if(value >1){
          value--;
          $('.quantity-input').val(value);
      }

      });




      $('#add_to_cart').click(function(event){
        event.preventDefault();
        var product_id =$(this).closest('.product_data').find('.product_id').val();
        var product_qty =$(this).closest('.product_data').find('.quantity-input').val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url:"{{url('/add-to-cart')}}",
            data:{
                'product_id':product_id,
                'product_qty':product_qty,


            },
            success:function(response){
                swal(response.status);
               
            }


        });
        

    });
      
      



  });


    
</script>

@endsection