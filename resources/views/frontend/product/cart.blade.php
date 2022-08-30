@extends('layouts.front')

@section('title')

My cart



@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-info border-top">


<div class="container">
    <h4 class="mb-0">
        <a href="{{url('/')}}">
            home

        </a>
        <a href="{{url('cart')}}">
            cart
        </a>

    </h4>
   
</div>
</div>

<div class="container py-5">
    <div class="card shadow product_data">

      @php $total =0; @endphp
        @foreach($cartItem as $item)
        <div class="card-body">
            <form action="" id="view-cart">
                @csrf
            <div class="row product_data d-flex ">
                <div class="col-md-2">
                    <img src="{{asset('prodImage/uploades/'.$item->product->image)}}" height="100px" width="100px"alt="hgjgj" >
                </div>
                <div class="col-md-3 my-auto">
                   <h5>{{$item->product->name}}</h5>
                   
                </div>
                <div class="col-md-3 my-auto">
                   <h5>Rs {{$item->product->selling_price}}</h5>
                   
                </div>
                <div class="col-md-3">
                   <input type="hidden" class="prod_id" name="prod_id"  value="{{$item->prod_id}}">
                   <strong><label for="">Quantity</label></strong> 
               
                  <div class="input-group text-center  mb-4">
                    <span class="input-group-text changequality inc-btn ">+</span>
                    <input type="text" name="quantity"  value="{{$item->prod_qty}}" class="form-control quantity-input">
                    <span class="input-group-text dec-btn changequality  ">-</span>
                   
               

             
                    <button class="btn btn-danger m-2 delete_cart ">Remove</button>
                
                    </div>
                 
                    </div>
                
            </div>
            </form>
            @php $total += $item->product->selling_price*$item->prod_qty @endphp 
            @endforeach
        </div>
        <div class="card-footer">
            <h4>Total Price: Rs{{$total}}</h4><br>
          @if($total!=0)
          <a href="{{url('checkout')}}"> <button class="btn btn-outline-success float-end ">Proceed To checkout</button></a>
          @else
          <a href="{{url('/')}}"> <button class="btn btn-outline-primary float-end ">continue shopping</button></a>
         @endif

        </div>
    </div>
</div>


@endsection

@section('scripts')

<script src="{{asset('front/js/jquery.min.js')}}"></script> 

 <script>


$(document).ready(function() {  


    $('.inc-btn').click(function(e){

     e.preventDefault();

 //var quantity = $('.quantity-input').val();
 var quantity=$(this).closest('.product_data').find('.quantity-input').val();

 var value =parseInt(quantity,10);
 value=isNaN(value)? 0 : value;
 if(value <10){
    value++;
    $(this).closest('.product_data ').find('.quantity-input').val(value);
 }

 });
     $('.dec-btn').click(function(e){
        
     e.preventDefault();

    //var quantity_dec = $('.quantity-input').val();
 var quantity_dec =$(this).closest('.product_data ').find('.quantity-input').val();


    var value =parseInt(quantity_dec,10);
    value=isNaN(value)? 0 : value;
    if(value >1){
        value--;
        //$('.quantity-input').val(value);
    $(this).closest('.product_data ').find('.quantity-input').val(value);

    }

    });


    $('.delete_cart').click(function(ev){
        ev.preventDefault();
      
     var prod_id =  $(this).closest('.product_data ').find('.prod_id').val();
    
     $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url:"{{url('delete_cart/')}}",
            dataType : 'json',
            data:{
                'prod_id':prod_id,
            },
            success:function(response){
         
            swal('',response.status,'success')
            window.location.reload();

            }


        });
        


    });
    $('.changequality').click(function(e){

        e.preventDefault();
     var product_id =  $(this).closest('.product_data').find('.prod_id').val();
     var product_qty = $(this).closest('.product_data').find('.quantity-input').val();

     
      $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url:"update_cart/",
            dataType : 'json',
            data:{
              'p_id':product_id,
              'p_qty':product_qty,

               },
   
            success:function(response){
              if(response.status == 'true'){
             swal(response.msg);
             window.location.reload();
              }
            }
        });

    });
    $.ajax({
        type:"GET",
        url:"{{url('/load_cart_data')}}",

        success:function(response){
        $('.cart_count').html('');
        $('.cart_count').html(response.count);
          
        }

    });


});
 
   

 

        

    




</script>






@endsection
