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
                @if(session()->has("message"))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X

                    </button>
                    {{ session()->get("message") }}
                </div>
                @endif
                <div class="div_center">

                    <h1 class="fonth1">Add Category</h1>
                    <form action="{{ route("addCat.store") }}" method="POST">
                        @csrf
                        <input class="namecat" type="text" name="name" placeholder="please enter your name">
                        <input type="submit" value="Add Category" class="btn btn-primary">
    
                    </form>

                    <table class="table mt-10">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Categroy Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $cat)
                            <tr>
                                <th scope="row">{{ $cat->id }}</th>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->created_at }}</td>
                                <td><form action="{{ route("addCat.destroy",["addCat"=>$cat->id]) }}" method="Post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger" onclick="return confirm('Are You sure You want to delete this category ?')">Delete</button>
                                </form></td>
                            
                              </tr> 
                            @empty
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    X
            
                                </button>
                                There's not Categroies!
                            </div>
                            @endforelse
                       
                      
                        </tbody>
                      </table>
                      
             
                </div>
               
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