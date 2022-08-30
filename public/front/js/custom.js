/* <script src="{{asset('front/js/jquery.min.js')}}"></script> 
 
    $(document).ready(function(){
        

        loadcart();
     
        function loadcart(){
            $.ajax({
               
                type:"GET",
                url:"{{url('/load_cart_data')}}",
     
                success:function(response){
                 $('.cart_count').html('');
                 $('.cart_count').html(response.count);
     
     
                    //console.log(response.count)
     
                }
     
            });
        }  

    
    }); */
    
