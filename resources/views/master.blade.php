<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cổng thông tin điện tử dành cho game thủ</title>
	<base href="{{asset('')}}">
	<link rel="shortcut icon" type="image/x-icon" href="source\image\blog\logo.png"/>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/faq.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	
</head>
<style>
	.tab-news .tab-content {
		padding: 30px 5px 5px 5px;
		background: white;
	}

	.tab-news .tn-news {
		display: flex;
		align-items: center;
		margin-bottom: 15px;
		background: #F0EFF0;
	}

	.tab-news .tn-img {
		width: 310px;
		height: 200px;
	}

	.tab-news .tn-img img {
		width: 310px;
		height: 200px;
	}

	.tab-news .tn-title {
		padding: 10px 15px;
	}

	.tab-news .tn-title a {
		color: #000000;
		font-size: 18px;
		font-weight: 400;
		transition: all .3s;
	}

	.tab-news .tn-title a:hover {
		color: #063852;
	}
	.banneresports{
		color: white;
		background: #d21a32;
		font-weight: bold;
		padding-left: 15px;
		border-radius: 10px;
	}
	.bannerfooter{
		color: white;
		background: black;
		font-weight: bold;
		padding-left: 15px;
		border-radius: 2px;
		margin: 20px;
	}
	.bannernew{
		color: white;
		background: #d21a32;
		font-weight: bold;
		padding-left: 15px;
		text-align: center;
	}
	.bannertype{
		color: white;
		background: #3c9054;
		font-weight: bold;
		padding-left: 20px;
		border-radius: 10px 30px;;
	}
	.main-menu a{
		font-size: 22px;
		font-family: UTM Bebas;
		color: #fff;
		text-transform: uppercase;
		font-weight: normal;

	}
	.trangchu{
		display: block;
		font-family: SFD-Bold;
		text-decoration: none;
		font-size: 26px;
		line-height: 30px;
		color: #222;
		text-decoration: none;
		transition: color .3s;
		-webkit-transition: color .3s;
		font-weight: bold;
	}
	.trangchu2{
		display: block;
		font-family: SFD-Bold;
		text-decoration: none;
		font-size: 18px;
		line-height: 5px;
		color: #222;
		padding-bottom: 14px;
		text-decoration: none;
		transition: color .3s;
		-webkit-transition: color .3s;
		font-weight: bold;
	}
	.tentheloai{
		color: white;
		background: #d21a32;
		font-weight: bold;
		padding-left: 20px;
		padding: 5px;
		margin: 20px;
		margin-right: -20px;
	}
	/*p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
	}*/
</style>
<body>
	
	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
	@include('footer')




	<!-- include js files -->
	
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}}
				)
		})
	</script>
	<script>
		var btn = $('#button');

		$(window).scroll(function() {
			if ($(window).scrollTop() > 300) {
				btn.addClass('show');
			} else {
				btn.removeClass('show');
			}
		});

		btn.on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({scrollTop:0}, '300');
		});
	</script>
</body>
</html>
