@extends('CTV.index-ctv')
@section('title','Đổi avatar')
@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
			  	<div class="panel-heading">Đổi avatar</div>
			  	<div class="panel-body">
			    	<form method=""  action="" accept-charset="utf-8" enctype="multipart/form-data" id="signup">
                        @csrf
						<div>
                            <label>Tải ảnh avatar của bạn</label>
                            @if(sizeof($errors))
                                @if($errors)
                                    <br>
                                    <label style="color: red">{{$errors->first('avatar')}}</label>
                                @endif
                            @endif
                            <input type="file" class="form-control" name="avatar" aria-describedby="basic-addon1" id="avatar" accept="image/*" onchange="preview_image(event)" aria-describedby="basic-addon1">
                        </div>
						<br>
                        <div class="form-group" style="margin: auto;">
                            <img id="output_image" style="width: 30%; height: 30%;" />
                        </div>
                        <br>
						<button type="submit" class="btn btn-success" id="btn_changeavatar">Đổi avatar
						</button>
			    	</form>
			  	</div>
			</div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection
