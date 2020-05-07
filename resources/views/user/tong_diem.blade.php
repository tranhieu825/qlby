@extends('user_layout')
@section('user_content')
	@foreach($data as $row)
		<input type="text" name="diem" value="{{$row->diem}}">
	@endforeach
@endsection