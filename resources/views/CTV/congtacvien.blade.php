@extends('CTV.index-ctv')
@section('title','Cộng tác viên')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/cong_tac_vien.css')}}">
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="menu_post">
					<div class="menu_title">
						<h4>Bài viết đang chờ duyệt</h4>
					</div>
					<div class="menu_content">
						<ul>
							@if(isset($tin_dang_doi))
								@foreach($tin_dang_doi as $tin)
									<li>
										<div class="image_new">
											<img src="{{asset('uploadTintuc/'.$tin->hinh)}}" alt="">
										</div>
										<div class="title_new">
											<p><a href="{{route('ctv.view',['id'=>$tin->id])}}" title="">{{$tin->tieude}}</a></p>
										</div>
										<div class="clearfix"></div>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            {{$tin_dang_doi->links()}}
                        </ul>
                    </div>
                </div>
				</div>
			</div>
			@if(session('thongbao'))
	            <div class="alert alert-success">
	                {{session('thongbao')}}
	            </div>
        	@endif
			<div class="col-md-9">
				<div class="title_ctv col-md-12 col-sm-12 col-xs-12">
					<h3>Cộng Tác Viên Viết Bài</h3>
				</div>
				<div class="form_content">
					<form action="{{route('ctv.store')}}" method="post" accept-charset="utf-8" id="tintuc" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Chọn loại tin cho tin</label>
							<select class="form-control" name="loaitin_id">
				                  <option value="">Chọn loại tin</option>
				                  @if(isset($loaitin))
				                  	@foreach($loaitin as $lt)
				                  		<option value="{{$lt->id}}">{{$lt->tenloaitin}}</option>
				                  	@endforeach
				                  @endif
		              		</select>
						</div>
						<div class="form-group">
				            <label>Tiêu Đề</label>
				            <input class="form-control input_tieude" name="tieude" type="text" placeholder="Tiêu Đề">
				             	@if($errors)
					              <br><span class="text-danger">{{$errors->first('tieude')}}</span>
					            @endif
		         		</div>
		         		<div class="form-group">
				            <label>Tóm Tắt</label>
				            <input class="form-control input_tomtat" name="tomtat" type="text" placeholder="Tóm Tắt">
				            	@if($errors)
					              <br><span class="text-danger">{{$errors->first('tomtat')}}</span>
					            @endif
		          		</div>
		          		<div class="form-group">
				            <label>Tải Ảnh Cho Tin</label>
				            <input class="form-control" name="hinh" type="file" placeholder="Ảnh Cho Tin">
				            	@if($errors)
					              <br><span class="text-danger">{{$errors->first('hinh')}}</span>
					            @endif
			          	</div>
			          	<div class="form-group">
				            <label>Nội Dung</label>
				            <textarea class="form-control input_noidung" name="noidung" id="textcontent"></textarea>
				            @if($errors)
				              <br><span class="text-danger">{{$errors->first('noidung')}}</span>
				            @endif
		          		</div>
		          		<button type="submit" class="btn btn-primary" style="width: 100%">Đăng Bài</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')   
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'noidung' );
    </script>
	

@endsection
