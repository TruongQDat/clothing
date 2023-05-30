<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function view_catagory(){
        $data = catagory::all();

        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request){
        $data=new catagory;

        $data->catagory_name = $request->catagory;

        $data->save();
        return redirect()->back()->with('message','Thêm thành công');
    }

    public function delete_catagory($id){
        $data = Catagory::find($id);

        $data->delete();
        return redirect()->back()->with('message','Xóa thành công');

    }

    public function view_product(){
        $catagory = catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request){
        $product=new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;

        $product->image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('img', $request->file('image')->getClientOriginalName(), 'local');

        $product->save();
        return redirect()->back()->with('message','Thêm thành công');
    }

    public function show_product(){
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){
        $product = product::find($id);
        unlink(public_path('img/' . $product->image));
        $product->delete();
        return redirect()->back()->with('message','Xóa thành công');

    }

    public function update_product($id){
        $product = Product::find($id);
        $catagory = Catagory::all();
        return view('admin.update_product',compact('product','catagory'));
    }

    public function update_product_comfirm(Request $request,$id){
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;
        if($request->hasFile('image')){
            if (file_exists(public_path('img/' . $product->image))) {
                unlink(public_path('img/' . $product->image));
            }
            $file = $request->file('image');
             $destinationPath = 'img';
             $fileName = $file->getClientOriginalName();
             $file->move($destinationPath,$fileName);
             $product->image= $fileName;
           }

        $product->save();
        return redirect()->back()->with('message','Sửa thành công');
    }

    public function view_order(){
        $order = order::all();
        return view('admin.view_order',compact('order'));
    }

    public function delivery($id){
        $order = Order::find($id);
        $order->delivery_status = "Đã xác nhận";
        $order->save();
        return redirect()->back();
    }
}
