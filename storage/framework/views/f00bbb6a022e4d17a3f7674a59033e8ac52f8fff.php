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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>