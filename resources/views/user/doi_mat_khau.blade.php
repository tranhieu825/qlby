@extends('user_layout')
@section('user_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Đổi mật khẩu
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
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/cap-nhat-mat-khau')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhập mật khẩu mới</label>
                                    <input type="password" value="" name="password" class="form-control" id="exampleInputEmail1" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhập lại mật khẩu mới</label>
                                    <input type="password" value="" name="password_a" class="form-control" id="exampleInputEmail1" placeholder="password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="cap_nhat">Cập nhật mật khẩu</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
@endsection