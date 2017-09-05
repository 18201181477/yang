<!DOCTYPE html>
<html>
<head>
<title>@yield('title','首页')</title>
<style type="text/css">
	<style type="text/css">
	#panorama {height: 200px;overflow: hidden;width: 263px;border-radius: 10px;}
	#normal_map {height:200px;overflow: hidden;width: 263px;border-radius: 10px;}
</style>
</style>
<base href="/frontend/">
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Doctor Plus Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->	
<!-- start-smoth-scrolling-->
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
<!--//end-smoth-scrolling-->
@section('css')
@show
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="header-logo">
				<a href="{{URL::route('index/index')}}"></a>		
			</div>
					
			<div class="clearfix"> </div>
		</div>	
		<div class="container">
			<div class="header-logo">
				<a href="{{URL::route('index/index')}}"><img src="images/logo.png" alt="logo"/></a>		
			</div>
			<div class="header-info">
				<h4><iframe width="360" scrolling="no" height="100" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=2&icon=1&num=2"></iframe></h4>	
			</div>			
			<div class="clearfix"> </div>
		</div>	
	</div>
	<!--//header-->
	<!--header-bottom-->
	<div style="float:fixed" class="header-bottom">
		<div class="container">
			<!--top-nav-->
			<div class="top-nav cl-effect-5">
				<span class="menu-icon"><img src="images/menu-icon.png" alt=""/></span>		
				<ul class="nav1">
					<li><a href="{{ URL::route('index/index') }}" class="{{Request::getPathInfo()=='/index' || Request::getPathInfo()=='/' ? 'active':''}}"><span data-hover="主页">主页</span></a></li>
					<li><a href="{{ URL::route('index/about') }}" class="{{Request::getPathInfo()=='/about' ? 'active':''}}"> <span data-hover="医疗常识">医疗常识</span></a></li>
					@section('service')
					<li><a href="{{ URL::route('index/services') }}" class="{{Request::getPathInfo()=='/service' ? 'active':''}}"> <span data-hover="医疗服务">医疗服务</span></a></li>
					@show
					<li><a href="{{ URL::route('index/news') }}" class="{{Request::getPathInfo()=='/news' ? 'active':''}}"> <span data-hover="最新消息">最新消息</span></a></li>
					<li><a href="{{ URL::route('index/contact') }}" class="{{Request::getPathInfo()=='/contact' ? 'active':''}}"> <span data-hover="联系我们">联系我们</span></a></li>
				</ul>
				<!-- script-for-menu -->
				<script>
				   $( "span.menu-icon" ).click(function() {
					 $( "ul.nav1" ).slideToggle( 300, function() {
					 // Animation complete.
					  });
					 });
				</script>
				<!-- /script-for-menu -->
			</div>
			<!--//top-nav-->
			<form action="{{url('service')}}" class="navbar-form navbar-right">
				<!-- <div class="btn-group">
				    <span  class="btn btn-default dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
				    {{Session::get('address')}} <span class="caret"></span>
				    </span>
				    <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				   
						<div class="container" style="word-wrap:break-word;word-break:break-all; ">
						<table class="table" style="word-wrap:break-word;word-break:break-all; ">
							<tr>
								<td><a href="javascript:;" title="123@qq.com">彭志</a></td>
							</tr>
							<tr>
								<td>hahahaha</td>
								<td>hahahaha</td>
								
							</tr>


							<tr>
								<td><a href="javascript:;" title="123@qq.com">彭志</a></td>
							</tr>
							<tr>
								<td>hahahaha</td>
								<td>hahahaha</td>
								<td>hahahaha</td>
								<td>hahahaha</td>
							</tr>
						</table>
						</div>
					
				    </div>
				</div> -->
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-default"></button>

				</div>	

				@if (\Session::has('user'))
					@if(\Session::get('user')['status'] == 0)
					<ul class="nav navbar-nav navbar-right">
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                {{\Session::get('user')['name']}} <span class="caret"></span>
	                        </a>

	                        <ul class="dropdown-menu" role="menu">
	                        	<li><a href="javascript:;">个人账号</a></li>
	                            <li><a href="{{url('index/logout')}}">退出登录</a></li>
	                        </ul>
	                    </li>
	                </ul>
					@else
					<ul class="nav navbar-nav navbar-right">
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                {{\Session::get('user')['name']}} <span class="caret"></span>
	                        </a>
	                        <ul class="dropdown-menu" role="menu">
	                        	<li><a href="javascript:;">企业账号</a></li>
	                        	<li><a href="{{url('index/perfect')}}">完善公司信息</a></li>
	                            <li><a href="{{url('index/logout')}}">退出登录</a></li>
	                        </ul>
	                    </li>
                	</ul>
					@endif
				@else
				    <a href="{{url('index/login')}}" class="btn btn-success">登录</a>	
					<a href="{{url('index/register')}}" class="btn btn-info">注册</a>
				@endif
			</form>	
				
			
			<div class="clearfix"> </div>
				
		</div>
	</div>
	<!--//header-bottom-->
	
    @yield('content')

	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">				
				<div class="col-md-4 recent-posts">
					<h4>Recent posts</h4>
					<div class="recent-posts-text">
						<h5>MARCH 30, 2015</h5>
						<p>Duis autem vel eum iriure dolor</p>
					</div>
					<div class="recent-posts-text">
						<h5>MARCH 15, 2015</h5>
						<p>Duis autem vel eum iriure dolor</p>
					</div>
					<div class="recent-posts-text">
						<h5>MARCH 3, 2015</h5>
						<p>Duis autem vel eum iriure dolor</p>
					</div>
				</div>
				<div class="col-md-4 recent-posts">
					<h4>Twiter feeds</h4>
					<div class="recent-posts-text">
						<h5>about 2 days ago<span>@kristit</span></h5>
						<p>Good work buddy</p>
					</div>
					<div class="recent-posts-text">
						<h5>about 2 days ago <span>@fasteven</span></h5>
						<p>Good work buddy</p>
					</div>
					<div class="recent-posts-text">
						<h5>about 2 days ago <span>@streamer</span> </h5>
						<p>Good work buddy</p>
					</div>
				</div>
				<div class="col-md-4 recent-posts">
					<div id="panorama"></div>
					<div id="normal_map"></div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>	
	</div>	
	<!--//footer-->
	<div class="footer-bottom">
		<div class="container">
			<p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
	</div>
	<!--smooth-scrolling-of-move-up-->
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
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"> </script>
    @section('js')
    @show
</body>
</html>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih"></script>
	<script type="text/javascript">
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