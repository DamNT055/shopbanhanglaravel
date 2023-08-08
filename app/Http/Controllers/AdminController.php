<?php

namespace App\Http\Controllers;
use DB;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }
    public function show_dashboard() {
        $admin_email = Session::get('admin_name');
        $admin_id = Session::get('admin_id');
        if ($admin_email && $admin_id) return view('admin.dashboard');
        return Redirect::to('/login');
    }
    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản không đúng');
            return Redirect::to('/login');
        }        
        return view('admin.dashboard');
    }
    public function logout() {
        Session::forget('admin_name');
        Session::forget('admin_id');
        return Redirect::to('/login');
    }
}
