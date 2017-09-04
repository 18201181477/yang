<?php $__env->startSection('service'); ?>
	<li><a href="<?php echo e(URL::route('index/services')); ?>" class="active"> <span data-hover="医疗服务">医疗服务</span></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">
	#panorama {height: 200px;overflow: hidden;width: 263px;border-radius: 10px;}
	#normal_map {height:200px;overflow: hidden;width: 263px;border-radius: 10px;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Hospital Introduction（介绍）</h1>
	</div>
</div>
	<div class="container">
	<div class="main">
		<div class="row">
			<!-- 左侧内容 -->
			<div class="col-md-3">
				<div class="list-group">
					<?php $id=$data['id']?>
					<a href="<?php echo e(url('/info',['id',$id])); ?>" class="list-group-item text-center <?php echo e(Request::getPathInfo()=='/info/id/'.$id ? 'active':''); ?>">医院信息</a>
					<a href="<?php echo e(url('/department',['id',$id])); ?>" class="list-group-item text-center <?php echo e(Request::getPathInfo()=='/department/id/'.$id ? 'active':''); ?>">医院科室</a>
					<a href="http://wpa.qq.com/msgrd?v=3&uin=1576573710&site=qq&menu=yes" class="list-group-item text-center">QQ在线咨询</a>
				</div>
				<div id="panorama"></div>
				<div id="normal_map"></div>
			</div>
				
			<?php echo $__env->yieldContent('right_content'); ?>
			<input type="hidden" class="x" value="<?=$data['x']?>">
			<input type="hidden" class="y" value="<?=$data['y']?>">
		</div>
  	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih"></script>
	<script>
		var x = $('.x').val();
		var y = $('.y').val();
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>