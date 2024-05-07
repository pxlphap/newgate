	@extends('master')
	@section('content')
	
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >

				<div class="tp-bannertimer"></div>
			</div>
		</div>
		<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-blogs-list">
							<div class="row">
								@foreach($new_blog as $new)
								<div class="col-sm-6">
									<div class="single">
										<div class="single-item-header">
											<a href="{{route('chitietbaiviet',$new->id)}}"><img src="{{$new->image}}" alt="" height="400px"></a>
										</div>
										<div class="single-item-body">
											<p class="trangchu"><b>{{$new->name}}</b></p>
											<p style="color: gray">{{$new->promotion_price}}</p>
										</div>
									</div>
								</div>
								@endforeach
								@foreach($new_left as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietbaiviet',$new->id)}}"><img src="{{$new->image}}" width="300px" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="trangchu2">{{$new->name}}</p>
											
										</div>
									</div>
								</div>
								@endforeach
								@foreach($feed_blog as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietbaiviet',$new->id)}}"><img src="{{$new->image}}"  width="300px" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="trangchu2">{{$new->name}}</p>
											
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-blogs-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-blogs-list">
							<h4 class="banneresports">ESPORTS</h4>
							<div class="beta-blogs-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($esports_blog as $es)
								<div class="col-md-3">
									<div class="tn-img">
										<a href="{{route('chitietbaiviet',$es->id)}}"><img src="{{$es->image}}" alt="" width="250px" height="150px"></a>
										<div class="tn-title">
											<p style="font-weight: bold; padding-top: 4px; padding-bottom: 5px; font-size: 18px;">{{$es->name}}</p>
										</div>					
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-blogs-list -->



						<div class="beta-blogs-list">
							<h4 class="bannertype">VIDEO ĐÁNG CHÚ Ý</h4>
							<div class="beta-blogs-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($video_product as $tp)
								<div class="col-md-6">
									<div class="tn-img">
										<iframe width="100%" height="250px" src="{{$tp->video_product}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<div class="tn-title">
											<a href="{{route('chitietbaiviet',$tp->id)}}"><p style=" font-size: 15px; font-weight: bold; color: #3c9054">{{$tp->name}}</p>
											</div>					
										</div>
									</div>
									@endforeach
								</div>
							</div> <!-- .beta-blogs-list -->
							<hr>

						</div>
					</div> <!-- end section with sidebar and main content -->

					<div class="col-md-3">
						<h4 class="bannernew">MỚI CẬP NHẬT</h4>
					</div>
					<!-- <div class="row">
						<div class="tab-news">
							<div class="col-md-12">
								@foreach($new_bloglist as $feed)
								<div class="tab-content">
									<div id="featured" class="container tab-pane active">
										<div class="tn-news">
											<div class="col-md-4">
												<div class="tn-img">
													<a href="{{route('chitietbaiviet',$feed->id)}}"><img src="{{$feed->image}}" /></a>
												</div>
											</div>
											<div class="col-md-8">
												<div class="tn-title">
													<a href="{{route('chitietbaiviet',$feed->id)}}"><p style="font-weight: bold;font-size: 18px;">{{$feed->name}}</p><br>
														<p>{{$feed->promotion_price}}</p><br>
														<p  style=" font-weight: bold; float: right; color: #d21a32">{{$feed->staff}} -{{date('d/m/Y H:i',strtotime($feed->created_at))}}</p></a>
													</div>
												</div>                    
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>.main-content -->
						@include('page.new')
					</div> <!-- #content -->

				</div>
				@endsection
