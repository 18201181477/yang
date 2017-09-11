<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Home</title>
<base href="/frontend/hospital/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="" />
<!-- flexslider-css-file -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<!-- //flexslider-css-file -->
<link rel="stylesheet" href="css/easy-responsive-tabs.css">
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons-css-file -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">	<!-- bootstrap-css-file -->
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">	<!-- style-css-file -->
<!-- gallery -->
<link rel="stylesheet" href="css/lightbox.css">
<!-- //gallery -->
<!-- fonts -->
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
<!-- //fonts -->
<!-- Default-JavaScript-File -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //Default-JavaScript-File -->
<script src="js/bootstrap.js"></script>	<!-- //bootstrap-JavaScript-File -->
<style>
	#panorama {height: 320px;overflow: hidden;width: 570px;border-radius: 10px;float:left;}
	#normal_map {height:320px;overflow: hidden;width: 570px;border-radius: 10px;float:right;}
</style>
</head>
<!-- Head -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- banner -->
	<div id="home" class="w3ls-banner"> 
		<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top"> 
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Medical_care</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="{{url('/service')}}">HOSPITAL SERVICE</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right cl-effect-15">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="page-scroll scroll" href="#home">详情</a></li>
							<li><a class="page-scroll scroll" href="#services">科室</a></li>
							<li><a class="page-scroll scroll" href="#map">地图</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->
		<!--banner-->
		<!--Slider-->
		<div class="w3l_banner_info">
			<div class="col-md-5 banner-form-agileinfo">
				<img src="images/medical.png" alt="" />
			</div>
			<div class="col-md-7 slider">
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="slider_banner_info">
								<h4>Hospital Name</h4>
								<p><?= $data['name']?></p>
							</div>
						</li>
						<li>
							<div class="slider_banner_info">
								<h4>Hospital Level</h4>
								<p><?= $data['register']?></p>
							</div>
						</li>
						<li>
							<div class="slider_banner_info">
								<h4>Introduction</h4>
								<p><?= $data['profile']?></p>
							</div>
						</li>
						<li>
							<div class="slider_banner_info">
								<h4>Hospital Address</h4>
								<p><?= $data['address']?></p>
							</div>
						</li>
						<li>
							<div class="slider_banner_info">
								<h4>Hospital Home</h4>
								<p><a href="<?= $data['url']?>"><?= $data['url']?></a></p>
							</div>
						</li>
						<li>
							<div class="slider_banner_info">
								<h4>Hospital Telephone</h4>
								<p><?= $data['phone']?></p>
							</div>
						</li>				
					</ul>
				</div>
				<h1 class="pull-right"><img src="images/shan.gif"/></h1>
			</div>
			<div class="clearfix"></div>
			<!--//Slider-->
			
			</div>
		<!--//banner-->
	</div>	
	<!-- //banner --> 
<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="services">    
<div class="container"> 
<div class="w3ls-heading">
	<h3>科室</h3>
</div>
<div class="horizontalTab" id="horizontalTab">
	<ul class="resp-tabs-list list-group">
		<li class="list-group-item text-center">Service 1</li>
		<li class="list-group-item text-center">Service 2</li>
		<li class="list-group-item text-center">Service 3</li>
		<li class="list-group-item text-center">Service 4</li>
		<li class="list-group-item text-center">Service 5</li>
		<li class="list-group-item text-center">Service 6</li>
	</ul>
	<div class="resp-tabs-container">
		<!-- section -->
		<div class="bhoechie-tab-content active">
			<div class="services-grids">
				<div class="agile_team_grids">
				<div class="col-md-3 agile_team_grid  agile_team_gridf">
					<div class="agile_team_grid_main">
						<img src="images/t.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li style="color:white;">胸外科</li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Elisa liden</h4>
						<p>Numerology</p>
					</div>
					<div class="ser-info">
						<a href="{{url('/pay/急诊科')}}"  data-toggle="modal">挂号</a>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid2">
					<div class="agile_team_grid_main">
						<img src="images/t2.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li style="color:white;">急诊科</li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Martina</h4>
						<p>Dentist</p>
					</div>
					<div class="ser-info">
						<a href="#myModal"  data-toggle="modal">预约</a>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid3">
					<div class="agile_team_grid_main">
						<img src="images/tt.png" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li style="color:white;">急诊科</li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Vickey alter</h4>
						<p>Surgery Specialist</p>
					</div>
					<div class="ser-info">
						<a href="#myModal"  data-toggle="modal">预约</a>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid4">
					<div class="agile_team_grid_main">
						<img src="images/t4.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li style="color:white;">急诊科</li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Rose mary</h4>
						<p>Skin care expert</p>
					</div>
					<div class="ser-info">
						<a href="#myModal"  data-toggle="modal">预约</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
		<!--  section -->
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s5.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>At vero eos et accusamus et iusto dignissimos ducimus qui</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!--  search -->
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s1.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>On the other hand, we denounce with righteous indignation</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s4.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>Laboris nisi ut aliquip ex ea commodo consequat indignation</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s3.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>Temporibus autem quibusdam et aut officiis debitis denounce</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s2.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>Temporibus autem quibusdam et officiis debitis quibusdam et</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bhoechie-tab-content">
			<div class="services-grids">
				<div class="ser-img">
					<img src="images/s2.jpg" title="service" alt="" />
				</div>
				<div class="ser-info">
					<h3>Temporibus autem quibusdam et officiis debitis quibusdam et</h3>
					<p>Integer sed blandit nisi, eget tempor nulla. Vivamus ut mi nec quam iaculis ultricies. 
					Maecenas at placerat metus. Curabitur arcu purus, eleifend ut massa at, fringilla sagittis quam. 
					Nulla volutpat tellus orci, id laoreet ante pretium id. Ut iaculis quis eros ac bibendum.
					</p>
					<p>Pellentesque finibus dapibus volutpat. Curabitur imperdiet vulputate rhoncus. Nullam 
					scelerisque magna non turpis euismod bibendum. 
					</p>
					<a href="#myModal" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Read More</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- //tabs -->    <!-- services -->
