@extends('layouts.front')

@section('title')

checkout

@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-info border-top">


<div class="container">
    <h4 class="mb-0">
        <a href="{{url('/')}}">
            home /

        </a>
        <a href="{{url('checkout')}}">
           checkout 
        </a>

    </h4>
   
</div>
</div>

<div class="container mt-5">
<form action="{{url('place-orders')}}" method="POST">
   @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5>Basic Details</h5>
                    <hr>
                    <div class="row checkout-form">
                    <div class="col-md-6 ">
                        <strong><label style="font-size:large;" for="">First Name</label></strong>
                        <input type="text" name="fname" value="{{Auth::user()->name}}" required class="form-control firstname" placeholder="fname">
                        <strong><span id="fname_error" class="text-danger"></span></strong>
                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">Last Name</label></strong>
                        <input type="text" name="lname" value="{{Auth::user()->lname}}" required class="form-control lastname"placeholder="lname">
                        <strong><span id="lname_error" class="text-danger" ></span></strong>
                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">Email</label></strong>
                        <input type="email" name="email" value="{{Auth::user()->email}}" required class="form-control email " placeholder="email">
                        <strong><span id="email_error "class="text-danger"></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">Phone Number</label></strong>
                        <input type="number" name="phone" value="{{Auth::user()->phone}}" required class="form-control phone " placeholder="phone">
                        <strong><span id="phone_error " class="text-danger" ></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">Address 1</label></strong>
                        <textarea name="address1" required class="form-control address1"  rows="3" placeholder="Address 1">{{Auth::user()->address1}}</textarea>
                        <strong><span id="address1_error " class="text-danger"></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">Address 2</label></strong>
                        <textarea name="address2" required class="form-control address2 "  rows="3" placeholder="Address 2">{{Auth::user()->address2}}</textarea>
                        <strong><span id="address2_error " class="text-danger"></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">city</label></strong>
                        <input type="text" name="city" required class="form-control city " value="{{Auth::user()->city}}" placeholder="city">
                        <strong><span id="city_error" class="text-danger" ></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">state</label></strong>
                        <input type="text" name="state"  value="{{Auth::user()->state}}" required class="form-control state " placeholder="state">
                        <strong><span id="state_error" class="text-danger"></span></strong>

                    </div>
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">country</label></strong>
                        <input type="text" name="country"  value="{{Auth::user()->country}}" required class="form-control country " placeholder="country">
                        <strong><span id="country_error" class="text-danger"></span></strong>

                    </div>

                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">pincode</label></strong>
                        <input type="number" name="pincode"  value="{{Auth::user()->pincode}}" required class="form-control pincode " placeholder="pincode">
                        <strong><span id="pincode_error" class="text-danger"></span></strong>

                    </div>

                   
                    <div class="col-md-6">
                    <strong><label style="font-size:large;" for="">message</label></strong>
                    <textarea name="message" required class="form-control message "  rows="3" placeholder="commen t">{{Auth::user()->message}}</textarea>
                    <strong><span id="message_error" class="text-danger"></span></strong>

                 
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4>Orders Details</h4>
                    <hr>
                 
                
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Product Qty</th>
        <th>Product Price</th>


      </tr>

    </thead>
    <tbody>
        @php $total =0; @endphp
        @foreach($cartItem as $item)
      <tr>
        @php $total +=($item->product->selling_price * $item->prod_qty) @endphp
        <strong><td>{{$item->product->name}}</td></strong>
        <strong><td>{{$item->prod_qty}}</td></strong>
        <strong><td>Rs {{$item->product->selling_price}}</td></strong>

      </tr> 
    
       @endforeach
      

    </tbody>
 
  </table>

  <h6 class="px-2">Grand Total <span class="float-end">Rs {{$total}}</span></h6>
  <input type="hidden" name="total" value="{{$total}}" >

  <br>
 
