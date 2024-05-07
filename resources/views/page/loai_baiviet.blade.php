@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thể loại</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<h3 class="tentheloai">
					@foreach($tentheloai as $l)
							{{$l->name1}}
							@endforeach</h3>
				<!-- danh sach the loai -->
				<!-- <div class="row">
					<div class="col-sm-3" style="padding: 50px; padding-top: 0">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><b><a href="{{route('loaiblog',$l->id1)}}">{{$l->name1}}</a></b></li>
							@endforeach
						</ul>
					</div> -->

					<!-- content -->
					<div class="row">
						<div class="tab-news">
							<div class="col-md-10">
								@foreach($sp_theoloai as $sp)
								<div class="tab-content">
									<div id="featured" class="container tab-pane active">
										<div class="tn-news">
											<div class="col-md-4">
												<div class="tn-img">
													<a href="{{route('chitietbaiviet',$sp->id)}}"><img src="{{$sp->image}}" /></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="tn-title">
													<a href="{{route('chitietbaiviet',$sp->id)}}"><p style="font-weight: bold;font-size: 18px;">{{$sp->name}}</p><br>
													<p>{{$sp->promotion_price}}</p><br>
													<p  style=" font-weight: bold; float: right; color: #d21a32">{{$sp->staff}} -{{date('d/m/Y H:i',strtotime($sp->created_at))}}</p></a>
												</div>
											</div>                    
										</div>
									</div>
									@endforeach
								</div>

							</div>
						</div>
					</div> <!-- .main-content -->
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div> <!-- .container -source/->
@endsection