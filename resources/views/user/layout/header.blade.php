<header>
		<!-- star header top-->
		<div class="header-top">
			<div class="container header-top-child">
				<div class="header-top-left">
					<div class="header-top-left1">
						<span><i class="far fa-envelope"></i></span>
						<h6><a href="mailto:contact@reach.org.vn">contact@reach.org.vn</a></h6>
					</div>
					<div class="header-top-left2">
						<span><i class="fas fa-phone"></i></span>
						<h6>+842473021338</h6>
					</div>
				</div>
				<div class="header-top-right">
					<form class="form-inline" action="{{route('search.index')}}" method="GET" id="search">
						<input type="text" class="form-control mb-2 mr-sm-2" id="keySearch" placeholder="search..." name="keyword">
						@if($errors)
		                    <br><span class="text-danger">{{$errors->first('keyword')}}</span>
		                @endif
						<a type="submit"><span> <i class="fas fa-search"></i></span></a>
					</form>
				</div>

			</div>
		</div>
		<div class="header-top-menu">
			<div class="container navbar navbar-expand-md navbar-dark navbar">
				<a href="{{route('page.index')}}">
					<img src="{{asset('user/img/logo-reach.png')}}" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button> 
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						@foreach($menus as $theloai)
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{$theloai->tentheloai}}</a>
								<div class="dropdown-menu">
									@foreach($theloai->loaitin as $loaitin)
										<a class="dropdown-item" 
										<?php
										if($loaitin->id==3 or $loaitin->id==4 or $loaitin->id==16 or $loaitin->id==15){
										?>
										href="/REACH_news/public/pagetintuc/{{$loaitin->id}}"
										<?php
										}
										else
										?>
										href="/REACH_news/public/pagechitiet/{{$loaitin->id}}"
										<?php

										?>>
										<?php
										if($loaitin->id!=17){
										?>
										{{$loaitin->tenloaitin}}
										<?php
										}	
										?>
										</a>
									@endforeach
								</div>
							</li>
						@endforeach
						<li class="nav-item dropdown">
							<a class="nav-link"  href="{{route('get.page.lienhe')}}">liên hệ</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- end header menu -->
	<!--end header-->
	<!-- stat slide -->
	<div class="header-banner">
		@if(isset($slides))
		<div class="owl-carousel owl-theme ">
			@for($i=0; $i < count($slides) ; $i++)
				@if($i==0)
					<div class="item active">
						<div class="img">
							<img class="slide-image" src="uploadSlide/{{$slides[$i]->link}}" alt="">
						</div>
						<div class="bg-overlay">
							<div class="container">
								<h5>trung tâm REACH hà nội</h5>
								<p>học nghề có việc làm </p>
								<p>cho những thanh niên có hoàn cảnh khó khăn</p>
								<a href="#">tìm hiểu thêm</a>
							</div>
						</div>
					</div>
				@else
					<div class="item active">
						<div class="img">
							<img class="slide-image" src="uploadSlide/{{$slides[$i]->link}}" alt="">
						</div>
						<div class="bg-overlay">
							<div class="container">
								<h5>trung tâm REACH hà nội</h5>
								<p>học nghề có việc làm </p>
								<p>cho những thanh niên có hoàn cảnh khó khăn</p>
								<a href="#">tìm hiểu thêm</a>
							</div>
						</div>
					</div>
				@endif
			@endfor
			</div>
			@endif
		</div>
	<!-- end slide -->