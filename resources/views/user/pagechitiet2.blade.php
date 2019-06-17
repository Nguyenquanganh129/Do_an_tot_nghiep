@extends('user.layout')
@section('css')
	<link rel="stylesheet" href="{{asset('user/styleChitiet.css')}}">
@endsection
@section('content')
	<div class="container new-boss">
		<div class="news">
			
			<div class="content col-8">
				
				@if(isset($tintucs))
					<div class="item">
						<h6 style="color:#eb991b; font-weight:bold">{{$tintucs->tieude}}</h6>
						<p>
							{!!$tintucs->noidung!!}
						</p>
					</div>
				@endif
				<div style="">
					<div class="col-xl-12" style="margin-top:25px;padding-top:50px; padding-bottom:50px">
						<fb:comments href="http://tin.vn" colorscheme="light" numposts="5" width="50%" margin="auto"></fb:comments>
					</div>
				</div>
			
			
				<div class="see-more">
					<h5>tin tức liên quan</h5>
					<ul>
						@foreach($tinlienquans as $tinlienquan)
							<li>
								<a href="{{route('chitiet2.pagechitiet',['id'=>$tinlienquan->id])}}">
									<h6>{{$tinlienquan->tieude}}</h6>
									<img src="{{asset('uploadTintuc/'.$tinlienquan->hinh)}}" width="230" height="200" alt="">
								</a>
							</li>
						@endforeach
					</ul>
				</div>
					
			</div>
			<div class="col-3" style="margin-left:20px">
               <div class="see-more">
					<h5>Tin tức nổi bật</h5>
					<ul>
						@foreach($tinnoibats as $tinnoibat)
							<li>
								<a href="{{route('chitiet2.pagechitiet',['id'=>$tinnoibat->id])}}">
									<h6>{{$tinnoibat->tieude}}</h6>
									<img src="{{asset('uploadTintuc/'.$tinnoibat->hinh)}}" width="230" height="200" alt="">
								</a>
							</li>
						@endforeach
					</ul>
				</div>
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
@endsection