<!-- team -->	<!-- Our specialists -->
<div class="line"></div>
<!-- //team -->	<!-- //Our specialists -->
<!-- appointment form -->
<div class="line">
</div>
<div class="appointment">
	<div class="container">
		<div class="w3ls-heading">
			<h3>Make an appointment today</h3>
		</div>
		<div class="appointment-grid">
			<div class="col-md-4 appointmnet-left">
				<div class="inner">
					<div class="working-grid">
						<h4>working hours</h4>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>Mon to fri</span> <span class="span1">9:00 am to 6:30 pm</span></p>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>sat</span> <span class="span1">9:00 am to 10:00 pm</span></p>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>sun</span> <span class="span1">10:00 am to 1:00 pm</span></p>
					<div class="clearfix"></div>
					</div>
					<div class="working-grid1">
						<h4>For help</h4>
						<h5><i class="fa fa-pencil" aria-hidden="true"></i>For appointment fill the form</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ultrices odio.</p>
					<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-4 appointmnet-middle">
				<div class="inner">
					<h4>Appointment form</h4>
					<form action="#" name="row" method="post" class="register">
						<input type="text" name="name" id="name" placeholder="Name" required="">
						<input type="email" name="email" id="Email" placeholder="Email id" required="">
						<input type="text" name="mobile number" id="Mobile_Number" placeholder="Mobile Number" required="">
						<input class="date" id="datepicker" type="text" value="Appointment date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Appointment date';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Message...';}" >Enter Message...</textarea>
						<input type="submit" onclick="myFunction()" value="book appointment ">
					</form>
				</div>
			</div>
			<div class="col-md-4 appointmnet-right">
				<div class="inner">
					<img src="images/tt.png" alt=""/>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //appointment form -->

<!-- classes -->	<!-- map -->
<div class="line">
</div>
	<div id="map" class="banner-bottom blog">
		<div class="container">
			<div class="w3ls-heading">
				<h3>地图</h3>
			</div>
			<div class="w3layouts_classes_grids">
			<div id="panorama"></div>
			<div id="normal_map"></div>
			</div>
		</div>
	</div>
<!-- //classes -->	<!-- //map -->

<!-- copyright -->
<div class="copyright-agile">
	<p>Copyright &copy; 2017.Company name All rights reserved</p>
</div>
<!-- //copyright -->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih"></script>
<script>
	var x = 116.27;
	var y = 39.9;
	// 百度地图
	//全景图展示
	var panorama = new BMap.Panorama('panorama');
	panorama.setPosition(new BMap.Point(x, y)); //根据经纬度坐标展示全景图
	panorama.setPov({heading: -40, pitch: 6});

	panorama.addEventListener('position_changed', function(e){ //全景图位置改变后，普通地图中心点也随之改变
	var pos = panorama.getPosition();
	map.setCenter(new BMap.Point(pos.lng, pos.lat));
	marker.setPosition(pos);
	});
	//普通地图展示
	var mapOption = {
		mapType: BMAP_NORMAL_MAP,
		maxZoom: 18,
		drawMargin:0,
		enableFulltimeSpotClick: true,
		enableHighResolution:true
	}
	var map = new BMap.Map("normal_map", mapOption);
	var testpoint = new BMap.Point(x, y);
	map.centerAndZoom(testpoint, 18);
	map.enableScrollWheelZoom();//启动鼠标滚轮缩放地图
	var marker=new BMap.Marker(testpoint);
	marker.enableDragging();
	map.addOverlay(marker);  
	marker.addEventListener('dragend',function(e){
	panorama.setPosition(e.point); //拖动marker后，全景图位置也随着改变
	panorama.setPov({heading: -40, pitch: 6});}
);
</script>
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true,   // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			activate: function(event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
		$('#verticalTab').easyResponsiveTabs({
			type: 'vertical',
			width: 'auto',
			fit: true
		});
	});
</script>
<!--banner Slider starts Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function () {
	// Slideshow 4
		$("#slider3").responsiveSlides({
			auto: true,
			pager:true,
			nav:false,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}
		});
	});
</script>

<!--banner Slider starts Here-->
<!--start-date-piker-->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script>
	$(function() {
	$( "#datepicker" ).datepicker();
	});
</script>
<!--/End-date-piker-->
<!-- js for smooth scrollings -->
<script src="js/SmoothScroll.min.js"></script>
<!-- js for smooth scrollings -->
<!-- flexisel -->
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$("#flexiselDemo1").flexisel({
			visibleItems: 3,
			animationSpeed: 1000,
			autoPlay: false,
			autoPlaySpeed: 3000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: { 
				portrait: { 
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: { 
					changePoint:640,
					visibleItems:2
				},
				tablet: { 
					changePoint:768,
					visibleItems: 3
				}
			}
		});
	});
</script>
<!-- //flexisel -->

<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });
							
		});
</script>
<!-- //here ends scrolling icon -->
<!-- Scrolling Nav JavaScript --> 
<script src="js/scrolling-nav.js"></script>  
<!-- //fixed-scroll-nav-js --> 
</body>
</html>