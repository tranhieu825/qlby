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
    
    // Trần Hiếu
        public function khachhang()
    {
        $this->ktra_Login();
        $quan_li_khachhang = DB::table('phuhuynh')->get();
        return view('admin.quan_li_khachhang')->with('quan_li_khachhang',$quan_li_khachhang);
  
    }
    public function xoa_khachhang($id_khachhang)
    {
        DB::table('phuhuynh')->where('id_phuhuynh',$id_khachhang)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('quan-li-khachhang');
  
    }
    public function sua_khachhang($sua_id_khachhang)
    {
        Session::put('sua_id_khachhang',$sua_id_khachhang);
        $sua_thong_tin_khachhang = DB::table('phuhuynh')->where('id_phuhuynh',$sua_id_khachhang)->get();
        return view('admin.sua_thong_tin_khachhang')->with('sua_thong_tin_khachhang',$sua_thong_tin_khachhang);
    }
    public function them_khachhang(Request $request)
    {
        $data=array();
        $data['id_phuhuynh']= $request->id_khachhang;
        $data['email']= $request->email_khachhang;
        $data['hoten']= $request->hoten_khachhang;
        $data['password']= md5($request->pass_khachhang);
        $data['diachi']= $request->diachi_khachhang;
        $data['sdt']= $request->sdt_khachhang;
         $data['created_at']= date('Y-m-d H:i:s');
        $chect= $request->remember;
        if(isset($chect))
        {
        DB::table('phuhuynh')->insert($data);
        Session::put('message','Thêm tài khoản phuhuynh thành công');
        return Redirect::to('quan-li-khachhang');
        }
        else{
        Session::put('message','Thêm không thành công ');
        return Redirect::to('quan-li-khachhang');
        }
    }
    public function update_khachhang(Request $request, $update_id_khachhang)
    {
        $data=array();
        $data['id_phuhuynh']= $request->sua_id_khachhang;
        $data['email']= $request->sua_email_khachhang;
        $data['hoten']= $request->sua_hoten_khachhang;
        $data['password']= md5($request->sua_password_khachhang);
        $data['diachi']= $request->sua_diachi_khachhang;
        $data['sdt']= $request->sua_sdt_khachhang;
        $data['updated_at']= date('Y-m-d H:i:s');
        $chect= $request->remember;
        if(isset($chect))
        {
        DB::table('phuhuynh')->where('id_phuhuynh',$update_id_khachhang)->update($data);
        Session::put('message','Update thành công');
        return Redirect::to('quan-li-khachhang');
        }
        else{
        Session::put('message','update không thành công ');
        return Redirect::to('quan-li-khachhang');
        }
    }

    // code tin tức 
     public function tintuc()
    {
        $this->ktra_Login();
        $quan_li_tintuc = DB::table('tintuc')->get();
        return view('admin.quan_li_tintuc')->with('quan_li_tintuc',$quan_li_tintuc);
  
    }
    public function them_tintuc()
    {
        $this->ktra_Login();
        $them_tin_tuc = DB::table('tintuc')->get();
        return view('admin.them_tin_tuc')->with('them_tin_tuc',$them_tin_tuc);
  
    }
    public function insert_tintuc(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data=array();
        $data['tieu_de']= $request->tieude;
        $data['mota']= $request->editor1;
        $data['created_at']= date('Y-m-d H:i:s');
        $get_img= $request->file('file');
        if($get_img)
        {
            $new_img= rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/img/',$new_img);
            $data['img']= $new_img;
        DB::table('tintuc')->insert($data);
        Session::put('message','Thêm tin tức thành công');
        return Redirect::to('quan-li-tintuc');
        }
        else{
        Session::put('message','Thêm không thành công ');
        return Redirect::to('quan-li-tintuc');
        }
    }
    public function sua_tintuc($sua_id_tintuc)
    {
        $this->ktra_Login();
        $sua_tintuc = DB::table('tintuc')->where('id_tintuc',$sua_id_tintuc)->get();
        return view('admin.sua_tintuc')->with('sua_tintuc',$sua_tintuc);
    }
    public function update_tintuc(Request $request, $update_id_tintuc)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data=array();
        $data['tieu_de']= $request->tieude;
        $data['mota']= $request->editor1;
        $data['updated_at']= date('Y-m-d H:i:s');
        $get_img= $request->file('file');
        if($get_img)
        {
            $new_img= rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/img/',$new_img);
            $data['img']= $new_img;
         DB::table('tintuc')->where('id_tintuc',$update_id_tintuc)->update($data);
        Session::put('message','Update thành công');
        return Redirect::to('quan-li-tintuc');
        }
        else{
        Session::put('message','Thêm không thành công ');
        return Redirect::to('quan-li-tintuc');
        }
    }
    public function xoa_tintuc($id_tintuc)
    {
        DB::table('tintuc')->where('id_tintuc',$id_tintuc)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('quan-li-tintuc');
  
    }
    public function xem_tintuc()
    {
        $xem_tintuc = DB::table('tintuc')->orderby('id_tintuc','desc')->get();
        return view('user.xem_tintuc')->with('xem_tintuc',$xem_tintuc);
  
    }
    public function xem_chi_tiet_tintuc($id_tintuc)
    {

        $xem_chi_tiet_tintuc = DB::table('tintuc')->where('id_tintuc',$id_tintuc)->get();
        return view('user.xem_chi_tiet_tintuc')->with('xem_chi_tiet_tintuc',$xem_chi_tiet_tintuc);
  
    }
}