<button type="submit" class="btn btn-primary float-end w-100 ">place on Order </button>
<button class="btn btn-info float-end w-100  mt-3" id="razorpay_btn">pay with Rozarpay</button>
<a href="#"class="btn btn-dark float-end w-100 cash_on mt-3 ">Cash on delivery</a>









</div>


                
                </div>
            </div>
        </div>
        </form>
    </div>



@endsection
<script src="{{asset('front/js/jquery.min.js')}}"></script> 
<script>
    $(document).ready(function(){
        $('#razorpay_btn').click(function(e){
            e.preventDefault();
    


 var  firstname =$('.firstname').val();
 var  lastname  =$('.lastname').val();
 var  email  =$('.email').val();
 var  phone  =$('.phone ').val();
 var  address1  =$('.address1 ').val();
 var  address2   =$('.address2').val();
 var  city   =$('.city ').val();
 var  state  =$('.state').val();
 var  country  =$('.country').val();
 var  pincode  =$('.pincode ').val();
 var  message  =$('.message ').val();



    if(!firstname){
        fname_error ="First name is required";
        $('#fname_error').html('');
        $('#fname_error').html(fname_error);


    } else{
        fname_error ="";
        $('#fname_error').html('');
    }

    if(!lastname){
        lname_error ="Lastname  is required";
        $('#lname_error').html('');
        $('#lname_error').html(lname_error);


    } else{
        lname_error ="";
        $('#lname_error').html('');
    }

     if(!email){
        email_error ="Email is required";
        $('#email_error').html('');
        $('#email_error').html(email_error);


    } else{
        email_error ="";
        $('#email_error').html('');
    }

    if(!phone){
        phone_error ="Phone is required";
        $('#phone_error').html('');
        $('#phone_error').html(phone_error);


    } else{
        phone_error ="";
        $('#phone_error').html('');
    }

    if(!address1){
        address1_error ="address1  is required";
        $('#address1_error').html('');
        $('#address1_error').html(address1_error);


    } else{
        address1_error ="";
        $('#address1_error').html('');
    }

     if(!address2){
        address2_error ="address2 is required";
        $('#address2_error').html('');
        $('#address2_error').html(address2_error);


    } else{
        address2_error ="";
        $('#address2_error').html('');
    }

    if(!city){
        city_error ="city is required";
        $('#city_error').html('');
        $('#city_error').html(city_error);


    } else{
        city_error ="";
        $('#city_error').html('');
    }

    if(!state){
        state_error ="state is required";
        $('#state_error').html('');
        $('#state_error').html(state_error);


    } else{
        state_error ="";
        $('#state_error').html('');
    }

    if(!country){
        country_error ="country is required";
        $('#country_error').html('');
        $('#country_error').html(country_error);


    } else{
        country_error ="";
        $('#country_error').html('');
    }

    if(!pincode){
        pincode_error ="pincode is required";
        $('#pincode_error').html('');
        $('#pincode_error').html(pincode_error);


    } else{
        pincode_error ="";
        $('#pincode_error').html('');
    }
    if(!message){
        message_error ="pincode is required";
        $('#message_error').html('');
        $('#message_error').html(message_error);


    } else{
        message_error ="";
        $('#message_error').html('');
    }

    //   if(fname_error!=''|| lname_error!=''|| email_error!=''|| phone_error!=''|| address1_error!='' || address2_error!=''|| city_error!=''|| state_error!=''|| country_error!=''|| pincode_error!=''|| message_error!=''){
    //   return false;

    //   }else{

    //     var data={
    //         'firstname': firstname,
    //         'lastname':lastname,
    //         'email':email,
    //         'phone':phone, 
    //         'address1':address1,
    //         'address2': address2,  
    //         'city': city,
    //         'state': state,
    //         'country': country, 
    //         'pincode':  pincode,
    //         'message':  message,


    //     }
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         method:"POST",
    //          url :"/product_to_pay",
    //          data:data,
    //          dataType:JSON,
    //          success: function(response){
    //             alert(response.total_price)

    //          }

    //     });
    //   }


      });

      

        

    });
</script>
