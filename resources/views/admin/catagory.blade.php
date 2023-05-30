<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2font{
            padding-bottom: 40px;
            font-size: 40px;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
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
            <h2 class="h2font">Add Category</h2>
            <form action="{{url('/add_catagory')}}" method="POST">
                @csrf
                <input style="color:black" type="text" name="catagory" id="">
                <input type="submit" class="btn btn-primary" name="submit" value="Add">
            </form>
          </div>

            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>

                @foreach($data as $item)
                <tr>

                    <td>{{$item->catagory_name}}</td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger" href="{{url('delete_catagory',$item->id)}}">Delete</a>
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
