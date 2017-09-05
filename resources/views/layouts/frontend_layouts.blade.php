<!DOCTYPE html>
<html>
<head>
<title>@yield('title','首页')</title>
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
<style>
    #service{width:161px;height:290px;position:fixed;top:350px;right:0px; z-index:100;}
    *html #service{margin-top:258px;position:absolute;top:expression(eval(document.documentElement.scrollTop));}
    #service li{width:161px;height:60px;}
    #service li img{float:right;}
    #service li a{height:49px;float:right;display:block;min-width:47px;max-width:161px;}
    #service li a .shows{display:block;}
    #service li a .hides{margin-right:-143px;cursor:pointer;cursor:hand;}
    #service li a.weixin_area .hides{display:none;position:absolute;right:143px;}
    #service li a.weixin_area .weixin{display:none;position:absolute;right:0;top:48px}
    #p2{width:112px;background-color:#A7D2A9;height:47px;margin-left:47px;border:1px solid #8BC48D;text-align:center;line-height:47px}
    #p3{width:112px;background-color:#EC9890;height:47px;margin-left:47px;border:1px solid #E6776C;text-align:center;line-height:47px}
    #p1{width:47px;height:49px;float:left}
    a:hover{text-decoration: none}
    #panorama {height: 190px;overflow: hidden;width: 310px;border-radius: 10px;}
	#normal_map {height:190px;overflow: hidden;width: 310px;border-radius: 10px;}
</style>
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
	<div id="service">
        <ul  style="list-style-type:none">
            <li>
                <a href="javascript:void(0)" class="weixin_area">
                    <img src="/chatroom/images/l02.png" width="47" height="49" class="shows" />
                    <img src="/chatroom/images/a.png" width="57" height="49" class="hides" />
                    <img src="/chatroom/images/weixin.jpg" width="145" class="weixin" style="display:none;margin:-100px 57px 0 0" />
                </a>
            </li>
            <li>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=1576573710&site=qq&menu=yes" target="_blank">
                    <div class="hides" style="width:161px;display:none;" id="qq">
                        <div class="hides" id="p1">
                            <img src="/chatroom/images/ll04.png">
                        </div>
                        <div class="hides" id="p2"><span style="color:#FFF;font-size:13px">1576573710</span>
                        </div>
                    </div>
                    <img src="/chatroom/images/l04.png" width="47" height="49" class="shows" />
                </a>
            </li>
            <li id="tel">
                <a href="javascript:void(0)">
                    <div class="hides" style="width:161px;display:none;" id="tels">
                        <div class="hides" id="p1">
                            <img src="/chatroom/images/ll05.png">
                        </div>
                        <div class="hides" id="p3"><span style="color:#FFF;font-size:12px">0551-65371998</span>
                        </div>
                    </div>
                    <img src="/chatroom/images/l05.png" width="47" height="49" class="shows" />
                </a>
            </li>
            <li id="btn">
                <a id="top_btn">
                    <div class="hides" style="width:161px;display:none">
                        <img src="/chatroom/images/ll06.png" width="161" height="49" />
                    </div>
                    <img src="/chatroom/images/l06.png" width="47" height="49" class="shows" />
                </a>
            </li>
        </ul>
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
    <script type="text/javascript">
            $(function() {
                $("#service a").hover(function() {
                    if ($(this).prop("className") == "weixin_area") {
                        $(this).children("img.hides").show();
                    } else {
                        $(this).children("div.hides").show();
                        $(this).children("img.shows").hide();
                        $(this).children("div.hides").animate({marginRight: '0px'}, '0');
                    }
                }, function() {
                    if ($(this).prop("className") == "weixin_area") {
                        $(this).children("img.hides").hide();
                    } else {
                        $(this).children("div.hides").animate({marginRight: '-163px'}, 0, function() {
                            $(this).hide();
                            $(this).next("img.shows").show();
                        });
                    }
                });

                $("#top_btn").click(function() {
                    $("html,body").animate({scrollTop: 0}, 600);
                });

                //右侧导航 - 二维码
                $(".weixin_area").hover(function() {
                    $(this).children(".weixin").show();
                },function(){
                    $(this).children(".weixin").hide();
                })
            });
        </script>
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
    @section('js')
    @show
</body>
</html>