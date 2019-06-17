<!DOCTYPE html>
<html lang="en">
<head>

    @include('CTV.layout._head')

    
</head>

<body>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Navigation -->
    @yield('content')
    <!-- end Page Content -->
   
    <!-- end Footer -->
    <!-- jQuery -->
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/my.js')}}"></script>
    <script src="{{asset('js/multislider.js')}}"></script>
    <script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery-validate/additional-methods.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $("#search").validate({
            rules:{
                keyword:{
                    required:true,
                    maxlength:200
                }
            },
            messages:{
                keyword:{
                    required:'Vui lòng nhập tiêu đề tin',
                    maxlength:'Tiêu đề tin quá dài'
                }
            }
        });
    </script>
    @yield('js')

    </script>
</body>

</html>
