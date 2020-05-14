@extends('admin_layout')
@section('admin_content')
<div class="container">
<form role="form" action="{{URL::to('/insert-tintuc')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group">
  <label> Tiêu đề:</label> <input type="text" class="form-control" name="tieude">
  </div>
  <div class="form-group">
  <label> Nội dung:</label> <textarea class="form-control" id="editor1" name="editor1"  class="form-control ckeditor" cols="80" rows="10"></textarea>
  </div>
  <div class="form-group">
  <label> Img đại diện:</label> <input type="file" name="file">
  </div>
  <div class="form-group">
  <input type="submit" name="submit" value="Đăng bài">
  </div>
  </form>  
<script>
    CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl: "{{asset('public/ckfinder/ckfinder.html')}}",
    filebrowserUploadUrl: "{{asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files')}}"});
  </script> 
</div>



@endsection