<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_detail',$products->id)}}" class="option1">
                        Product Detail
                     </a>
                     <form action="{{url('add_cart',$products->id)}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1">
                           </div>
                           <div class="col-md-4">
                              <input type="submit" value="Add To Cart">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="img/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->name}}
                  </h5>

                  @if($products->discount_price)
                  <h6 style="color: blue;">
                     Giá mới:
                     <br>
                     ${{$products->discount_price}}
                  </h6>

                  <h6 style="text-decoration: line-through;color: red;">
                     Giá cũ:
                     <br>
                     ${{$products->price}}
                  </h6>

                  @else
                  <h6 style="color: blue;">
                     Giá mới:
                     <br>
                     ${{$products->price}}
                  </h6>

                  @endif

               </div>
            </div>
         </div>
         @endforeach
         <span style="padding-top: 20px; padding-left:20px;">
            {{ $product->links() }}

         </span>

      </div>
   </div>
</section>