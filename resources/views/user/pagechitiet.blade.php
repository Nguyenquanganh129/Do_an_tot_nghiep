@extends('user.layout')
@section('css')
	<link rel="stylesheet" href="{{asset('user/styleChitiet.css')}}">
@endsection
@section('content')
	<div class="container new-boss">
		<div class="news">
			<div class="menu col-4">
				<ul class="nav nav-pills">
					@foreach($loaitins as $loaitin)
						<li class="nav-item">
							<a class="nav-link" href="#">{{$loaitin->tenloaitin}}</a>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="content col-8">
				<h5>{{$loaitin->tenloaitin}}</h5>
				@foreach($loaitin->tintuc as $tintuc)
					<div class="item">
						
						<p>
							{!!$tintuc->noidung!!}
						</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- <div class="directional">
		<div class="prev-next">
			<a href="#"><span><i class="fas fa-backward"></i></span></a>
			<p>1</p>
			<a href="#"><span><i class="fas fa-forward"></i></span></a>
		</div>
	</div> -->
	<div style="background:#fdfbfb">
		<div class="container">
			<div class="col-xl-12" style="margin-top:25px;padding-top:50px; padding-bottom:50px">
				<fb:comments href="http://tin.vn" colorscheme="light" numposts="5" width="50%" margin="auto"></fb:comments>
			</div>
		</div>
	</div>
@endsection