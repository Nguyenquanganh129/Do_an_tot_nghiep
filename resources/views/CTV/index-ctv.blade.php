
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
    @include('CTV.layout._header')
    <!-- Page Content -->
    @yield('content')
    <!-- end Page Content -->
   @include('admin.layout.logout')
    <!-- end Footer -->
    <!-- jQuery -->
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/my.js')}}"></script>
    <script src="{{asset('js/multislider.js')}}"></script>
    <script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery-validate/additional-methods.min.js')}}" type="text/javascript"></script>
    <script >
        $('#dangxuat').click(function(){
           $('#exampleModal').modal('show');
        });
         var dem = 0;
         $("#popup_changepass").click(function(event) {
                dem++;
                if (dem%2==1)
                {
                    $(".popup_content").css({
                        'visibility':'visible',
                        'height': '70px',
                        'transition' : 'all 0.2s',
                        'opacity' : '1'
                    }); 
                }
                else
                {
                    $(".popup_content").css({
                        'visibility':'hidden',
                        'height': '0',
                        'transition' : 'all 0.2s',
                        'opacity' : '0.2'
                    });
                }
            });
    </script>
    @yield('js')

    </script>
</body>

</html>
