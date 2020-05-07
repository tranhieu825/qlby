@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm tiêu chí đánh giá
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
                                <form role="form" action="{{URL::to('/luu-tcdg')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="tieude" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="noidung" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Độ tuổi</label>
                                    <select name="tuoi" class="form-control input-sm m-bot15">
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
                                    <select name="thang" class="form-control input-sm m-bot15">
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
                                    <select name="tuan" class="form-control input-sm m-bot15">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Điểm số</label>
                                    <input type="text" name="diem" class="form-control" id="exampleInputEmail1" placeholder="Điểm số">
                                </div>
                                <button type="submit" name="them_tcdg" class="btn btn-info">Thêm tiêu chí</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
@endsection