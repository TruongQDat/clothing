<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <base href="../public">

    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2font {
            padding-bottom: 40px;
            font-size: 40px;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .text_color {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif

                <div class="div_center">
                    <h1 class="h2font">Edit Product</h1>
                    <form action="{{url('/update_product_comfirm',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Name product:</label>
                            <input style="color:black" type="text" name="name" id="" required="" value="{{$product->name}}">
                        </div>

                        <div class="div_design">
                            <label for="">Description:</label>
                            <input style="color:black" type="text" name="description" id="" required="" value="{{$product->description}}">
                        </div>
                        <div class="div_design">
                            <label for="">Price:</label>
                            <input style="color:black" type="number" name="price" id="" required="" value="{{$product->price}}">
                        </div>
                        <div class="div_design">
                            <label for="">Quantity:</label>
                            <input style="color:black" type="number" min="0" name="quantity" id="" required="" value="{{$product->quantity}}">
                        </div>
                        <div class="div_design">
                            <label for="">Discount Price:</label>
                            <input style="color:black" type="text" name="discount_price" id="" value="{{$product->discount_price}}">
                        </div>
                        <div class="div_design">
                            <label for="">Category:</label>
                            <select class="text_color" name="catagory" required="">
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                                @foreach($catagory as $item)
                                @if($item->catagory_name != $product->catagory)
                                <option value="{{$item->catagory_name}}">
                                    {{$item->catagory_name}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <label for="">Image:</label>
                            <img style="margin: auto;" height="100px" width="100px" src="img/{{$product->image}}" alt="">
                        </div>


                        <div class="div_design">
                            <label for="">Change Image:</label>
                            <input type="file" name="image" id="" >
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>