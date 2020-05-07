@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục
                        </header>
                         <?php
                                $message= Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',NULL);
                                }
                            ?>
                        <div class="panel-body">
                           @foreach($sua_danh_muc as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/cap-nhat-danh-muc/'.$edit_value->id_danhmuc)}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $edit_value->ten_danh_muc }}" name="ten_danh_muc" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="mota" placeholder="Mô tả danh mục">{{( $edit_value->mota )}}</textarea>
                                </div>
                                <button type="submit" name="cap_nhat_danh_muc" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
@endsection