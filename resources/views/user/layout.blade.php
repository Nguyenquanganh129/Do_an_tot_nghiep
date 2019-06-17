<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<title>REACH-center</title>
		<link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('user/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('user/style.css')}}">
	    @yield('css')
	</head>
	<body>

		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2235652103417800&autoLogAppEvents=1"></script>
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
				appId      : '2235652103417800',
				cookie     : true,
				xfbml      : true,
				version    : 'v3.2'
			});
			  
			FB.AppEvents.logPageView();   
			  
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js";
				zjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			// kiểm tra trạng thái đăng nhập
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
			//
			function checkLoginState() {
				FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
				});
			}
		</script>
		<!-- star header top-->
		<header>
			<!-- star header top-->
			<div class="header-top">
				<div class="container header-top-child">
					<div class="header-top-left">
						<div class="header-top-left1">
							<span><i class="far fa-envelope"></i></span>
							<h6>ongluong96@gmail.com</h6>
						</div>
						<div class="header-top-left2">
							<span><i class="fas fa-phone"></i></span>
							<h6>0859910286</h6>
						</div>
					</div>
					<div class="header-top-right">
						<form class="form-inline" action="/action_page.php">
							<input type="text" class="form-control mb-2 mr-sm-2" id="email2" placeholder="search..." name="email">
							<a href="#"><span> <i class="fas fa-search"></i></span></a>
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
		@yield('content')
		@include('user.layout.footer')
		<div id="back-to-top">
			<span>
				<i class="fas fa-arrow-up"></i>
			</span>
		</div>
	 	<script src="{{asset('user/js/jquery-3.3.1.min.js')}}"></script>
	    <script src="{{asset('user/js/popper.min.js')}}"></script>
	    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
	    <script src="{{asset('user/js/owl.carousel.js')}}"></script>
	    <script src="{{asset('user/js/all.min.js')}}"></script>
	    <script src="{{asset('user/js/project.js')}}"></script>
	    @yield('script')
	</body>
</html>