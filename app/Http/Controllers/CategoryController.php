<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function add_category() {
        return view('admin.add_category');
    }
    public function all_category() {
        return view('admin.all_category');
    }
    public function edit_category($id) {
        $dataEm = DB::table('tbl_category_product')->where('id',$id)->first();
        if (!$dataEm) return view('error.404');
        $manager_category = view('admin.edit_category')->with('data', $dataEm);
        return view('admin_layout')->with('admin.edit_category', $manager_category);
    }
    public function create(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_active;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category');
    }
    public function update(Request $request, $cate_id=0) {
        $dataEm = DB::table('tbl_category_product')->where('id', $cate_id)->first();
        if (!$dataEm) {
            Session::put('message', 'Không tìm thấy id');
            return Redirect::to('edit-category/'.$cate_id);
        }
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        DB::table('tbl_category_product')->where('id', $cate_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('edit-category/'.$cate_id);
    }
    public function delete($cate_id = 0) {
        $dataEm = DB::table('tbl_category_product')->where('id', $cate_id)->first();
        if (!$dataEm) {
            Session::put('message', 'Không tìm thấy id');
            return Redirect::to('all-category');
        }
        DB::table('tbl_category_product')->where('id', $cate_id)->delete();
        Session::put('message', 'Xóa thành công');
        return Redirect::to('all-category');
    }
    public function all() {
        $all_data = DB::table('tbl_category_product')->get();
        $manager_category = view('admin.all_category')->with('all_category', $all_data);
        return view('admin_layout')->with('admin.all_category', $manager_category);
    }
    public function active($cate_id) {
        DB::table('tbl_category_product')->where('id', $cate_id)->update(['category_status'=>1]);
        Session::put('message', 'Kích hoạt thành công');
        return Redirect::to('all-category');
    }
    public function unactive($cate_id) {
        DB::table('tbl_category_product')->where('id', $cate_id)->update(['category_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt thành công');
        return Redirect::to('all-category');
    }
}
