<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function add_category()
    {
        return view('admin.add_category');
    }
    public function all_category()
    {
        $all_category = DB::table('tbl_category')->get();
        $manager_category = view('admin.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category);
    }
    public function save_category(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category')->insert($data);

        $request->session()->put('message', 'Thêm danh mục thành công !');
        return Redirect::to('/add-category');
    }
    public function unactive_category($category_id)
    {
       DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status' => 0]);
       Session::put('message', 'Ẩn danh mục thành công !');

       return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message', 'Hiển thị danh mục thành công !');
 
        return Redirect::to('/all-category');
    }
    public function update_category($category_id)
    {
        $update_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
        $manager_category = view('admin.update_category')->with('update_category',$update_category);

        return view('admin_layout')->with('admin.update_category',$manager_category);
    }
    public function edit_category(Request $request,$category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;

        DB::table('tbl_category')->where('category_id',$category_id)->update($data);

        $request->session()->put('message', 'Cập nhật danh mục thành công !');
        return Redirect::to('/all-category');
    }
    public function delete_category($category_id)
    {
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message', 'Xóa danh mục thành công !');
 
        return Redirect::to('/all-category');
    }
}
