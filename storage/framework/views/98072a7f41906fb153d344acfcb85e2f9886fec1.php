<?php $__env->startSection('content'); ?>
<body>
	<div id="pageAll">
		<div class="page">
			<!-- main页面样式 -->
			<div class="indexL">
				<img class="indexBn" src="img/indexBanner.png" />
			</div>
			<!-- main页面样式end -->
		</div>
	</div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>