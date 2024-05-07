@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><div class="form-block">
							<button type="submit" class="btn btn-primary"><i class="fa fa-facebook-official" style="font-size:20px"></i>&nbsp;&nbsp;<b>Facebook</b></button>
							</div></li>
							<li><div class="form-block">
							<button type="submit" class="btn btn-danger"><i class="fa fa-youtube-square" style="font-size:24px"></i><b>&nbsp;&nbsp;Youtube</b></button>
							</div></li>
							<li><div class="form-block">
							<button type="submit" class="btn btn-info"><i class="fa fa-twitter" style="font-size:24px"></i><b>Twitter</b></button>
							</div></li>
							<li><div class="form-block">
							<button class="btn">Theo dõi tại</button>
						</div></li>
							<li><div class="form-block">
							<script src="https://apis.google.com/js/platform.js"></script>
							<div class="g-ytsubscribe" data-channel="KatyPerry" data-layout="full" data-count="default"></div></li><br>
							<li>
								</form>
						@foreach($commentslh as $cm)
						<table>
							<tr>
								<td>
									<p><b><img width="25px" height="25px" src="source\image\faq\2.png">&nbsp;&nbsp;&nbsp;{{$cm->name}}&nbsp;&nbsp;</b>đã update vào
									<span><u>{{date('d/m/Y H:i',strtotime($cm->created_at))}}</u></span>
								</td>
								</tr>
								<tr>
								<td>
									{{$cm->content}}<hr><br><br>
								</td>
							</tr>
						</table>
					@endforeach
							</li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div>
							<center><h1>Liên Hệ</h1></center><hr><br><br>
							<p><b>Mọi thắc mắc, khiếu nại xin liên hệ</p><br>
							<p>Tạ Quang Sơn</p><br>
							<p>Facebook,Twitter,Youtube bên phía bên trái hoặc post comment bên dưới để được hỗ trợ.</p><hr><br></b>
						</div><br><br>
						<div class="beta-blogs-list">
							<form method="POST">
						<h5 style="color:#FF9900 "><b><u>Bình luận</u></b></h5><br>
						<div class="panel" id="tab-description">
							<div class="form-block">
							<label for="phone"><b>Tên</b></label>
							<input type="text" name="namecommentlh" required>
						</div>
							<p><b>Nội dung liên hệ:</b></p>
							<textarea rows="1" cols="20" name="contentcommentlh" required>
							</textarea>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Gửi</button>
						</div>
						</div>
						{{csrf_field()}}
					
						<div class="space50">&nbsp;</div>
						<br><br>
							
						</div> <!-- .beta-blogs-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection