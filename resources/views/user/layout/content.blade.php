 
	<div class="container event">
		<h5>REACH Events</h5>
		<div class="row">
			@foreach($sukiens as $sukien)
				<div class="col-lg-6 col-md-6">
					<div class="event-REACH">
						<div class="event-image">	
							<img src="uploadTintuc/{{$sukien->hinh}}" alt="_image">
						</div>
						<div class="event-details">
							<div class="title">
								<p>{{$sukien->tieude}}</p>
								<a href="{{route('chitiet2.pagechitiet',['id'=>$sukien->id])}}">Xem thêm</a>
							</div>
						</div>	
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<!-- end event -->
	<!-- star blog -->
	<div class="container new-blog">
		<div class="row">
			@if(isset($chuyenhocviens))
				<div class="col-6 left">
					<h5>câu chuyện</h5>
					<?php 
					$chuyenhocvien = $chuyenhocviens->shift();
					?>
					<div class="img">
						<img src="uploadTintuc/{{$chuyenhocvien->hinh}}" alt="">
					</div>
					<div class="content">
						<a href="{{route('chitiet2.pagechitiet',['id'=>$chuyenhocvien->id])}}">{{$chuyenhocvien->tieude}}
						</a>
						<p>{{$chuyenhocvien->tomtat}}
						</p>
						<p><span><i class="far fa-clock"></i></span>{{$chuyenhocvien->created_at}}</p>
					</div>
				</div>
				<div class="col-6 right">
					<h6>tin liên quan</h6>
					@foreach($chuyenhocviens as $chv)
						<div class="item">
							<div class="img">
								<img src="uploadTintuc/{{$chv->hinh}}" alt="">
							</div>
							<div class="content">
								<a href="{{route('chitiet2.pagechitiet',['id'=>$chv->id])}}">{{$chv->tieude}}
								</a>
								<p>{{$chv->tomtat}} </p>
								<p><span><i class="far fa-clock"></i></span>{{$chv->created_at}}</p>
							</div>
						</div>
					@endforeach
				</div>
			@endif
		</div>
	</div>
	<!-- end new-blog -->
	<!-- star nav-work -->
	<div class="nav-work">
		<div class="container work">
			@foreach($solieus as $solieu)
				<div class="nav">
					<div class="left">
						<span><i class="fas fa-user-friends"></i></span>
					</div>
					<div class="right">
						<p>{{$solieu->duan}}<sup>+</sup></p>
						<span>business plan</span>
					</div>
				</div>
				<div class="nav">
					<div class="left">
						<span><i class="fas fa-user-graduate"></i></span>
					</div>
					<div class="right">
						<p>{{$solieu->hocvien}}<sup>+</sup></p>
						<span>stundent</span>
					</div>
				</div>
				<div class="nav">
					<div class="left">
						<span><i class="fas fa-chalkboard-teacher"></i></span>
					</div>
					<div class="right">
						<p>{{$solieu->giaovien}}<sup>+</sup></p>
						<span>teacher</span>
					</div>
				</div>
				<div class="nav">
					<div class="left">
						<span><i class="fas fa-business-time"></i></span>
					</div>
					<div class="right">
						<p>{{$solieu->kinhdoanh}}<sup>+</sup></p>
						<span>business cooperation</span>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<!-- end nav-work -->
	<!-- star join -->
	<div class="container new-join">
		<h5>việc làm</h5>
		<div class="row join-boss">
			@if(isset($vieclams))
				@foreach($vieclams as $vieclam)
					<div class="col-3">
						<div class="join">
							<div class="img">
								<div class="overlay">
									<img src="uploadTintuc/{{$vieclam->hinh}}" alt="">
								</div>
								<div class="image">
									<a href="{{route('chitiet2.pagechitiet',['id'=>$vieclam->id])}}" class="">{{$vieclam->tieude}}</a>
									<span>{{$vieclam->created_at}}</span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
		<div class="read-more">
			<a href="{{route('index.pagetintuc',['id'=>15])}}">xem tất cả<span><i class="far fa-arrow-alt-circle-right"></i></span></a>
		</div>
	</div>
	<!-- end join -->
	<!--star youtube -->
	<div class="container youtube-boss">
		<h5>tin video</h5>
		<div class="youtube">
			<div class="col-8">
				<div id="my_player"><div></div></div>
			</div>
			
			<div class="col-4">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item" id="youtube">
						<?php
		                    $API_Url = 'https://www.googleapis.com/youtube/v3/';
		                    $API_Key = 'AIzaSyC1N8IBZN0hKUPB1oVU65eK3GK5HRtja2w';
		                    $channelId = 'UCXEXZGqArdf0m-XIDb0o6Ww';
		                    $parameter = [
		                        'id'=>$channelId,
		                        'part'=>'contentDetails',
		                        'key'=>$API_Key
		                    ];
		                    $channel_URL = $API_Url . 'channels?' . http_build_query($parameter);
		                    $json_details = json_decode(file_get_contents($channel_URL), true);
		                    $playlist = $json_details['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
		                    $parameter = [
		                        'part'=>'snippet',
		                        'playlistId'=>$playlist,
		                        'maxResults'=>'50',
		                        'key'=>$API_Key
		                    ];
		                    $channel_URL = $API_Url. 'playlistItems?' . http_build_query($parameter);
		                    $json_details = json_decode(file_get_contents($channel_URL), true);
							$my_videos = [];
							foreach($json_details['items'] as $video){
							//$my_videos[] = $video['snippet']['resourceId']['videoId'];
							$my_videos[] = array( 'v_id'=>$video['snippet']['resourceId']['videoId'], 'v_name'=>$video['snippet']['title'] );
							}

							while(isset($json_details['nextPageToken'])){
							$nxt_page_URL = $channel_URL . '&pageToken=' . $json_details['nextPageToken'];
							$json_details = json_decode(file_get_contents($nxt_page_URL), true);
							foreach($json_details['items'] as $video)
							$my_videos[] = $video['snippet']['resourceId']['videoId'];
							}
		          			/*print_r($my_videos);*/	
		                    foreach($my_videos as $video){

		                        if(isset($video)){
		                            
		                    		echo '<a active href="https://www.youtube.com/watch?v='. $video['v_id'] .'" >
		                    					<div id="v_name">'. $video['v_name'].'</div>
		                    					<img style="margin-bottom:20px" src="https://img.youtube.com/vi/'. $video['v_id'] .'/mqdefault.jpg">

										</a>';
		                        }
		                    }
		               		?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end youtube -->
	<!-- star share -->
	<div class="container slider">
		<h5>chia sẻ</h5>
		<div class="owl-carousel owl-theme ">
			@foreach($chiases as $chiase)
				<div class="item">
					<div class="img">
						<img src="{{asset('uploadTintuc/'.$chiase->hinh)}}" alt="">
					</div>
					<div class="review">
						<p>{!!$chiase->noidung!!}
						</p>
						<p><cite>{{$chiase->tomtat}}</cite></p>
					</div>
				</div>
			@endforeach
			
		</div>
	</div>
	<div style="background:#fdfbfb">
		<div class="container" style="">
			<div class="col-xl-12" style="margin-top:25px;padding-top:50px; padding-bottom:50px">
				<fb:comments href="http://tin.vn" colorscheme="light" numposts="5" width="70%" margin="auto"></fb:comments>
			</div>
		</div>
	</div>
	<!-- end share