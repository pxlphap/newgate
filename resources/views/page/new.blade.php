<div class="row">
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
									{!! $new_bloglist->render() !!}
								</div>
							</div>
						</div> <!-- .main-content -->