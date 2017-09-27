<?php $__env->startSection('title'); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<style type="text/css">
 #map {width: 600px;height: 250px;overflow: hidden;margin:0;}
  #img{width: 360px;height: 200px;}
 </style>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		
		<div class="page ">
		<form action="<?php echo e(url('hos/add')); ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>医院详细信息</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						医院名称：<input type="text" class="input1" name="name" placeholder="医院名称" value="<?php echo  isset($res['name'])?$res['name']:null;?>"  />
					</div>
					<div class="bbD">
						医院照片：
						<div class="bbDd">
						 	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

							<!-- <div class="bbDImg">+</div> -->
							<input type="file"  name="image" /> 
							<?php  if(isset($res['image'])?$res['image']:null){?> 
                        <img src="/img/<?=$res['image']?>" id="img">  
                        <input type="hidden" value="<?=$res['image']?>" name="img">
                        <?php } ?>
							<!-- <a class="bbDDel" href="#">删除</a> -->
						</div>
					</div>
					<div class="bbD">
						医院网址：<input type="text" class="input1" name="url"  placeholder="医院官网" value="<?php echo  isset($res['url'])?$res['url']:null;;?>" />
					</div>
					<div class="bbD">
						联系电话：<input type="text" class="input1" name="phone" placeholder="联系电话" value="<?php echo  isset($res['phone'])?$res['phone']:null;;?>" />
					</div>
					<div class="bbD">
						医院等级：<input type="text" class="input1" name="register"  placeholder="医院等级" value="<?php echo  isset($res['register'])?$res['register']:null;?>" />
					</div>
					<div class="bbD">
						营业执照：<input type="text" class="input1" name="documents" placeholder="营业执照" value="<?php echo  isset($res['documents'])?$res['documents']:null;;?>" />
					</div>
					<div class="bbD">
						医院简介：<textarea name="profile" cols="42" rows="5" placeholder=" 医院简介 "><?php echo  isset($res['profile'])?$res['profile']:null;;?></textarea>
					</div>
					<div class="bbD">
						详细地址：<input type="text" class="input1" name="address" placeholder="详细地址" value="<?php echo  isset($res['address'])?$res['address']:null;;?>"/>
					</div>
					<div class="bbD">
                    <input type="text"  placeholder="医院地理位置" class="input1"  disabled="">
                    </div>

					<div id="map"></div>
					<div class="bbD">
						经度：<input type="text" class="input1" id="x" name="x" value="<?php echo  isset($res['x'])?$res['x']:null;;?>" /><!-- 经度 -->
					</div>
					<div class="bbD">
						纬度：<input type="text" class="input1" id="y" name="y" value="<?php echo isset($res['y'])?$res['y']:null;;?>"/><!-- 纬度 -->
					</div>					
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>
</form>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>

<script type="text/javascript" src="http://api.map.baidu.com/api?ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih&v=2.0&services=false"></script> 
<script>
$('#address').blur(function(){
	var con = $(this).val()
	alert(con)
})
//创建Map地图实例
var map = new BMap.Map("allmap");  
//设置中心点坐标
var point = new BMap.Point(116.331398,39.897445);

//初始化地图
//*地图类型：*普通地图：BMAP_NORMAL_MAP*卫星地图：BMAP_HYBRID_MAP
var map = new BMap.Map("map",{mapType:BMAP_NORMAL_MAP,minZoom:1,maxZoom:18}); //设置地图类型及最小最大级别

//设置地图级别（1-18）
map.centerAndZoom(point,12);
//开启滚轮缩放地图
map.enableScrollWheelZoom();
//进行浏览器定位
var geolocation = new BMap.Geolocation();
    // alert(geolocation)
geolocation.getCurrentPosition(function(r){
    // 定位成功事件
    if(this.getStatus() == BMAP_STATUS_SUCCESS){
        // alert('您的位置：'+r.point.lng+','+r.point.lat);
        var point = new BMap.Point(r.point.lng, +r.point.lat);
    }     
},{enableHighAccuracy: true})
//addEventListener--添加事件监听函数
//click--点击事件获取经纬度
map.addEventListener("click",function(e){
    $('#x').val(e.point.lng)
    $('#y').val(e.point.lat)
    // alert("鼠标单击地方的经纬度为："+ + "," + e.point.lat);
});
    </script>

    <script type="text/javascript">
    // $(".a1").css('background','red');
    // $(".img").click(function(){
    //     this.src="<?php echo e(url('captcha')); ?>"+'?r='+Math.random();
    // })
    // $(".a1").click(function(){
    //     $(this).css('background','red');
    //     $('.a2').css('background','');
    //     $(".hidden").val('0');
    // })
    // $(".a2").click(function(){
    //     $(this).css('background','red');
    //     $(".a1").css('background','');
    //     $(".hidden").val('1');
    // })
</script>



   <!--  <div class="card card-map">
		<div class="header">
            <h4 class="title">Google Maps</h4>
        </div>
		<div class="map">
			<div id="map"></div>
		</div>
	</div> -->
			
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>