<?php $__env->startSection('content'); ?>

	<!--contact-->
	<div class="contact">
		<div class="container">
			<h3>留言板</h3>
			<div class="panel panel-default">
				<?php foreach($arr as $k=>$v): ?>
					<div class="panel panel-default">
						<table class="table">
							<tr>
								<td width="15%"></span><span class="badge badge-primary"><?php echo e($k+1); ?> . floor</span></td>
								<td width="30%"><a href="javascript:;" title="<?php echo e($v->email); ?>"><?php echo e($v->name); ?></a></td>
								<td width="15%"><?php echo e($v->email); ?></td>
								<td width="15%"><?php echo e(date('Y-m-d H:i:s',$v->addtime)); ?></td>
								<td><a href="javascript:;">回复</a></td>
							</tr>
							<tr>
								<td></td>
								<td colspan="4">
									<?php echo e($v->message); ?>

								</td>
							</tr>
						</table>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="contact-form">
				<form action="<?php echo e(url('contact')); ?>" method="post">
                    <?php echo csrf_field(); ?>
					<input type="text" value="Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<div class="col-md-6 cnt-inpt">
						<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					</div>
					<div class="col-md-6 cnt-inpt">
						<input type="text" value="Telephone" name="telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
					</div>
					<div class="clearfix"> </div>
					<textarea name="message" onfocus="this.value = '' ;" onblur="if (this.value == '') {this.value = 'Message...';}" required=""> Message... </textarea>
					<input type="submit" value="submit">
				</form>
			</div>
		</div>
	</div>
    <!--//contact-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>