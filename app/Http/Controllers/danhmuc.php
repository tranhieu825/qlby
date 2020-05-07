<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class danhmuc extends Controller
{
	public function ktra_Login()
    {
        $id= Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function them()
    {
    	$this->ktra_Login();
    	return view('admin.them_danh_muc');
    }
    public function liet_ke()
    {
    	$this->ktra_Login();
    	$liet_ke_danh_muc = DB::table('danhmuc')->get();
    	$manager_danh_muc = view('admin.liet_ke_danh_muc')->with('liet_ke_danh_muc',$liet_ke_danh_muc);
    	return view('admin_layout')->with('admin.liet_ke_danh_muc',$manager_danh_muc);
    }
    public function luu_danh_muc(Request $request)
    {
    	$data=array();
    	$data['ten_danh_muc']= $request->ten_danh_muc;
    	$data['mota']= $request->mota;
    	$data['trang_thai']= $request->trang_thai;

    	DB::table('danhmuc')->insert($data);
    	Session::put('message','Thêm danh mục thành công');
    	return Redirect::to('them-danh-muc');
    }
    public function unactive_danh_muc($id_danh_muc)
    {
    	DB::table('danhmuc')->where('id_danhmuc',$id_danh_muc)->update(['trang_thai'=>1]);
    	Session::put('message','Không kích hoạt danh mục thành công');
    	return Redirect::to('liet-ke-danh-muc');
    }
    public function active_danh_muc($id_danh_muc)
    {
    	DB::table('danhmuc')->where('id_danhmuc',$id_danh_muc)->update(['trang_thai'=>0]);
    	Session::put('message','Kích hoạt danh mục thành công');
    	return Redirect::to('liet-ke-danh-muc');
    }
    public function sua_danh_muc($id_danh_muc)
    {
    	$sua_danh_muc = DB::table('danhmuc')->where('id_danhmuc',$id_danh_muc)->get();
    	$manager_danh_muc = view('admin.sua_danh_muc')->with('sua_danh_muc',$sua_danh_muc);
    	return view('admin_layout')->with('admin.sua_danh_muc',$manager_danh_muc);
    }
    public function cap_nhat_danh_muc(Request $request,$id_danh_muc){
    	$data= array();
    	$data['ten_danh_muc']= $request->ten_danh_muc;
    	$data['mota']= $request->mota;
    	DB::table('danhmuc')->where('id_danhmuc',$id_danh_muc)->update($data);
    	Session::put('message','Cập nhật danh mục thành công');
    	return Redirect::to('liet-ke-danh-muc');
    }
    public function xoa_danh_muc($id_danh_muc)
    {
    	DB::table('danhmuc')->where('id_danhmuc',$id_danh_muc)->delete();
    	Session::put('message','Xóa danh mục thành công');
    	return Redirect::to('liet-ke-danh-muc');
    }
}
