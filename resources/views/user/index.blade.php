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
</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2235652103417800&autoLogAppEvents=1"></script>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
			appId      : '2162105097453136',
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
	@include('user.layout.header')
	<!-- end slide -->
	@include('user.layout.content')
<!-- star footer -->
	@include('user.layout.footer')
<div id="back-to-top">
	<span>
		<i class="fas fa-arrow-up"></i>
	</span>
</div>
    <script src="{{asset('user/js/jquery-3.3.1.min.js')}}"></script>
   	
    <script>
    	$(document).ready(function(e){
			$('#youtube a').on('click',function(e){		 
			e.preventDefault();
		 	var video_url = $(this).attr('href');			
			var video_id = video_url.substring(video_url.search('=')+1,video_url.length);			
			$('#my_player DIV').html('<iframe width="750" height="400" src="https://www.youtube.com/embed/' + video_id + '" frameborder="0" allowfullscreen></iframe>');		 
			  $('#my_player').fadeIn(500);		 
			});		 		 
			$('#my_player').on('click',function(e){
				$('#my_player').fadeOut(500);
				$('#my_player DIV').empty();
			});		 		 
		});
    </script>
    <script src="{{asset('user/js/popper.min.js')}}"></script>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/js/owl.carousel.js')}}"></script>
    <script src="{{asset('user/js/all.min.js')}}"></script>
    <script src="{{asset('user/js/project.js')}}"></script>
</body>
</html>