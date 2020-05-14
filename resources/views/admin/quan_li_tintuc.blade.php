@extends('admin_layout')
@section('admin_content')
<div class="container">
  <h2>Danh sách tin tức</h2>
     <?php
        $message= Session::get('message');
        if($message)
        {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',NULL);
        }
      ?> 
  <div class="table-responsive">  
  <table class="table table-dark table-striped table-bordered">
    <thead>
      <tr>
        <th style="width:10%">Id</th>
        <th style="width:40%">Tiêu đề</th>
        <th  style="width:20%">Xóa</th>
        <th  style="width:20%">Sửa</th>
      </tr>
    </thead>
      @foreach($quan_li_tintuc as $key => $cate_pro) 
    <tbody>
      <tr>
        <td>{{$cate_pro->id_tintuc}}</td>
        <td>{{$cate_pro->tieu_de}}</td>
        <td><a onclick="return confirm('Bạn có chắc xóa không');" href="{{URL::to('/xoa-tintuc/'.$cate_pro->id_tintuc)}}">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
        </td>
        <td><a href="{{URL::to('/sua-tintuc/'.$cate_pro->id_tintuc)}}">
          <span class="glyphicon glyphicon-cog" ></span>
        </a>
        </td>
      </tr>
    </tbody>
     @endforeach
  </table>
</div>
  <div style="background-color:#FFFFFF">
       <a style="margin: 40%"href="{{URL::to('/them-tintuc/')}}">
          <span class="glyphicon glyphicon-user"> Thêm</span>
        </a>
  </div>
</div>

@endsection