@extends('user_layout')
@section('user_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Kết quả
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
                                <form role="form" action="{{URL::to('/tong-diem')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bé</label>
                                    <input type="text" name="hoten" class="form-control" id="exampleInputEmail1" placeholder="Tên bé">
                                </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Độ tuổi</label>
                                    <select name="tuoi" id="tuoi" class="form-control">
                                        <option value="">Chọn độ tuổi</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Tháng</label>
                                    <select name="thang" id="thang" class="form-control">
                                        <option value="">Chọn tháng</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tuần</label>
                                    <select name="tuan" id="tuan" class="form-control">
                                        <option value="">Chọn tuần</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                   {{csrf_field()}}
                                <center><span class=""><button class="btn btn-info">Xem kết quả</button></span></center>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
@endsection
