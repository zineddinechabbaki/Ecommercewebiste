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
                <table class="table mt-10">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Title </th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Cat Id</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                     
                        @forelse ($product as $pr)
                        <tr>
                            
                            
                            <td>{{ $pr->title }}</td>
                            <td>{{ $pr->description }}</td>
                            <td>{{ $pr->price }}</td>
                            <td>{{ $pr->quantity }}</td>
                            <td>{{ $pr->cat_id }}</td>
                            <td>{{ $pr->discount_price }}</td>
                            <td><img src="/images/{{ $pr->image }}" alt="">
                            <td ><form action="{{ route("DeleteProduct",["id"=>$pr->id]) }}" method="Post">
                                @csrf
                                @method("DELETE")
                                <button  class="btn btn-danger" onclick="return confirm('Are You sure You want to delete this category ?')">Delete</button>
                            </form>
                            
                        </td>
                        <td>
                            <a href="{{ route("EditProduct",["id"=>$pr->id]) }}" class="btn btn-primary" style="">Edit</a>
                        </td>
 
                            
                            
                     </td>
                        
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