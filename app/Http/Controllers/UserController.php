<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class UserController extends Controller
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
    public function index(){
    	return view('user_login');
    }
    public function form_dang_ky(){
      return view('dang_ky');
    }
    public function show_Dashboard(){
     $this->ktra_Login();
     $danh_muc= DB::table('danhmuc')->where('trang_thai','0')->orderby('id_danhmuc','desc')->get();
    	return view('user.dashboard')->with('danhmuc',$danh_muc);
    }
     public function dashboard(Request $request){
   		$email= $request->email;
   		$password= md5($request->password);

   		$result= DB::table('phuhuynh')->where('email',$email)->where('password',$password)->first();
   		if($result)
   		{
        Session::put('hoten',$result->hoten);
        Session::put('id_phuhuynh',$result->id_phuhuynh);
   			return Redirect::to('my-dashboard');
   		}
   		else
   		{
   			Session::put('message','Tài khoản hoặc mật khẩu không đúng');
   			return Redirect::to('/');
   		}
   }
   public function quan_li_tk()
   {
      $this->ktra_Login();
      $id_phuhuynh= Session::get('id_phuhuynh');
      $user= DB::table('phuhuynh')->where('id_phuhuynh',$id_phuhuynh)->get();
      return view('user.quan_li_tai_khoan')->with('user',$user);
   }
   public function doi_mat_khau()
   {
      $this->ktra_Login();
      return view('user.doi_mat_khau');
   }
   public function cap_nhat_mat_khau(Request $request){
      $this->ktra_Login();
      $id_phuhuynh= Session::get('id_phuhuynh');
      if($request->password == $request->password_a)
      {
        $data['password'] = md5($request->password);
        DB::table('phuhuynh')->where('id_phuhuynh',$id_phuhuynh)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('doi-mat-khau');
      }
      else
      {
        Session::put('message','Cập nhật không thành công');
        return Redirect::to('doi-mat-khau');
      }
   }
   public function logout(){
      $this->ktra_Login();
   		Session::put('hoten',NULL);
   		Session::put('id_phuhuynh',NULL);
   		return Redirect::to('/');
   }
}
