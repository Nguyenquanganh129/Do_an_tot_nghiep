@extends('admin.index-admin')
@section('title','Chi Tiết Tin')
@section('css')
<!-- Bootstrap core CSS-->
  <link href="{{asset('fe-admin/app/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('fe-admin/app/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{asset('fe-admin/app/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('fe-admin/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
@endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        @if(isset($tintuc))
        <!-- Blog Post Content Column -->
        <div class="col-lg-9" id="add__comment">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->tieude}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">{{$tintuc->usertintuc->name}}</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{asset('uploadTintuc/'.$tintuc->hinh)}}" width="200px" height="200px" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
            <hr>

            <div class="lead">{!!$tintuc->noidung!!}</div>
            <hr>
            <div class="well">     
            </div>
            <hr>
            <!-- button -->
            @if($tintuc->trangthai == 0)
            <a href="{{route('tintuc.accept.private',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-success">Duyệt Bài</button></a>
            @endif
            @if($tintuc->noibat == 0)
            <a href="{{route('get.tintuc.highlight',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-success">Chọn Làm Bài Nổi Bật</button></a>
            @endif
            @if($tintuc->tinnong == 0)
            <a href="{{route('get.tintuc.hotnews',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-success">Chọn Làm Tin Nóng</button></a>
            @endif
            <a href="{{route('post.tintuc.destroypublic',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-danger">Xóa Bài</button></a>
            @if($tintuc->tinnong == 1)
            <a href="{{route('get.tintuc.unhotnews',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-danger">Hủy Tin Nóng</button></a>
            @endif
            @if($tintuc->noibat == 1)
            <a href="{{route('get.tintuc.unhighlight',['id'=>$tintuc->id])}}" title=""><button type="button" class="btn btn-danger">Hủy Tin Nổi Bật</button></a>
            @endif
            <!-- end button -->
        </div>
        @endif
        <!-- Blog Sidebar Widgets Column -->
    </div>
</div>

@endsection
@section('script')
      <script src="{{asset('fe-admin/app/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('fe-admin/app/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Page level plugin JavaScript-->
      <script src="{{asset('fe-admin/app/chart.js/Chart.min.js')}}"></script>
      <script src="{{asset('fe-admin/app/datatables/jquery.dataTables.js')}}"></script>
      <script src="{{asset('fe-admin/app/datatables/dataTables.bootstrap4.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('fe-admin/js/sb-admin.min.js')}}"></script>
      <!-- Custom scripts for this page-->
      <script src="{{asset('fe-admin/js/sb-admin-datatables.min.js')}}"></script>
      <script src="{{asset('fe-admin/js/sb-admin-charts.min.js')}}"></script>
      <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
      tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        plugins : 'advlist lists charmap print preview'
      });
  </script>
@endsection