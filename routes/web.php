<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/','UserController@index');
Route::get('/dang-ky','UserController@form_dang_ky');
Route::get('/my-dashboard','UserController@show_Dashboard');
Route::get('/logout-user','UserController@logout');
Route::get('/quan-li-tai-khoan','UserController@quan_li_tk');
Route::get('/doi-mat-khau','UserController@doi_mat_khau');
Route::post('/cap-nhat-mat-khau','UserController@cap_nhat_mat_khau');
//
Route::post('/user-dashboard','UserController@Dashboard');


//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_Dashboard');
Route::get('/logout','AdminController@logout');
Route::get('/quan-li-admin','AdminController@quan_li_admin');
//
Route::post('/admin-dashboard','AdminController@Dashboard');
//Trần Trọng Hiếu
Route::get('/quan-li-admin','AdminController@admin');
Route::get('/xoa-admin/{id_admin}','AdminController@xoa_admin');
Route::post('/them-admin','AdminController@them_admin');
Route::get('/sua-admin/{sua_id_admin}','AdminController@sua_admin');
Route::post('/update-admin/{update_id_admin}','AdminController@update_admin');


//DanhMuc
Route::get('/them-danh-muc','danhmuc@them');
Route::get('/sua-danh-muc/{id_danh_muc}','danhmuc@sua_danh_muc');
Route::get('/xoa-danh-muc/{id_danh_muc}','danhmuc@xoa_danh_muc');

Route::get('/unactive-danh-muc/{id_danh_muc}','danhmuc@unactive_danh_muc');
Route::get('/active-danh-muc/{id_danh_muc}','danhmuc@active_danh_muc');

Route::get('/liet-ke-danh-muc','danhmuc@liet_ke'); 
Route::post('/luu-danh-muc','danhmuc@luu_danh_muc');
Route::post('/cap-nhat-danh-muc/{id_danh_muc}','danhmuc@cap_nhat_danh_muc');

//TCDG
Route::get('/them-tcdg','TCDG@them_tcdg');
Route::get('/sua-tcdg/{id_tc_dg}','TCDG@sua_tcdg');
Route::get('/xoa-tcdg/{id_tc_dg}','TCDG@xoa_tcdg');

Route::get('/danh-sach-tcdg','TCDG@danh_sach_tcdg'); 
Route::post('/luu-tcdg','TCDG@luu_tcdg');
Route::post('/cap-nhat-tcdg/{id_tc_dg}','TCDG@cap_nhat_tcdg');

//Phiếu Đánh Giá

//Tạo phiếu
Route::get('/tao-pdg','phieudanhgia@tao_pdg');
Route::get('thang/{id_tuoi}','phieudanhgia@getThang');
Route::get('tuan/{id_thang}','phieudanhgia@getTuan');
Route::get('noidung/{id_tuoi}/{id_thang}/{id_tuan}','phieudanhgia@getNoidung');
Route::get('phieu-danh-gia','phieudanhgia@phieu_danh_gia');
Route::post('/luu-phieu-danh-gia','phieudanhgia@luu_pdg');
//Sửa phiếu đánh giá
Route::get('/sua-phieu-danh-gia/{id_phieu}','phieudanhgia@sua_phieu');
Route::get('sua-phieu-danh-gia/thang/{id_tuoi}','phieudanhgia@getThang');
Route::get('sua-phieu-danh-gia/tuan/{id_thang}','phieudanhgia@getTuan');
Route::get('sua-phieu-danh-gia/noidung/{id_tuoi}/{id_thang}/{id_tuan}','phieudanhgia@getNoidung');
Route::post('/cap-nhat-phieu-danh-gia/{id_phieu}','phieudanhgia@cap_nhat_phieu');
//Xóa phiếu
Route::get('/xoa-phieu-danh-gia/{id_phieu}','phieudanhgia@xoa_phieu');
//xem kết quả
Route::post('/tong-diem','phieudanhgia@tong_diem');
Route::get('/xem-ket-qua','phieudanhgia@xem_ket_qua');

// Trần Hiếu - Quản lí khách hàng
Route::get('/quan-li-khachhang','danhmuc@khachhang');
Route::get('/xoa-khachhang/{id_khachhang}','danhmuc@xoa_khachhang');
Route::post('/them-khachhang','danhmuc@them_khachhang');
Route::get('/sua-khachhang/{sua_id_khachhang}','danhmuc@sua_khachhang');
Route::post('/update-khachhang/{update_id_khachhang}','danhmuc@update_khachhang');
// Trần Hiếu - Quản lí tin tức
 Route::get('/quan-li-tintuc','danhmuc@tintuc');
 Route::get('/them-tintuc','danhmuc@them_tintuc');
 Route::post('/insert-tintuc','danhmuc@insert_tintuc');
 Route::get('/sua-tintuc/{sua_id_tintuc}','danhmuc@sua_tintuc');
 Route::post('/update-tintuc/{update_id_tintuc}','danhmuc@update_tintuc');
 Route::get('/xoa-tintuc/{id_tintuc}','danhmuc@xoa_tintuc');
 Route::get('/xem-tintuc','danhmuc@xem_tintuc');
 Route::get('/xem-chi-tiet-tintuc/{id_tintuc}','danhmuc@xem_chi_tiet_tintuc');
