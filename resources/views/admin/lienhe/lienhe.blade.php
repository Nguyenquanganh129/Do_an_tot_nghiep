@extends('admin.index-admin')
@section('title','Liên Hệ')
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
    <li class="breadcrumb-item active">Liên Hệ</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>
      Bảng dữ liệu TTLH
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Người Dùng</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Comment</th>
            <th>created at</th>
            <th>Send Mail</th>
          </tr>
        </thead>
        
        <tbody>
          @if(isset($lienhes))
            @foreach($lienhes as $lienhe)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$lienhe->fullname}}</td>
                <td>{{$lienhe->email}}</td>
                <td>{{$lienhe->phone}}</td>
                <td>{{$lienhe->comment}}</td>
                <td>{{$lienhe->created_at}}</td>
                <td>
                  <a href="mailto:{{$lienhe->email}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-pen-fancy"></i>
                  </a>
              </td>
              </tr>
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
<script src="{{asset('fe-admin/app/chart.js/chart.js')}}"></script>
<script src="{{asset('fe-admin/app/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('fe-admin/app/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('fe-admin/js/sb-admin.min.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{asset('fe-admin/js/sb-admin-datatables.min.js')}}"></script>
<script src="{{asset('fe-admin/js/sb-admin-charts.min.js')}}"></script>
<script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-validate/additional-methods.min.js')}}" type="text/javascript"></script>
@endsection