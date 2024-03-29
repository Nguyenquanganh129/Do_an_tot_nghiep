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
        <li class="breadcrumb-item active">Tin tức đã đăng</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>
          Bảng dữ liệu tin tức
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tiêu Đề</th>
                <th>Người Viết</th>
                <th>Loại Tin Của Tin</th>
                <th>Ngày Viết</th>
                <th style="width: 55px;">Tùy Chỉnh</th>
<!--                 <th>Duyệt Nổi Bật</th>
                <th>Duyệt Tin Nóng</th> -->
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>STT</th>
                <th>Tiêu Đề</th>
                <th>Người Viết</th>
                <th>Loại Tin Của Tin</th>
                <th>Ngày Viết</th>
                <th style="width: 55px;">Tùy Chỉnh</th>
<!--                 <th>Duyệt Nổi Bật</th>
                <th>Duyệt Tin Nóng</th> -->
              </tr>
            </tfoot>
            <tbody>
              @if(isset($tintucs))
                @foreach($tintucs as $tintuc)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{route('get.tintuc.view',['id'=>$tintuc->id])}}" title="" style="text-decoration: none;">{{$tintuc->tieude}}</a></td>
                    <td>{{$tintuc->usertintuc->name}}</td>
                    <td>{{$tintuc->tintuctl->tenloaitin}}</td>
                    <td>{{$tintuc->created_at}}</td>
                    <td>
                      <a href="{{route('get.tintuc.update',['id'=>$tintuc->id])}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-pen-fancy"></i> <!-- sửa -->
                      </a>
                      <a href="{{route('post.tintuc.destroypublic',['id'=>$tintuc->id])}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> <!-- xóa -->
                      </a>
                    </td>
                    <!-- <td>
                      <a href="{{route('get.tintuc.highlight',['id'=>$tintuc->id])}}" class="btn btn-sm btn-success">
                        <i class="fas fa-star"></i> 
                      </a>
                    </td>
                    <td>
                      <a href="{{route('get.tintuc.hotnews',['id'=>$tintuc->id])}}" class="btn btn-sm btn-success">
                        <i class="fas fa-fire"></i> 
                      </a>
                    </td>
                  </tr> -->
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
    </div>   
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
  <script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-validate/additional-methods.min.js')}}" type="text/javascript"></script>
@endsection