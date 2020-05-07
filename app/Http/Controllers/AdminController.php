<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
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
    public function index(){
    	return view('admin_login');
    }
    public function show_Dashboard(){
      $this->ktra_Login();
    	return view('admin.dashboard');
    }
   public function dashboard(Request $request){
   		$email= $request->email;
   		$password= md5($request->password);

   		$result= DB::table('admin')->where('email',$email)->where('password',$password)->first();
   		if($result)
   		{
   			Session::put('hoten',$result->hoten);
   			Session::put('id',$result->id);
   			return Redirect::to('/dashboard');
   		}
   		else
   		{
   			Session::put('message','Tài khoản hoặc mật khẩu không đúng');
   			return Redirect::to('/admin');
   		}
   }
   public function quan_li_admin()
   {
        $this->ktra_Login();
        return view('admin.quan_li_admin');
   }
   public function logout(){
      $this->ktra_Login();
   		Session::put('hoten',NULL);
   		Session::put('id',NULL);
   		return Redirect::to('/admin');
   }
   ///Trần Trọng Hiếu
      public function admin()
    {
      $this->ktra_Login();
    $quan_li_admin = DB::table('admin')->get();
      return view('admin.quan_li_admin')->with('quan_li_admin',$quan_li_admin);
  
    }
  public function xoa_admin($id_admin)
    {
    DB::table('admin')->where('id',$id_admin)->delete();
    Session::put('message','Xóa thành công');
      return Redirect::to('quan-li-admin');
  
    }
  public function sua_admin($sua_id_admin)
    {
    Session::put('sua_id_admin',$sua_id_admin);
    $sua_thong_tin_admin = DB::table('admin')->where('id',$sua_id_admin)->get();
      return view('admin.sua_thong_tin_admin')->with('sua_thong_tin_admin',$sua_thong_tin_admin);
    }
  public function them_admin(Request $request)
    {
    $data=array();
      $data['id']= $request->id_admin;
    $data['email']= $request->email_admin;
    $data['hoten']= $request->hoten_admin;
    $data['password']= md5($request->pass_admin);
    $data['diachi']= $request->diachi_admin;
    $data['sdt']= $request->sdt_admin;
    $chect= $request->remember;
    if(isset($chect))
    {
      DB::table('admin')->insert($data);
      Session::put('message','Thêm tài khoản admin thành công');
    return Redirect::to('quan-li-admin');
    }
    else{
    Session::put('message','Thêm không thành công ');
    return Redirect::to('quan-li-admin');
    }
    }
  public function update_admin(Request $request, $update_id_admin)
    {
    $data=array();
      $data['id']= $request->sua_id_admin;
    $data['email']= $request->sua_email_admin;
    $data['hoten']= $request->sua_hoten_admin;
    $data['password']= md5($request->sua_password_admin);
    $data['diachi']= $request->sua_diachi_admin;
    $data['sdt']= $request->sua_sdt_admin;
    $chect= $request->remember;
    if(isset($chect))
    {
      DB::table('admin')->where('id',$update_id_admin)->update($data);
      Session::put('message','Update thành công');
    return Redirect::to('quan-li-admin');
    }
    else{
    Session::put('message','Thêm không thành công ');
    return Redirect::to('quan-li-admin');
    }
    }
}
