@extends('user.layout')
@section('css')
	<link rel="stylesheet" href="{{asset('user/styleLienhe.css')}}">
@endsection
@section('content')
		<!-- @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}</div> <br>
                @endforeach
            </div>
        @endif -->
		@if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
	<div class="container contact">
		<h5>liên hệ</h5>
		<p>Vui lòng để lại thông tin của bạn:</p>
		<form method="POST" action="{{route('post.page.lienhe')}}" accept-charset="utf-8">
			@csrf
			<div class="form-group">
				<label for="text">họ và tên:(*)</label>
				<input type="text" class="form-control"  placeholder="Enter name" name="fullname">
			</div>
			@if(sizeof($errors) != 0)
              @if($errors)
                <div style="margin-bottom:20px"><span class="text-danger">{{$errors->first('fullname')}}</span></div>
              @endif
            @endif
			<div class="form-group">	
				<label for="email">Email:(*)</label>
				<input type="email" class="form-control" placeholder="Enter email" name="email">
			</div>
			@if(sizeof($errors) != 0)
              @if($errors)
                <div style="margin-bottom:20px"><span class="text-danger">{{$errors->first('email')}}</span></div>
              @endif
            @endif
			<div class="form-group">
				<label for="">số điện thoại</label>
				<input type="text" class="form-control" placeholder="Enter number" name="phone">
			</div>
			@if(sizeof($errors) != 0)
              @if($errors)
                <div style="margin-bottom:20px"><span class="text-danger">{{$errors->first('phone')}}</span></div>
              @endif
            @endif
			<div class="form-group">
				<label for="comment">Comment:</label>
				<textarea class="form-control" rows="5"  name="comment"></textarea>
			</div>
			@if(sizeof($errors) != 0)
              @if($errors)
                <div style="margin-bottom:20px"><span class="text-danger">{{$errors->first('comment')}}</span></div>
              @endif
            @endif
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
