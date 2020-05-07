@extends('user_layout')
@section('user_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo phiếu đánh giá
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
                            @foreach($ds as $data)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/cap-nhat-phieu-danh-gia/'.$data->id_pdg)}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bé</label>
                                    <input type="text" name="hoten" value="{{ $data->hoten }}"  class="form-control" id="exampleInputEmail1" placeholder="Tên bé">
                                </div>
                            @endforeach
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Độ tuổi</label>
                                    <select name="tuoi" id="tuoi" class="form-control">
                                        <option value="">Chọn độ tuổi</option>
                                         @foreach($danh_sach as $ds_tuoi)
                                        <option value="{{$ds_tuoi->tuoi}}">{{$ds_tuoi->tuoi}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputPassword1">Tháng</label>
                                    <select name="thang" id="thang" class="form-control">
                                        <option value="">Chọn tháng</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tuần</label>
                                    <select name="tuan" id="tuan" class="form-control">
                                        <option value="">Chọn tuần</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tiêu chí đánh giá</label><br>
                                    <div id="noidung"></div>
                                </div>
                                <div id="noidung"></div>
                                   {{csrf_field()}}
                                <button type="submit" name="cap_nhat_pdg" class="btn btn-info">Cập nhật phiếu</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            //thang
            $("#tuoi").change(function(){
                var id_tuoi= $(this).val();
                $.get("thang/"+id_tuoi,function(data){
                    $("#thang").html(data);
                });
            });
            //tuan
            $("#thang").change(function(){
                var id_thang= $(this).val();
                $.get("tuan/"+id_thang,function(data){
                    $("#tuan").html(data);
                });
            });
            //noidung
             $("#tuoi").change(function(){
                var id_tuoi= $(this).val();
                if(id_tuoi)
                {
                    $("#thang").change(function(){
                        var id_thang= $(this).val();
                        if(id_thang){
                            $("#tuan").change(function(){
                                var id_tuan= $(this).val();
                                $.get("noidung/"+id_tuoi+"/"+id_thang+"/"+id_tuan,function(data){
                                    $("#noidung").html(data);
                                });
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection