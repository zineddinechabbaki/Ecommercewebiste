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
      <div class="hero_area" >
         <!-- header section strats -->
         @include("home.header")
         <div style="align-self: center">
            @if(session()->has("message"))
         <div class="alert alert-success">
            {{ session()->get("message")}}
         </div>
         @endif
     
         <table class="table ml-10" class="table_cart">
            <thead class="thead-light">
              <tr>
                <th scope="col">product_title </th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">payment_status</th>
                <th scope="col">delivery_status</th>
                <th scope="col">Delete</th>
                
               
              </tr>
            </thead>
            <tbody>
           
                
                @forelse ($allorder as $order)
                <tr>
                
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}$</td>
                    <td><img src="/images/{{ $order->image }}" alt="" style="width:100px;height: 100px;"></td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    @if($order->delivery_status=="processing")
                    <td><a href="{{ route("remove_order",["id"=>$order->id]) }}" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this order ?')">Cancel Order</a></td>
                  @else
                  <td>Not Allowed</td>
                  @endif
                
                </tr> 
                @empty
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X

                    </button>
                    There's not Product!
                </div>
                @endforelse
           
          
            </tbody>
          </table>
        


         </div>
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