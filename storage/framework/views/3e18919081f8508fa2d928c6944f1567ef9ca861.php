
<!DOCTYPE html>
<html>

<!-- Head -->
<head>
<base href="/frontend/">
    <title>登录表单</title>

    <!-- Meta-Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <!-- //Meta-Tags -->

    <!-- Style --> <link rel="stylesheet" href="css/style2.css" type="text/css" media="all">

  <style type="text/css">
	#normal_map {height:200px;overflow: hidden;width: 300px}
	#map {width: 500px;height: 300px;overflow: hidden;margin:0;}
</style>


</head>
<!-- //Head -->

<!-- Body -->
<body>

    <h1>用户信息完善</h1>

    <div class="container w3layouts agileits">

        <div class="register w3layouts agileits">
            <h2>用户信息完善</h2>
            <form action="<?php echo e(url('Perfect/add')); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 
            <!-- <?php echo e(csrf_field()); ?> -->
                <input type="text" name="name" placeholder="医院名称" value="<?php echo  isset($res['name'])?$res['name']:null;?>" >
                <div class="bbD">
                <input type="text"  placeholder="医院图片上传" disabled>
			
						<input type="file" class="file" name="image" /> 
				</div>
                <input type="text" name="url"  placeholder="医院官网" value="<?php echo  isset($res['name'])?$res['name']:null;;?>">
                <!-- <input type="text" name="type"  placeholder="医院类型" /> -->
                <!-- <input type="text" name="grade" placeholder="医院等级" /> -->
                <input type="text" name="documents" placeholder="营业执照" value="<?php echo  isset($res['documents'])?$res['documents']:null;;?>">
                <input type="text" name="phone" placeholder="联系电话" value="<?php echo  isset($res['phone'])?$res['phone']:null;;?>">
                <input type="text" name="address" placeholder="详细地址" value="<?php echo  isset($res['address'])?$res['address']:null;;?>">
                <textarea name="profile" id="" cols="50" rows="7" placeholder=" 医院简介 "><?php echo  isset($res['profile'])?$res['profile']:null;;?></textarea><br/>
                <input type="text"  placeholder="医院地理位置" disabled>
               
                <div id="map"></div>
                <input type="text" id="x" name="x" value="<?php echo  isset($res['x'])?$res['x']:null;;?>"><!-- 经度 -->
                <input type="text" id="y" name="y" value="<?php echo isset($res['y'])?$res['y']:null;;?>"><!-- 纬度 -->
            <div class="send-button w3layouts agileits">
                    <input type="submit" value="提交">
            </div>
            </form>
            <div class="clear"></div>
        </div>
            
            <div class="clear"></div>
        </div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
        

        <div class="clear"></div>

    </div>


</body>
<!-- //Body -->

</html>
<script type="text/javascript" src="http://api.map.baidu.com/api?ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih&v=2.0&services=false"></script> 
<script>
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


<!-- 10:51:29 -->
<!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=v5wMmTk3ZPw1vTsH1pvVAnqrg5DqVbih"></script> -->
<script type="text/javascript">
    $(".a1").css('background','red');
    $(".img").click(function(){
        this.src="<?php echo e(url('captcha')); ?>"+'?r='+Math.random();
    })
    $(".a1").click(function(){
        $(this).css('background','red');
        $('.a2').css('background','');
        $(".hidden").val('0');
    })
    $(".a2").click(function(){
        $(this).css('background','red');
        $(".a1").css('background','');
        $(".hidden").val('1');
    })
</script>