@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật tiêu chí đánh giá
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
                        @foreach($sua_tcdg as $key => $s_tcdg)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/cap-nhat-tcdg/'.$s_tcdg->id_tcdg)}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value="{{ $s_tcdg->tieude }}" name="tieude" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="noidung" placeholder="Mô tả danh mục">{{ $s_tcdg->noidung }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Điểm số</label>
                                    <input type="text" value="{{ $s_tcdg->diem }}" name="diem" class="form-control" id="exampleInputEmail1" placeholder="Điểm số">
                                </div>
                                <button type="submit" name="cap_nhat_tcdg" class="btn btn-info">Cập nhật tiêu chí</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
@endsection