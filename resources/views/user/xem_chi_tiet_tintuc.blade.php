@extends('user_layout')
@section('user_content')

 @foreach($xem_chi_tiet_tintuc as $key => $cate_pro) 
  <?php
     echo '<b> <i class="fa fa-caret-right"></i>'.$cate_pro->tieu_de.'</b>';
     echo '</br>';
     echo $cate_pro->created_at;
     echo '</br>';
     echo '</br>';
     echo $cate_pro->mota;
  ?>
  @endforeach
@endsection