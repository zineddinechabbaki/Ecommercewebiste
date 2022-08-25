<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="/public">
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
        {{-- $table->string("description");
        $table->string("image");
        $table->double("price");
        $table->integer("quantity");
        $table->foreignId("cat_id")->constrained("categories");
        $table->double("discount_price"); --}}
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                  @if(session()->has("message"))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                          X
  
                      </button>
                      {{ session()->get("message") }}
                  </div>
                  @endif
                    <h1 class="fonth1">Edit Product</h1>
                    <form action="{{ route("UpdateProduct",["id"=>$Product->id]) }}" method="POST">
@method("PUT")
                        @csrf
                       <div class="form_group">
                        <label for="title">title :</label>
                        <input type="text" name="title" placeholder="Enter Title Of Products" class="padding_text" value="{{ $Product->title}}">
                       </div>
                        <div class="form_group">
                            <label for="price">price :</label>
                            <input type="text" name="price" placeholder="Enter Price Of Products" class="padding_text" value="{{ $Product->price}}">
                        </div>
                        <div class="form_group">
                            <label for="quantity">quantity :</label>
                            <input type="text" name="quantity" placeholder="Enter quantity Of Products" class="padding_text" value="{{ $Product->quantity}}">
                        </div>
                       <div class="form_group">
                            <label for="discount_price">discount_price :</label>
                            <input type="text" name="discount_price" placeholder="Enter discount_price Of Products" class="padding_text" value="{{ $Product->discount_price}}">
                       </div>
                       <div class="form_group">
                        <label for="description">description :</label>
                        <input type="text" name="description" placeholder="Enter description Of Products" class="padding_text" value="{{ $Product->description}}">
                       </div>
                       <div class="form_group">
                        <label for="image">image :</label>
                        <img src="images/{{ $Product->image}}" alt="">
                        <input type="file" name="image" id="" value="">
                       </div>
                       <div class="form_group">
                        <label for="Category">Category :</label>
                       <select name="cat_id" id="">
                        @foreach ($Categories as $cat )
                        
                        <option value="{{ $cat->id }}" @if($cat->id==$Product->cat_id) selected @endif>{{ $cat->name }}</option>
                        
                        @endforeach
                       
                      </select>
                       </div>
                    <div>
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                      

                    </form>
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