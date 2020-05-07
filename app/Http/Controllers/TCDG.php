<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class TCDG extends Controller
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
    public function them_tcdg(){
    	$this->ktra_Login();
    	return view('admin.them_tcdg');
    }
    public function luu_tcdg(Request $request)
    {
    	$data=array();
    	$data['tieude']= $request->tieude;
    	$data['noidung']= $request->noidung;
    	$data['tuoi']= $request->tuoi;
    	$data['thang']= $request->thang;
    	$data['tuan']= $request->tuan;
    	$data['diem']= $request->diem;

    	DB::table('tcdg')->insert($data);
    	Session::put('message','Thêm tiêu chí đánh giá thành công');
    	return Redirect::to('them-tcdg');
    }
    public function danh_sach_tcdg()
    {
    	$this->ktra_Login();
    	$danh_sach_tcdg = DB::table('tcdg')->get();
    	$tcdg = view('admin.danh_sach_tcdg')->with('danh_sach_tcdg',$danh_sach_tcdg);
    	return view('admin_layout')->with('admin.danh_sach_tcdg',$tcdg);
    }
    public function sua_tcdg($id_tc_dg)
    {
    	$this->ktra_Login();
    	$sua_tcdg = DB::table('tcdg')->where('id_tcdg',$id_tc_dg)->get();
    	$tcdg = view('admin.sua_tcdg')->with('sua_tcdg',$sua_tcdg);
    	return view('admin_layout')->with('admin.sua_tcdg',$tcdg);
    }
    public function cap_nhat_tcdg(Request $request,$id_tc_dg){
    	$data= array();
    	$data['tieude']= $request->tieude;
    	$data['noidung']= $request->noidung;
    	$data['diem']= $request->diem;
    	DB::table('tcdg')->where('id_tcdg',$id_tc_dg)->update($data);
    	Session::put('message','Cập nhật tiêu chí thành công');
    	return Redirect::to('danh-sach-tcdg');
    }
    public function xoa_tcdg($id_tc_dg)
    {
    	if($this->ktra_Login())
    	DB::table('tcdg')->where('id_tcdg',$id_tc_dg)->delete();
	    Session::put('message','Xóa thành công');
	    return Redirect::to('danh-sach-tcdg');
    }
}
