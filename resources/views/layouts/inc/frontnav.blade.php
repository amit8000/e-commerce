<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">lkwshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <strong>  <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a> </strong> 
        </li>
        <li class="nav-item">
        <strong><a class="nav-link" href="{{url('category')}}">category</a></strong> 
        </li>
        <li class="nav-item">
        <strong> <a  style="color:black" class="nav-link" href="{{url('cart')}}">cart<span class="fa fa-shopping-cart bg-info cart_count">0</span></a></strong>
        </li>
     
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                              
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}

                                        <a class="dropdown-item" href="{{url('my-orders')}}">
                                          My orders
                                        </a>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                             
           
                            </li>
                    
                        @endguest
      </ul>
    </div>
  </div>
</nav>
@section('scripts')
<script src="{{asset('front/js/jquery.min.js')}}"></script> 
<script>
 
$(document).ready(function(){
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