<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @forelse ($Products as $Pr)
          <div class="col-sm-6 col-md-4 col-lg-4">
            
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('product_detail',["id"=>$Pr->id]) }}" class="option1">
                     Product Details
                     </a>
                   <form action="{{ route('add_cart',["id"=>$Pr->id]) }}" method="Post">
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
               <div class="img-box">
                  <img src="images/{{ $Pr->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $Pr->title }}
                  </h5>
                  @if($Pr->discount_price!=null)
                  <h6 style="color:red">
                     Discount Price 
                     <br>
                     {{ $Pr->discount_price }}$

                  </h6>
                  <h6 style="text-decoration: line-through; color:blue">
                    Price 
                    <br>
                     {{ $Pr->price }}$
                  </h6>
                  
                  @else
                  <h6 style="color:blue" >
                     Price 
                     <br>
                     {{ $Pr->price }}$
                  </h6>
                  @endif

                 
               </div>
            </div>
       
             
          </div>
          @empty
               
          @endforelse
        
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>