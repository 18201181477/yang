<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/pageGroup.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/pageGroup.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>


<?php $__env->startSection('content'); ?>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
		<form action="<?php echo e(url('admin/BackMenuAdd')); ?>" method="post" enctype="multipart/form-data">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加成员</span>
				</div>
				<div class="baBody">
					<div class="bbD" id="sss">
						权限名称：<input type="text" class="input1" name="menu_name" />
					</div>
					<div class="bbD">
						菜单级别：<select name="parent_id" id="chang">
							<option value="0">顶级权限</option>
							<?php foreach($menu as $v): ?>
								<option value="<?php echo e($v->mid); ?>"><?php echo e($v->menu_name); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div id="list" style="display: none;">
					<div class="bbD">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						控制器名称：<input type="text" class="input1" name="controller" />
					</div>
					<div class="bbD">
						方法名称：<input type="text" class="input1" name="action" />
					</div>
					</div>
					
					<div class="bbD">
						<p class="bbDP">
							<input type="submit" class="btn_ok btn_yes" value="提交">
							<input type="reset" value="取消" class="btn_ok btn_no">
						</p>
					</div>
				</div>
			</div>
</form>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
<script>

	

	$("#chang").change(function(){
		var pid = $(this).val()
		if (pid==0) 
		{
		  $("#list").hide()
		}
		else
		{
		  $("#list").show()
		}
	})
</script>


<?php $__env->stopSection(); ?>
</html>



<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>