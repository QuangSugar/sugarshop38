<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function add_brand()
    {
        return view('admin.add_brand');
    }
    public function all_brand()
    {
        $all_brand = DB::table('tbl_brand')->get();
        $manager_brand = view('admin.all_brand')->with('all_brand',$all_brand);
        return view('admin_layout')->with('admin.all_brand',$manager_brand);
    }
    public function save_brand(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand')->insert($data);

        $request->session()->put('message', 'Thêm thương hiệu thành công !');
        return Redirect::to('/add-brand');
    }
    public function unactive_brand($brand_id)
    {
       DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' => 0]);
       Session::put('message', 'Ẩn thương hiệu thành công !');

       return Redirect::to('/all-brand');
    }
    public function active_brand($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' => 1]);
        Session::put('message', 'Hiển thị thương hiệu thành công !');
 
        return Redirect::to('/all-brand');
    }
    public function update_brand($brand_id)
    {
        $update_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
        $manager_brand = view('admin.update_brand')->with('update_brand',$update_brand);

        return view('admin_layout')->with('admin.update_brand',$manager_brand);
    }
    public function edit_brand(Request $request,$brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);

        $request->session()->put('message', 'Cập nhật thương hiệu thành công !');
        return Redirect::to('/all-brand');
    }
    public function delete_brand($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message', 'Xóa thương hiệu thành công !');
 
        return Redirect::to('/all-brand');
    }
}
