@extends('admin.index-admin')
@section('title','Tin Tức Đã Đăng')
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
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Đăng tin</li>
      </ol>
      <div class="card-body">
      <div class="card-header form-card" style="margin-bottom: 10px;">
        <i class="fa fa-table"></i>
        Tạo mới tin tức
      </div>
        <form method="POST" action="{{route('post.tintuc.store')}}" accept-charset="utf-8" enctype="multipart/form-data" id="tintuc">
           @csrf
          <div class="form-group">
            <label>Chọn loại tin cho tin</label>
            @if(isset($loaitins))
              <select class="form-control" name="loaitin_id">
                @foreach($loaitins as $loaitin)
                  <option value="{{$loaitin->id}}">{{$loaitin->tenloaitin}}</option>
                @endforeach
              </select>
            @endif
          </div>
          <div class="form-group">
            <label>Tiêu Đề</label>
            <input class="form-control" name="tieude" type="text" placeholder="Tiêu Đề">
            @if($errors)
              <label style="color: red">{{$errors->first('tieude')}}</label>
            @endif
          </div>
          <div class="form-group">
            <label>Tóm Tắt</label>
            <input class="form-control" name="tomtat" type="text" placeholder="Tóm Tắt">
            @if($errors)
              <label style="color: red">{{$errors->first('tomtat')}}</label>
            @endif
          </div>
          <div class="form-group">
            <label>Tải Ảnh Cho Tin (Vui Lòng Chọn Ảnh 825*465)</label>
            <input class="form-control" name="hinh" type="file" placeholder="Ảnh Cho Tin">
            @if($errors)
              <label style="color: red">{{$errors->first('hinh')}}</label>
            @endif
          </div>
          <div class="form-group">
            <label>Nội Dung</label>
            <textarea class="form-control" name="noidung" id="textcontent"></textarea>
            @if($errors)
              <label style="color: red">{{$errors->first('noidung')}}</label>
            @endif
          </div>     
          <button type="submit" class="btn btn-primary" style="width: 100%">Tạo Mới</button>
        </form>
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'noidung' );
</script>
@endsection