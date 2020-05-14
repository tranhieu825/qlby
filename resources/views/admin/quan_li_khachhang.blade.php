@extends('admin_layout')
@section('admin_content')
<div class="container">
  <h2>Danh sách tài khoản khách hàng</h2>
     <?php
        $message= Session::get('message');
        if($message)
        {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',NULL);
        }
      ?>   
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Id khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Xóa</th>
        <th>Sửa</th>
      </tr>
    </thead>
      @foreach($quan_li_khachhang as $key => $cate_pro) 
    <tbody>
      <tr>
        <td>{{$cate_pro->id_phuhuynh}}</td>
        <td>{{$cate_pro->hoten}}</td>
        <td><a onclick="return confirm('Bạn có chắc xóa không');" href="{{URL::to('/xoa-khachhang/'.$cate_pro->id_phuhuynh)}}">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
        </td>
        <td><a href="{{URL::to('/sua-khachhang/'.$cate_pro->id_phuhuynh)}}">
          <span class="glyphicon glyphicon-cog" ></span>
        </a>
        </td>
      </tr>
    </tbody>
     @endforeach
  </table>
  <div style="background-color:#FFFFFF">
       <a style="margin: 40%" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-user"> Thêm</span>
        </a>
  </div>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm khách hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
     <div class="modal-body">
        <form role="form" action="{{URL::to('/them-khachhang')}}" method="POST">
          {{csrf_field()}}
                <div class="form-group">
                <label for="id">Id khách hàng:</label>
                <input type="text" class="form-control" placeholder="Enter mã khách hàng" name="id_khachhang">
                </div>
                <div class="form-group">
                <label for="hoten">Họ tên:</label>
                <input type="text" class="form-control"  placeholder="Enter họ tên" name="hoten_khachhang">
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email_khachhang">
                </div>
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="pass_khachhang">
                </div>
                <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control" placeholder="Enter sdt" name="sdt_khachhang">
                </div>
                <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" class="form-control"  placeholder="Enter địa chỉ" name="diachi_khachhang">
                </div>
                <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ
                </label>
                </div>
                <button type="submit" class="btn btn-primary" name="them_khachhang">Thêm</button>
          </form>
       </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
   
 
      </div>
    </div>
  </div>
 
</div>

@endsection
