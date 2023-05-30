<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 3px solid green;
            padding-right: 10px;
        }

        .img_size {
            width: 150px;
            height: 150px;
        }

        .td_color {
            background: skyblue;
        }

        .th_deg {
            padding: 30px;
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
                <h2 style="text-align: center; font-size: 40px;">All product</h2>
                <table class="center">
                    <tr class="td_color">
                        <td class="th_deg">Name Product</td>
                        <td class="th_deg">Description</td>
                        <td class="th_deg">Quantity</td>
                        <td class="th_deg">Category</td>
                        <td class="th_deg">Price</td>
                        <td class="th_deg">Discount Price</td>
                        <td class="th_deg">Product Image</td>
                        <td class="th_deg">Delete</td>
                        <td class="th_deg">Edit</td>
                    </tr>
                    </tr>

                    @foreach($product as $item)

                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->catagory}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount_price}}</td>
                        <td>
                            <img class="img_size" src="img/{{$item->image}}" alt="" srcset="">
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger" href="{{url('delete_product',$item->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$item->id)}}">Edit</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>