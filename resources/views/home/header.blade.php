
<header class="header_section" style="font-size: 15px">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url("/") }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url("/") }}">Home <span class="sr-only">(current)</span></a>
                </li>
          
                <li class="nav-item">
                   <a class="nav-link" href="{{ route("allProduct") }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route("blog") }}">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route("contact") }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("show_cart") }}">Cart</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route("AllOrder") }}">Order</a>
               </li>
                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>
              
        <li>       
          @if (Route::has('login'))
         @auth
         <li class="nav-item">
            <x-app-layout>
            </x-app-layout>
         </li>
      
        @else
        <li class="nav-item "><a href="{{ route('login') }}" class="btn btn-primary ">Login</a></li>
        @if (Route::has('register'))
        <li class="nav-item">
         <a href="{{ route('register') }}" class="btn btn-success ">Register</a>
         
        </li>
        @endif
         @endauth
         @endif
         
       </li>
             </ul>
          </div>
       </nav>
    </div>
 </header>