@extends('admin_layout')
@section('admin_content')
<div class="container">
  <h2>Sửa thông tin khách hàng</h2>
  <?php
  $sua_id_khachhang= Session::get('sua_id_khachhang');
  ?>
   @foreach($sua_thong_tin_khachhang as $key => $cate_pro) 
 <form role="form" action="{{URL::to('/update-khachhang/'.$cate_pro->id_phuhuynh)}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
    <label for="id">id:</label>
    <input type="text" value="{{ $cate_pro->id_phuhuynh}}" name="sua_id_khachhang" class="form-control" >
  </div>
   <div class="form-group">
    <label for="Hoten">Họ Tên:</label>
    <input type="text" value="{{ $cate_pro->hoten}}" name="sua_hoten_khachhang" class="form-control" >
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" value="{{ $cate_pro->email}}" name="sua_email_khachhang" class="form-control" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" value="{{ $cate_pro->password}}" name="sua_password_khachhang" class="form-control" >
  </div>
  <div class="form-group">
    <label for="sdt">Số điện thoại:</label>
    <input type="text" value="{{ $cate_pro->sdt}}" name="sua_sdt_khachhang" class="form-control" >
  </div>
   <div class="form-group">
    <label for="diachi">Địa chỉ:</label>
    <input type="text" value="{{ $cate_pro->diachi}}" name="sua_diachi_khachhang" class="form-control" >
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="remember" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary" name="update_khachhang" >Update</button>
 
</form>
 @endforeach
</div>

@endsection