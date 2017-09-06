<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="/backend/">
<title>登录后台</title>
<style type="text/css">
	.submit{
		background-color: #ee7700;
    border: medium none;
    color: white;
    font-size: 18px;
    height: 45px;
    width: 100%;
	}
</style>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="img/logLOGO.png" />
	</div>
	<!-- 登录页面头部结束 -->

	<!-- 登录body -->
	<form action="{{url('admin/login')}}" method="post">
	{{csrf_field()}}
	<div class="logDiv">
		<img class="logBanner" src="img/logBanner.png" />
		<div class="logGet">
			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<p class="p1">登录</p>
				<p class="p2">有点人员登录</p>
			</div>
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="img/logName.png" /><input name="Admin[name]" value="{{ old('Admin')['name']}}" type="text"
					placeholder="输入用户名" />
			</div>
			<!-- <div class="lgD" style="color:red">{{$errors->first('Admin.name')}}</div> -->
			<div class="lgD">
				<img class="img1" src="img/logPwd.png" /><input value="{{ old('Admin')['password']}}" name="Admin[password]" type="password"
					placeholder="输入用户密码" />
			</div>
			<!-- <div class="lgD" style="color:red">{{$errors->first('Admin.password')}}</div> -->
			<div class="lgD logD2">
				<input name="captcha" class="getYZM" type="text" />
				<div class="logYZM">
					<img class="yzm" width="100px" height="50px"  src="{{url('captcha')}}" />
				</div>
			</div>
			<div style="color:red" class="lgD">
			@if(count($errors))
			@foreach($errors->all() as $v)
			{{$v}}
			@endforeach
			@endif
			@if(\Session::has('message'))
			{{\Session::get('message')}}
			@endif

			</div>
			<div class="logC">
				<input type="submit" class="submit" value="提交">
			</div>
		</div>
	</div>
	</form>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：南京设易网络科技有限公司</p>
		<p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
<!--
本代码由热心网友上传，js代码网收集并编辑整理;
请尊重他人劳动成果;
转载请保留js代码链接 - www.jsdaima.com
-->
<script type="text/javascript">
	$(".yzm").click(function(){
        this.src="{{url('captcha')}}"+'?r='+Math.random();
    })
</script>