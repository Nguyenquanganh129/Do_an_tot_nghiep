<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title')</title>
  <!-- Bootstrap core CSS-->
  @yield('css')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    @include('admin/layout/header')
    <div class="content-wrapper">
      @yield('content')
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      @include('admin/layout/footer')
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
     @include('admin/layout/logout')
      <!-- Bootstrap core JavaScript-->

    <script src="{{asset('fe-admin/app/jquery/jquery.min.js')}}"></script>
    
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
  @yield('script')
  
</body>

</html>

