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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
    @include("home.header")
    <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Contact us</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end inner page section -->
     <!-- why section -->
     <section class="why_section layout_padding">
        <div class="container">
        
           <div class="row">
              <div class="col-lg-8 offset-lg-2">
                 <div class="full">
                    <form action="{{ route("addContact") }}" method="Post">
                        @csrf
                       <fieldset>
                          <input type="text" placeholder="Enter your full name" name="name" required />
                          <input type="email" placeholder="Enter your email address" name="email" required />
                          <input type="text" placeholder="Enter subject" name="subject" required />
                          <textarea placeholder="Enter your message" required name="message"></textarea>
                          <input type="submit" value="Submit" />
                       </fieldset>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end why section -->
     <!-- arrival section -->
     <section class="arrival_section">
        <div class="container">
           <div class="box">
              <div class="arrival_bg_box">
                 <img src="images/arrival-bg.png" alt="">
              </div>
              <div class="row">
                 <div class="col-md-6 ml-auto">
                    <div class="heading_container remove_line_bt">
                       <h2>
                          #NewArrivals
                       </h2>
                    </div>
                    <p style="margin-top: 20px;margin-bottom: 30px;">
                       Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                    </p>
                    <a href="">
                    Shop Now
                    </a>
                 </div>
              </div>
           </div>
        </div>
     </section>
      <!-- why section -->
     @include("home.whySection")
      <!-- end why section -->
      
      <!-- arrival section -->

      <!-- end client section -->
      <!-- footer start -->
    @include("home.footer")
      <!-- footer end -->
   
   <div class="cpy_">
       <p class="mx-auto">© 2021 All Rights Reserved By </a><br>
       
          Distributed By zine-eddine chabbaki
       
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
   
    <script type="text/javascript">
    
      function reply(caller){
         $('.comments').insertAfter($(caller));
         $('.comments').show();
      }
          </script>
   </body>
   </html>