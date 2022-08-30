<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          lkwshop Admin
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('dashboard')? 'active':''}} ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('categories')? 'active':''}} ">
            <a class="nav-link" href="{{url('categories')}}">
              <i class="material-icons">person</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add_category')? 'active':''}}  ">
            <a class="nav-link" href="{{url('add_category')}}">
              <i class="material-icons">person</i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('products')? 'active':''}} ">
            <a class="nav-link" href="{{url('products')}}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add_products')? 'active':''}}  ">
            <a class="nav-link" href="{{url('add_products')}}">
              <i class="material-icons">person</i>
              <p>Add Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="material-icons">content_paste</i>
              <p>Orders</p>
            </a>
            </li>
          <li class="nav-item  ">
            <a class="nav-link" href="">
              <i class="material-icons">person</i>
              <p>users</p>
            </a>
          </li>
        
        </ul>
      </div>
    </div>