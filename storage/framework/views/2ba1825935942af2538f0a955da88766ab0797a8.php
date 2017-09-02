<?php
date_default_timezone_set("Asia/Shanghai");
?>



<style>
.footer{
display: none;
}


.pagination li{list-style:none;float:left;}


</style>
<?php $__env->startSection('content'); ?>
	<!--contact-->
	<div class="contact">
		<div class="container">
			<h3>Contact us</h3>
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
    <div style="margin-left: 240px;">
        <h1 style="color:green">最近的帖子</h1>
        
        <?php  foreach($arr as $k=>$v){?>
        <p style="color: #0086b3"><?php echo  $v->name; ?>&nbsp;<?php echo date('Y-m-d H:i:s',$v->addtime);?>:</p>
        <p><?php echo $v->message ?></p>
        <?php } ?>
    </div>
    <style>
        .pagination{
            margin-left: 600px;
        }
    </style>
    <?php echo $arr->links(); ?>

	<!--//contact-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>