<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>jQuery美女网站图片轮播切换代码 - 站长素材</title>

<link rel="stylesheet" href="css/lunbo.css">

</head>

<body>
<center>
<div class="demo">
	<a class="control prev"></a><a class="control next abs"></a><!--自定义按钮，移动端可不写-->
	<div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
		<ul>
			<li><a href=""><img src="images/1.jpg" alt="两弯似蹙非蹙笼烟眉，一双似喜非喜含情目。" /></a></li>
			<li><a href=""><img src="images/2.jpg" alt="态生两靥之愁，娇袭一身之病。" /></a></li>
			<li><a href=""><img src="images/3.jpg" alt="泪光点点，娇喘微微。" /></a></li>
			<li><a href=""><img src="images/4.jpg" alt="闲静似娇花照水，行动如弱柳扶风。" /></a></li>
			<li><a href=""><img src="images/5.jpg" alt="心较比干多一窍，病如西子胜三分。" /></a></li>
		</ul>
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/YuxiSlider.jQuery.min.js"></script>
<script>
$(".slider").YuxiSlider({
	width:800, //容器宽度
	height:450, //容器高度
	control:$('.control'), //绑定控制按钮
	during:4000, //间隔4秒自动滑动
	speed:800, //移动速度0.8秒
	mousewheel:true, //是否开启鼠标滚轮控制
	direkey:true //是否开启左右箭头方向控制
});
</script>
</center>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p></p>
<p><a href="http://sc.chinaz.com/" target="_blank">萧青提供</a></p>
</div>
</body>
</html>

