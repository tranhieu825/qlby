@extends('user_layout')
@section('user_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông tin tài khoản
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
                           @foreach($user as $key => $my_user)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/cap-nhat-tai-khoan/'.$my_user->id_phuhuynh)}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                    <input type="text" value="{{ $my_user->hoten }}" name="hoten" class="form-control" id="exampleInputEmail1" placeholder="Họ tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{ $my_user->email }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Năm sinh</label>
                                    <input type="text" value="{{ $my_user->namsinh }}" name="namsinh" 
                                    class="form-control" id="exampleInputEmail1" placeholder="Năm sinh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{ $my_user->sdt }}" name="sdt" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Đại chỉ</label>
                                    <input type="text" value="{{ $my_user->diachi }}" name="diachi" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                                </div>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
@endsection