<?php $__env->startSection('right_content'); ?>
<!-- 右侧内容 -->
<div class="col-md-9">
	<!-- 自定义内容 -->
	<div class="panel panel-default">
		<div class="panel-heading">医院详情</div>
		<div class="panel-body">
			<table class="table table-striped table-responsive table-hover">
				<tbody>
					<tr>
						<th>医院图片</th>
						<td><img src="/img/<?=$data['image']?>" /></td>
					</tr>
					<tr>
						<th>医院名称</th>
						<td><?=$data['name']?></td>
					</tr>
					<tr>
						<th>医院官网</th>
						<td><a href="<?=$data['url']?>" title="<?=$data['url']?>"><?=$data['url']?></a></td>
					</tr>
					<tr>
						<th>医院简介</th>
						<td><?=$data['profile']?></td>
					</tr>
					<tr>
						<th>医院地址</th>
						<td><?=$data['address']?></td>
					</tr>
					<tr>
						<th>联系电话</th>
						<td><?=$data['phone']?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.detail_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>