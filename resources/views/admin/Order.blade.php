<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   @include("admin.css")
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include("admin.sidebar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
@include("admin.navbar")
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


              <form action="{{ route("search") }}" style="margin-bottom: 10px;" method="Post">
                @csrf
                <input type="text" name="search" id="" placeholder="Search For Something " style="color:black;">
                <input type="submit" value="Search" class="btn btn-outline-success">
              </form>

                @if(session()->has("message"))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X

                    </button>
                    {{ session()->get("message") }}
                </div>
                @endif
                <table class="table ml" class="table_cart" style="width:1000px">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">name </th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">addresse</th>
                        <th scope="col">product_title</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">image</th>
                        <th scope="col">payment_status</th>
                        <th scope="col">delivery_status</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Delivery</th>
                        <th scope="col">Print Pdf</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                         
                        @forelse ($Orders as $Ord)
                        <tr>
                            
                            
                            <td>{{ $Ord->name }} </td>
                            <td>{{ $Ord->Email }}</td>
                            <td>{{ $Ord->phone }}</td>
                            <td>{{ $Ord->addresse }}</td>
                            <td>{{ $Ord->product_title }}</td>
                            <td>{{ $Ord->price }}$</td>
                            <td>{{ $Ord->quantity }}</td>
                            <td>
                                <img src="/images/{{ $Ord->image }}" alt="" style="width:100px;height: 100px;"></td>
                            </td>
                            <td>{{ $Ord->payment_status }}</td>
                            <td>{{ $Ord->delivery_status }}</td>
                            <td><a href="{{ route("delete_order",["id"=>$Ord->id]) }}" class="btn btn-danger">Delete</a></td>
                            @if($Ord->delivery_status=="Delivered")
                           <td><p style="color:green">Delivered</p></td>
                           @else
                           <td ><a href="{{ route("Delivered",["id"=>$Ord->id]) }}" class="btn btn-primary" onclick=" return confirm('are you sure This Product is Delivered?')">Delivered</a></td>
                           @endif
                           <td><a href="{{ route("printpdf",["id"=>$Ord->id]) }}" class="btn btn-success">Print PDF</a></td>
                          </tr> 

                          
                        @empty
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                X
        
                            </button>
                            There's not Order!
                        </div>
                        @endforelse
                   
                  
                    </tbody>
                  </table>

            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    @include("admin.js")
    <!-- End custom js for this page -->
  </body>
</html>