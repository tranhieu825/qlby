@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục
                        </header>
                        <div class="panel-body">
                            <?php
                                $message= Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',NULL);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luu-danh-muc')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="ten_danh_muc" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="mota" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="trang_thai" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="them_danh_muc" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
@endsection