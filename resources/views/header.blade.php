<div id="header">
	<div class="header-body">
		<div class="container beta-relative style-header">
			<div class="logo">
				<a href="{{route('trang-chu')}}" id="logo"><img src="source\image\blog\logo.png" width="100px" alt=""></a>
			</div>
			<div class="search">
				<form role="search" method="get" id="searchform" action="{{route('search')}}">
					<input type="text" value="" name="key" id="s" placeholder="Tìm kiếm..." />
					<button class="fa fa-search" type="submit" id="searchsubmit"></button>
				</form>
			</div>
			<div class="login-register">
			@if(auth()->check())
    			<a href="{{url('dang-xuat')}}">Đăng xuất</a>
			@else
   				<a href="{{ url('/dang-nhap') }}">Đăng nhập</a>/<a href="{{ url('/dang-ky') }}">Đăng ký</a>
			@endif

			</div>
		</div> 
	</div>
<!-- .header-body -->

<div class="header-bottom" style="background-color:#337BAE">
	<div class="container">
		<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
		<div class="visible-xs clearfix"></div>
		<nav class="main-menu">
			<ul class="l-inline ov">
				<!-- <li><a href="{{route('trang-chu')}}"><b>TRANG CHỦ</b></a></li> -->
				<li><a href="{{route('trang-chu')}}" id="logo">TRANG CHỦ</a></li>
				@foreach($loai_sp as $loai)
    				@if($loai->status == 1)
        				@continue
    				@else
        				<li><a href="{{ route('loaiblog', $loai->id1) }}">{{ $loai->name1 }}</a></li>
						@endif
					@endforeach
				<li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>
	</div> <!-- .container -->
</div> 
<!-- .header-bottom -->

</div> <!-- #header -->
