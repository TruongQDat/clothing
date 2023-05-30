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
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    @if(session()->has('message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>

    @endif

    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>

            <div>
                <?php $tong = 0; ?>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="img/{{$item->image}}" alt="Sản phẩm 1" class="img-responsive" width="100">
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">{{$item->product_title}}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$item->quantity}}
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$item->price}}</td>
                        <td class="actions" data-th="">
                            <a onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger" href="{{url('/remove_cart',$item->id)}}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                </tbody>
                <?php $tong = $tong +  $item->price ?>
                @endforeach
                <tfoot>
                    <tr>
                        <td><a href="{{url('')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center"><strong>Tổng tiền ${{$tong}} </strong>
                        </td>
                        <td><a href="{{'cash_order'}}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                </tfoot>

            </div>

        </table>
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