<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .h2font {
            padding-bottom: 40px;
            font-size: 40px;
            text-align: center;
        }

        .table {
            border: 2px solid green;
            margin: auto;
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
                <h1 class="h2font">All Order</h1>
                <table class="table">
                    <tr>
                        <td>User</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Phone</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Tình trạng</td>
                        <td>Image</td>
                        <td>Xác nhận</td>
                    </tr>
                    @foreach($order as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->product_title}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->delivery_status}}</td>
                        <td><img class="img_size" src="img/{{$item->image}}" alt="" srcset=""></td>
                       
                        <td>
                        @if($item->delivery_status!='Đã xác nhận')
                            <a class="btn btn-primary" href="{{url('delivery',$item->id)}}">Xác nhận</a>
                            @else
                            <p>Đã xác nhận</p>
                            @endif
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