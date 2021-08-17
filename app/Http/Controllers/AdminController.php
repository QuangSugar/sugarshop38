<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_pass = md5($request->admin_pass);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_pass',$admin_pass)->first();
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->id_admin);
            Session::put('admin_img', $result->admin_image);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác !');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        return Redirect::to('/admin');
    }
}
