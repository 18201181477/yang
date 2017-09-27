<?php $__env->startSection('css'); ?>
<script type="text/javascript" charset="utf-8" src="js/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="js/lang/zh-cn/zh-cn.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<body>
<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png"><span><a href="#">首页</a>&nbsp;-&nbsp;<a href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
		<form action="<?php echo e(url('admin/title')); ?>" method="post" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加文章</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						文章标题：<input type="text" class="input1" name="title_name">
					</div>
					<div class="bbD">
						文章作者：<input type="text" class="input1" name="title_author">
					</div>
					<div class="bbD">
						文章内容：<script id="editor" name="title_conntent" type="text/plain" style="width:1024px;height:500px;"><?php echo e(old('title_conntent')); ?></script>
					</div>
					<div class="bbD">
						文章照片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="title_img"> <a class="bbDDel" href="javascript:;">删除</a>
						</div>
					</div>
					<div class="bbD">
						排序：<input value="50" type="text" class="input1" name="sort">
					</div>
					<div style="color:red" class="bbD">
						<?php if(\Session::has('message')): ?>
						<?php echo e(\Session::get('message')); ?>

						<?php endif; ?>
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
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>