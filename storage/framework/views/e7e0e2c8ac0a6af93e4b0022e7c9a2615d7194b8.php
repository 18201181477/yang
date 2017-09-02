<?php
use App\Queque;
?>


<?php $__env->startSection('right_content'); ?>	
<!-- 右侧内容 -->
<div class="col-md-9">
	<!-- 成功提示框 -->
	<?php if(Session::has('success')): ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> <?php echo e(Session::get('success')); ?>

	</div>
	<?php endif; ?>
	<!-- 失败提示框 -->
	<?php if(Session::has('error')): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> <?php echo e(Session::get('error')); ?>

	</div>
	<?php endif; ?>
	<!-- 失败提示框 -->
	<?php if(Session::has('pay')): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> <a href="<?php echo e(url('pay')); ?>"><?php echo e(Session::get('pay')); ?></a>
	</div>
	<?php endif; ?>
	<!-- 自定义内容 -->
	<div class="panel panel-default">
		<div class="panel-heading">所有科室</div>
		<div class="panel-body">
			<table class="table table-striped table-responsive table-hover">
				<thead>
					<tr>
						<th>科室名称</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($param as $val): ?>
					<tr>
						<td><?php echo e($val->name); ?></td>
						<td>
						<?php if(\Auth::user()): ?>
							<?php if(\Auth::user()->status==0): ?>
							<a href="<?php echo e(url('/queque',['id',$val['id']])); ?>">挂号</a>
							<?php else: ?>
							<a href="javascript:;">不可操作</a>
							<?php endif; ?>
						<?php else: ?>
							<a href="<?php echo e(url('/queque',['id',$val['id']])); ?>">挂号</a>
						<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<nav>
	<font color="red">* 温馨提示：当前挂号有效时间为一周内</font>
		<div class="pagination pull-right">
			<?php echo e($param->render()); ?>

		</div>
	</nav>	
</div>
	<script>
	$(function(){
		
	})
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.detail_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>