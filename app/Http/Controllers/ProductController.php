<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function add_product()
    {
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('category',$category)->with('brand',$brand);
    }
    public function all_product()
    {
        $all_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['brand_id'] = $request->brand;
        $data['category_id'] = $request->category;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
       

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.substr(md5(rand()), 0, 10).rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);

        $request->session()->put('message', 'Thêm sản phẩm thành công !');
        return Redirect::to('/add-product');
        }
        $data['product_image'] = "";
        DB::table('tbl_product')->insert($data);
        $request->session()->put('message', 'Thêm sản phẩm thành công !');
        return Redirect::to('/add-product');
    }
    public function unactive_product($product_id)
    {
       DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 0]);
       Session::put('message', 'Ẩn sản phẩm thành công !');

       return Redirect::to('/all-product');
    }
    public function active_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 1]);
        Session::put('message', 'Hiển thị sản phẩm thành công !');
 
        return Redirect::to('/all-product');
    }
    public function update_product($product_id)
    {
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $update_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.update_product')->with('update_product',$update_product)->with('category',$category)->with('brand',$brand);
        

        return view('admin_layout')->with('admin.update_product',$manager_product);
    }
    public function edit_product(Request $request,$product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['brand_id'] = $request->brand;
        $data['category_id'] = $request->category;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.substr(md5(rand()), 0, 10).rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);

            $request->session()->put('message', 'Cập nhật sản phẩm thành công !');
            return Redirect::to('/all-product');
        }
        $data['product_image'] = "";
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        $request->session()->put('message', 'Cập nhật sản phẩm thành công !');
        return Redirect::to('/all-product');
    }

    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công !');
 
        return Redirect::to('/all-product');
    }
}
