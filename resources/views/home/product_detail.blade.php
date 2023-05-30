<!DOCTYPE html>
<html>

<head>
   <base href="../public">
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
      @include('home.header')
      <!-- end header section -->
      <!-- footer start -->




      <h1 style="font-size: 50px; text-align:center;">Sản phẩm chi tiết</h1>

      <div class="container">
         <div class="card">

            <div class="container-fliud">
               <div class="wrapper row">
                  <div class="preview col-md-6">
                     <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="img/{{$product->image}}" alt="">
                        </div>
                     </div>
                     <ul class="preview-thumbnail nav nav-tabs">
                        <div class="logo_menuchinh" style="float:left; padding-top:5px; padding-left:10px; color:#fff; margin-left:auto; margin-right:auto; text-align:center; line-height:40px; font-size:16px;font-weight:bold;font-family:Arial">HOCWEBGIARE.COM</div>

                     </ul>
                  </div>
                  <div class="details col-md-6">
                     <h3 class="product-title">{{$product->name}}</h3>
                     <br>
                     <p class="product-description">{{$product->description}}</p>
                     <br>
                     @if($product->discount_price)
                     <h4 class="price" style="color: blue;">Giá bán mới: ${{$product->discount_price}}</h4>
                     <br>
                     <h4 class="price" style="text-decoration: line-through;color: red;">Giá bán cũ: ${{$product->price}}</h4>
                     @else
                     <h4 class="price" style="color: blue;">Giá bán: ${{$product->price}}</h4>
                     @endif
                     <br>
                     <br>
                     <form action="{{url('add_cart',$product->id)}}" method="post">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1">
                        <br>
                        <h5 class="sizes">Loại: <span class="size" data-toggle="tooltip" title="xtra large">{{$product->catagory}}</span>
                        </h5>
                        <br>

                        <input type="submit" value="Mua ngay">

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
</body>

</html>