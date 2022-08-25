<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <base href="/public">
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
    <!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include("home.header")
         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                     Our <span>products</span>
                  </h2>
               </div>
               <div class="row">
                 
                  <div class="col-sm-6 col-md-40 col-lg-40 ">
                    
                    <div class="box">
                        {{-- <div class="option_container">
                            <div class="options">
                               <a href="" class="option2">
                               Buy Now
                               </a>
                            </div>
                         </div> --}}
                       <div class="img-box">
                        <img src="images/{{ $Product->image }}" alt="">
                       </div>
                       <div class="">
                          <h5>
                             {{ $Product->title }}
                          </h5>
                          @if($Product->discount_price!=null)
                          <h6 style="color:red">
                             Discount Price 
                             <br>
                             {{ $Product->discount_price }}$
        
                          </h6>
                          <h6 style="text-decoration: line-through; color:blue">
                            Price 
                            <br>
                             {{ $Product->price }}$
                          </h6>
                          
                          @else
                          <h6 style="color:blue" >
                             Price 
                             <br>
                             {{ $Product->price }}$
                          </h6>
                          @endif
                            <H6>Description :{{ $Product->description }}</H6>
                            <H6>Quantity :{{ $Product->quantity }}</H6>
                            <form action="{{ route('add_cart',["id"=>$Product->id]) }}" method="Post">
                                @csrf
                                <div class="row"> 
                                   <div class="col-md-4">
                                      <input type="number" name="quantity" min=1 syle="width:100px;">
                                  
                                   </div>
                                   <div class="col-md-4">
                                      <input type="submit" value="Add To Cart" >
                                   </div>
                                </div>
                              </form>
                         
                       </div>
                    </div>
               
                     
                  </div>
                
                 
               </div>
              
            </div>
         </section>
      </div>

      <!-- footer start -->
    @include("home.footer")
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>


    
 