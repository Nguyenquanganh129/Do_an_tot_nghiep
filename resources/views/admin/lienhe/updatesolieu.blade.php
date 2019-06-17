<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Chỉnh sửa thể loại</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('fe-admin/app/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('fe-admin/app/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('fe-admin/css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Chỉnh Sửa Số Liệu</div>
      <div class="card-body">
        <form method="POST" action="" accept-charset="utf-8" enctype="multipart/form-data" id="theloai">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Dự Án</label>
            <input class="form-control" id="exampleInputEmail1" name="duan" type="text" placeholder="Tên Thể Loại" value="{{$solieus->duan}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Số Học Viên</label>
            <input class="form-control" id="exampleInputEmail1" name="hocvien" type="text" placeholder="Tên Thể Loại" value="{{$solieus->hocvien}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Số Giáo Viên</label>
            <input class="form-control" id="exampleInputEmail1" name="giaovien" type="text" placeholder="Tên Thể Loại" value="{{$solieus->giaovien}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hợp Tác Kinh Doanh</label>
            <input class="form-control" id="exampleInputEmail1" name="kinhdoanh" type="text" placeholder="Tên Thể Loại" value="{{$solieus->kinhdoanh}}">
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%">Chỉnh Sửa</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('fe-admin/app/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('fe-admin/app/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('fe-admin/app/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/jquery-validate/additional-methods.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $("#theloai").validate({
      rules:{
          tentheloai:{
              required:true,
              maxlength:200
          }
      },
      messages:{
          tentheloai:{
              required:'Vui lòng nhập tên thể loại',
              maxlength:'Tên thể loại quá dài'
          }
      }
    });
  </script>
</body>

</html>
