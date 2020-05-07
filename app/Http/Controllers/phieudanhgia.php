<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
 
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class phieudanhgia extends Controller
{
    public function ktra_Login()
    {
        $id_phuhuynh= Session::get('id_phuhuynh');
        if($id_phuhuynh){
            return Redirect::to('my-dashboard');
        }
        else{
            return Redirect::to('')->send();
        }
    }
    public function tao_pdg(){
    	$this->ktra_Login();
    	$ds= DB::table('tcdg')->groupBy('tuoi')->get();
    	return view('user.tao_pdg')->with('ds',$ds);
    }
    public function getThang($id_tuoi){
    	$this->ktra_Login();
    	$ds= DB::table('tcdg')->where('tuoi',$id_tuoi)->groupBy('thang')->get();
    	foreach ($ds as $row	) {
    		echo "<option value='".$row->thang."'>".$row->thang."</option>";
    	}
    }
    public function getTuan($id_thang){
    	$this->ktra_Login();
    	$ds= DB::table('tcdg')->where('thang',$id_thang)->groupBy('tuan')->get();
    	foreach ($ds as $row	) {
    		echo "<option value='".$row->tuan."'>".$row->tuan."</option>";
    	}
    }
    public function getNoidung($id_tuoi,$id_thang,$id_tuan){
    	$this->ktra_Login();
    	$ds= DB::table('tcdg')->where('tuoi',$id_tuoi)->where('thang',$id_thang)->where('tuan',$id_tuan)->get();
    	foreach ($ds as $row) {
    		echo "<input type='checkbox' name='noidung[]' value='".$row->diem."'> ".$row->noidung." <br>";
    	}
    }
    public function luu_pdg(Request $request)
    {
    	$this->ktra_Login();
    	$id_phuhuynh= Session::get('id_phuhuynh');
    	$dt = Carbon::now('Asia/Ho_Chi_Minh');    
    	$ktra= array();
    	$ktra= DB::table('phieudanhgia')->where('id_phuhuynh',$id_phuhuynh)->get();
    	$data=array();
		$data['id_phuhuynh']=$id_phuhuynh;
		$data['hoten']= $request->hoten;
		$data['tuoi']= $request->tuoi;
		$data['thang']= $request->thang;
		$data['tuan']= $request->tuan;
		$data['diem']= array_sum($request->noidung);
		if($ktra == '')
        {
            DB::table('phieudanhgia')->insert($data);
            Session::put('message','Đánh giá thành công');
            return Redirect::to('phieu-danh-gia');
        }
        else
        {
            foreach ($ktra as $row) {
                $ht= $row->hoten;
                $t= $row->created_at;
            }
            if($ht == $data['hoten'])
            {
                if($t == $dt->toDateString())
                {
                    Session::put('message','Đã tồn tại phiếu đánh giá của bé ngày hôm nay');
                    return Redirect::to('tao-pdg');
                }
                else
                {
                    DB::table('phieudanhgia')->insert($data);
                    Session::put('message','Đánh giá thành công');
                    return Redirect::to('phieu-danh-gia');
                }
            }
            else
            {
                DB::table('phieudanhgia')->insert($data);
                Session::put('message','Đánh giá thành công');
                return Redirect::to('phieu-danh-gia');
            }
        }
    }
    public function phieu_danh_gia()
    {
    	$this->ktra_Login();
    	$id_phuhuynh= Session::get('id_phuhuynh');
    	$phieu_danh_gia = DB::table('phieudanhgia')->where('id_phuhuynh',$id_phuhuynh)->orderBy('created_at','desc')->get();
    	$ds = view('user.phieu_danh_gia')->with('phieu_danh_gia',$phieu_danh_gia);
    	return view('user_layout')->with('user.phieu_danh_gia',$ds);
    }
    public function sua_phieu($id_phieu){
    	$this->ktra_Login();
    	$ds= DB::table('phieudanhgia')->where('id_pdg',$id_phieu)->get();
    	$danh_sach= DB::table('tcdg')->groupBy('tuoi')->get();
    	return view('user.sua_pdg')->with('ds',$ds)->with('danh_sach',$danh_sach);
    }
    public function cap_nhat_phieu(Request $request,$id_phieu)
    {
    	$this->ktra_Login();
    	$id_phuhuynh= Session::get('id_phuhuynh');
    	$dt = Carbon::now('Asia/Ho_Chi_Minh');    
    	$ktra= array();
    	$ktra= DB::table('phieudanhgia')->where('id_pdg',$id_phieu)->get();
    	$data=array();
		$data['id_phuhuynh']=$id_phuhuynh;
		$data['hoten']= $request->hoten;
		$data['tuoi']= $request->tuoi;
		$data['thang']= $request->thang;
		$data['tuan']= $request->tuan;
		$data['diem']= array_sum($request->noidung);
		foreach ($ktra as $kt) {
			$t= $kt->created_at;
		}
		if($t == $dt->toDateString())
		{
			DB::table('phieudanhgia')->where('id_pdg',$id_phieu)->update($data);
			Session::put('message','Cập nhật đánh giá thành công');
			return Redirect::to('phieu-danh-gia');
		}
		else
		{
			Session::put('message','Phiếu đã hết hạn để sửa');
			return Redirect::to('phieu-danh-gia');
		}
    }
    public function xoa_phieu($id_phieu)
    {
    	$this->ktra_Login();
    	DB::table('phieudanhgia')->where('id_pdg',$id_phieu)->delete();
    	Session::put('message','Xóa thành công');
    	return Redirect::to('phieu-danh-gia');
    }
    public function xem_ket_qua()
    {
        $this->ktra_Login();
        return view('user.xem_ket_qua');
    }
    public function tong_diem(Request $request){
        $this->ktra_Login();
        $id_phuhuynh= Session::get('id_phuhuynh');
        $hoten= $request->hoten;
        $tuoi= $request->tuoi;
        $thang= $request->thang;
        $tuan= $request->tuan;
        $data= array();
        $data= DB::table('phieudanhgia')->where('id_phuhuynh',$id_phuhuynh)->where('hoten',$hoten)->where('tuoi',$tuoi)->where('thang',$thang)->where('tuan',$tuan)
        ->get();
        $ds = view('user.tong_diem')->with('data',$data);
        return view('user_layout')->with('user.tong_diem',$ds);
    }
}
