@extends('user_layout')
@section('user_content')
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách phiếu đánh giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
     <?php
        $message= Session::get('message');
        if($message)
        {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',NULL);
        }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên bé</th>
            <th>Độ tuổi</th>
            <th> Tháng</th>
            <th> Tuần</th>
            <th> Điểm</th>
            <th>Thời gian tạo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($phieu_danh_gia as $key => $ds_phieu)
          <tr>
            <td>{{ $ds_phieu->hoten }}</td>
            <td><span class="text-ellipsis"></span>{{ $ds_phieu->tuoi }}</td>
            <td><span class="text-ellipsis"></span>{{ $ds_phieu->thang }}</td>
            <td><span class="text-ellipsis"></span>{{ $ds_phieu->tuan }}</td>
            <td><span class="text-ellipsis"></span>{{ $ds_phieu->diem }}</td>
            <td><span class="text-ellipsis"></span>{{ $ds_phieu->created_at }}</td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn sửa?')" href="{{URL::to('/sua-phieu-danh-gia/'.$ds_phieu->id_pdg)}}" class="active styling edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i>

                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::to('/xoa-phieu-danh-gia/'.$ds_phieu->id_pdg)}}" class="active styling delete" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection