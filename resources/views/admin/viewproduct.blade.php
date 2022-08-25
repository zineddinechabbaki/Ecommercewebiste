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
                    <h1 class="fonth1">Add Product</h1>
                    <form action="{{ route("addProduct") }}" method="GET">

                        @csrf
                       <div class="form_group">
                        <label for="title">title :</label>
                        <input type="text" name="title" placeholder="Enter Title Of Products" class="padding_text" value="{{ old("title" ?? null) }}">
                       </div>
                        <div class="form_group">
                            <label for="price">price :</label>
                            <input type="text" name="price" placeholder="Enter Price Of Products" class="padding_text" value="{{ old("price" ?? null) }}">
                        </div>
                        <div class="form_group">
                            <label for="quantity">quantity :</label>
                            <input type="text" name="quantity" placeholder="Enter quantity Of Products" class="padding_text" value="{{ old("quantity" ?? null) }}">
                        </div>
                       <div class="form_group">
                            <label for="discount_price">discount_price :</label>
                            <input type="text" name="discount_price" placeholder="Enter discount_price Of Products" class="padding_text" value="{{ old("discount_price" ?? null) }}">
                       </div>
                       <div class="form_group">
                        <label for="description">description :</label>
                        <input type="text" name="description" placeholder="Enter discount_price Of Products" class="padding_text" value="{{ old("description" ?? null) }}">
                       </div>
                       <div class="form_group">
                        <label for="image">image :</label>
                        <input type="file" name="image"  class="padding_text" value="{{ old("title" ?? null) }}">
                       </div>
                       <div class="form_group">
                        <label for="Category">Category :</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="cat_id" >
                            @foreach ($cat as  $ct)
                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
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