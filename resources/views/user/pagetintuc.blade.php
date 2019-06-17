@extends('user.layout')
@section('css')
	<link rel="stylesheet" href="{{asset('user/styleTintuc.css')}}">
@endsection
@section('content')
	<div class="container new-boss">
		@if(isset($loaitins))
		<div class="news">
				<div class="menu col-4">
					<ul class="nav nav-pills">
						@foreach($loaitins as $loaitin)
							<li class="nav-item">
								<a class="nav-link" href="">{{$loaitin->tenloaitin}}</a>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="content col-8">
					<h5>{{$loaitin->tenloaitin}}</h5>
					@foreach($tintucs as $tintuc)
						<div class="item">
							<div class="col-4 img">
								<img src="{{asset('uploadTintuc/'.$tintuc->hinh)}}" alt="">
								<div class="overlay">
									<a href="{{route('chitiet2.pagechitiet',['id'=>$tintuc->id])}}" title="xem thêm"><i class="far fa-eye"></i></a>
								</div>
							</div>
							<div class="col-8">
								<h6>{{$tintuc->tieude}}</h6>
								<p>{{$tintuc->tomtat}}</p>
							</div>
						</div>
					@endforeach
				</div>
		</div>
		@endif
		<div class="directional">
			<div class="next">
				<a href="#">trang sau</a>
			</div>
			<div class="prev">
				<a href="#">trang trước</a>
			</div>
		</div>
	</div>
	<div class="width768 container">
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link " href="#">hoạt động</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="file:///D:/do_an_tot_nghiep/trang-con-tin-tuc/index.html">tin tức, hoạt động</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="file:///D:/do_an_tot_nghiep/trang-con-tin-tuc/index.html">tình nguyện viên</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="file:///D:/do_an_tot_nghiep/trang-con-tin-tuc/index.html">hỗ trợ reach</a>
			</li>
		</ul>
	</div>
@endsection