@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-blogs-list">

						<div class="row">
							<div class="tab-news">
								<div class="col-md-12">
									@foreach($blog as $new)
									<div class="tab-content">
										<div id="featured" class="container tab-pane active">
											<div class="tn-news">
												<div class="col-md-4">
													<div class="tn-img">
														<a href="{{route('chitietbaiviet',$new->id)}}"><img src="{{$new->image}}" /></a>
													</div>
												</div>
												<div class="col-md-8">
													<div class="tn-title">
														<a href="{{route('chitietbaiviet',$new->id)}}"><p style="font-weight: bold;font-size: 18px;">{{$new->name}}</p><br>
															<p>{{$new->promotion_price}}</p><br>
															<p  style=" font-weight: bold; float: right; color: #d21a32">{{$new->staff}} -{{date('d/m/Y H:i',strtotime($new->created_at))}}</p></a>
														</div>
													</div>                    
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div> <!-- .beta-blogs-list -->
							</div>
						</div> <!-- end section with sidebar and main content -->


					</div> <!-- .main-content -->
				</div> <!-- #content -->
				@endsection