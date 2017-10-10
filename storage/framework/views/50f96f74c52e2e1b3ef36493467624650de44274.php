<?php $__env->startSection('content'); ?>
<!--banner-->
	<div class="banner">
<link rel="stylesheet" href="css/lunbo.css">
<div class="demo" style="width:1518px ; height:650px">
<a style="margin-left: 300px;" class="control prev"></a><a style="margin-right: 300px;" class="control next abs"></a><!--自定义按钮，移动端可不写-->
	<div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
	
		<ul>
			<?php foreach($data as $val): ?>
			<li><a href="<?php echo e(url('/info',['id',$val->id])); ?>"><img src="/img/<?php echo e($val->image); ?>" alt="" /></a></li>
			<?php endforeach; ?>
			<!-- <li><a href="#"><img src="images/1.jpg" alt="两弯似蹙非蹙笼烟眉，一双似喜非喜含情目。" /></a></li>
			<li><a href="#"><img src="images/2.jpg" alt="态生两靥之愁，娇袭一身之病。" /></a></li>
			<li><a href="#"><img src="images/3.jpg" alt="泪光点点，娇喘微微。" /></a></li>
			<li><a href="#"><img src="images/4.jpg" alt="闲静似娇花照水，行动如弱柳扶风。" /></a></li>
			<li><a href="#"><img src="images/5.jpg" alt="心较比干多一窍，病如西子胜三分。" /></a></li> -->
		</ul>
	</div>
</div>
</div>

	<script src="js/jquery.min.js"></script>
<script src="js/YuxiSlider.jQuery.min.js"></script>
<script>
$(".slider").YuxiSlider({
	width:1518, //容器宽度
	height:650, //容器高度
	control:$('.control'), //绑定控制按钮
	during:4000, //间隔4秒自动滑动
	speed:800, //移动速度0.8秒
});
</script>
	<!--//banner-->

	<!--banner-bottom-->
	<div class="banner-bottom">
		<div class="container">
			<h2>Lorem Ipsum was popularised in the with the release of Letraset sheets containing</h2>
			<a href="#gallery" class="arrow scroll"> </a>
		</div>
	</div>
	<!--//banner-bottom-->
	<!--gallery-->
	<div class="gallery" id="gallery">
		<div class="col-md-6 gallery-left">
			</div>
		<div class="col-md-6 gallery-right">
			<div class="gallery-grid-a">
				<h4>Letraset sheets</h4>
				<p>Lorem Ipsum was popularised in the with the release of Letraset sheets contai ningthe with the release of </p>
			</div>	
			<div class="gallery-grid-b">		
				<h4>Letraset sheets</h4>
			<p>Lorem Ipsum was popularised in the with the release of Letraset sheets contai ningthe with the release of </p>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--//gallery-->
	<!--work-->
	<div class="work">		
		<div class="container">	
			<div class="work-title">
				<h3>More projects</h3>
				<p>Lorem Ipsum was popularised in the with the release of Letraset sheets contai ningthe</p>
			</div>
			<div class="col-md-4 work-grids">
				<ul>
					<li><img src="images/icon2.png" alt=""></li>
					<li>
						<h4>21321121</h4>
						<p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
					</li>
				</ul>
			</div>	
			<div class="col-md-4 work-grids">
				<ul>
					<li><img src="images/icon3.png" alt=""></li>
					<li>
						<h4>occaecati cupiusint</h4>
						<p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
					</li>
				</ul>
			</div>
			<div class="col-md-4 work-grids">
				<ul>
					<li><img src="images/icon4.png" alt=""></li>
					<li>
						<h4>Excepturi sint occa</h4>
						<p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//work-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>