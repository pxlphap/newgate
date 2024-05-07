@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>FAQ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
	<div class="inner-header">
		<div class="container">
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
						</div>
						</ul>
					</div>
					<div class="col-sm-9">
						<div style="background-color:#00CC99">
							<center><h1 style="color: white"><b>FAQS</h1>
							<h4 <h1 style="color: white">Nơi giải đáp thắc mắc, các câu hỏi thường gặp của các bạn</h4></center></b>
						</div><br><br>
						

						<div class="faq-content">
						  <div class="faq-question">
						    <input id="q1" type="checkbox" class="panell">
						    <div class="plus">+</div>
						    <label for="q1" class="panell-title">&nbsp;Làm sao để giải nén file apk đuôi RAR</label>
						    <div class="panell-content">Các bạn bắt buộc phải tải app WinRar về:
						    <img src="source\image\faq\rar-rarlab.png"><br>
							<h4>sau đó mới bắt đầu giải nén file</h4></div>
						  </div>					  
						  <div class="faq-question">
						    <input id="q2" type="checkbox" class="panell">
						    <div class="plus">+</div>
						    <label for="q2" class="panell-title">&nbsp;Giải nén ra có 2 file APK+OBB thì làm như thế nào?</label>
						    <div class="panell-content">Các bạn bắt đầu cài file APK , sau đó vào thư mục chứa file OBB copy dán vào đường dẫn Android/OBB và chạy game như bình thường.						woodchuck could chuck wood!</div>
						  </div>						  
						  <div class="faq-question">
						    <input id="q3" type="checkbox" class="panell">
						    <div class="plus">+</div>
						    <label for="q3" class="panell-title">&nbsp;Làm thế nào khi links có password ?</label>
						    <div class="panell-content">Games có password mình sẽ gửi link ở phần mô tả. &nbsp;
						    </div>
						  </div>
						</div>
							 


						<div class="space50">&nbsp;</div>
						<br><br>
							
						</div> <!-- .beta-blogs-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection