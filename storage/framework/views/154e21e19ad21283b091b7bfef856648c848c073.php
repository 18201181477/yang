<?php $__env->startSection('content'); ?>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form action="<?php echo e(url('admin/userAdd')); ?>" method="post">
					<?php echo e(csrf_field()); ?>

						<div class="cfD">
							<input name="name" class="userinput" type="text" placeholder="输入用户名" />-
							<input name="password" class="userinput vpr" type="text" placeholder="输入用户密码" />
							<input type="submit" class="userbtn" value="添加">
						</div>
					</form>
					<div style="color:red"><?php if(\Session::has('message')): ?><?php echo e(\Session::get('message')); ?><?php endif; ?></div>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="435px" class="tdColor">权限名称</td>
							
							<td width="435px" class="tdColor">控制器</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<?php foreach($data as $v): ?>
						<tr height="40px">
							<td><?php echo e($v['mid']); ?></td>
							<td><?php echo e(str_repeat('----',$v['lebel']).$v['menu_name']); ?></td>
							<td><?php echo e($v['controller']); ?></td>
							<td><a href="<?php echo e(url('admin/BackRoleSave')); ?>?rid=<?php echo e($v['mid']); ?>"><img class="operation"
									src="img/update.png"></a> <a href="javascript:;" class="del" num="<?php echo $v['mid']?>"><img class="operation delban"
								src="img/delete.png"></a></td>
						</tr>
						<?php endforeach; ?>
					</table>
					
					<div class="paging">
						
						<div id="pageGro" class="cb">
							
						</div>
					
					</div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	
	<!-- 删除弹出框  end-->
</body>

<script>
	
	$('.del').click(function(){
		// 获取当前id
		var rid = $(this).attr('num')

		$.ajax({
			type:'get',
			url:"<?php echo e(url('admin/BackRoleDel')); ?>",
			data:'rid='+rid,
			success:function(e) {
				alert(e)
			}
		})
	})
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>