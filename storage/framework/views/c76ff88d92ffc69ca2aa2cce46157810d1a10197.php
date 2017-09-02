<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
		<form action="<?php echo e(url('admin/memberadd')); ?>" method="post" enctype="multipart/form-data">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加成员</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						成员名称：<input type="text" class="input1" name="name" />
					</div>
					<div class="bbD">
						成员网址：<input type="text" class="input1" name="pre_url" />
					</div>
					<div class="bbD">
						成员简介：<textarea name="pre_info"></textarea>
					</div>
					<div class="bbD">
						成员照片：
						<div class="bbDd">
						 	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="img" /> <a class="bbDDel" href="#">删除</a>
						</div>
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