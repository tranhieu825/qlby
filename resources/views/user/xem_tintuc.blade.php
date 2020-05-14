@extends('user_layout')
@section('user_content')

 @foreach($xem_tintuc as $key => $cate_pro) 
 <div class="main-title">
                                <i class="fa fa-caret-right"></i>
                                <a title="<?php echo  $cate_pro->tieu_de ?>" href="{{URL::to('/xem-chi-tiet-tintuc/'.$cate_pro->id_tintuc)}}"> <?php echo  $cate_pro->tieu_de ?> </a>
                                <span class="sub-content">
                                   <?php echo  $cate_pro->created_at ?> </a>
                                </span>
        
                                </div>
  @endforeach
@endsection