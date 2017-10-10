<?php $__env->startSection('title'); ?>
	医疗服务
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="services">
		<div class="container">
			<div class="btn-group">
			<button type="button" id="bbt" tid="<?php echo isset($type['tid']) ? $type['tid'] : ''?>" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			<?php echo isset($type) ? $type['tname'] : '医院分类';?> 
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="<?php echo e(url('service')); ?>">查看全部</a></li>
				<?php foreach($info as $val){?>
					<li><a href="<?php echo e(url('service')); ?>?type_id=<?php echo $val['tid']?>"><?php echo $val['tname']?></a></li>
				<?php
				}
				?>	
			</ul>
			</div>
			<h3>Services overview</h3>
			<div class="row services-info" id="list">		
				<?php foreach($arr as $val): ?>	
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail" eid="<?php echo $val['id']?>">
						<div class="moments-bottom">
							<a href="<?php echo e(url('/info',['id',$val['id']])); ?>">
								<img src="/img/<?=$val['image']?>" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="<?php echo e(url('/info',['id',$val['id']])); ?>"><?=$val['name']?></a></h4>
							<p>
							<?php
								if (mb_strlen($val['profile'])>=10) {
									echo mb_substr($val['profile'],0,10).'……';
								} else {
									echo $val['profile'];
								}
							?>
							</p>				
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"> </div>
			</div>
			<button type="button" id="page" class="btn btn-primary btn-lg" page="1" ser="<?php echo e($data['search']); ?>" >加载更多</button
			<!--light-box-js -->
				<script src="js/jquery.chocolat.js"></script>
				<!--light-box-files -->
				<script type="text/javascript">
				$(function() {
					$('.moments-bottom a').Chocolat();
				});
				</script>
			<!--//end-gallery js-->
		</div>
	</div>

<script>

function get_page(page, search, eid, tid) {

	$.ajax({
		type:'get',
		url:'<?php echo e(url("ServiceShow")); ?>',
		data:'page='+page+'&search='+search+'&eid='+eid+'&tid='+tid,
		dataType:'json',
		success:function(e) {
			var str = ''
			$(e).each(function(k, v){
				var profile = v.profile
				if(profile.length >= 10) {
					profile = profile.slice(0,10)
				}
				var id = v.id;
				// alert(id)
				str += '<div class="list" pic="/img/'+v.image+'">'
				str += '<div class="col-sm-6 col-md-4 services-grids">'
				str += '<div class="thumbnail" eid='+v.id+'><div class="moments-bottom">'
				str += '<a href="http://www.docter.com/info/id/'+id+'">'
				str += '<img src="/img/'+v.image+'" class="img-responsive zoom-img " alt="">'
				str += '</a>'
				str += '</div>'
				str += '<div class="caption services-caption"><h4>'
				str += '<a href="http://www.docter.com/info/id/'+id+'">'+v.name+'</a></h4>'
				str += '<p>'+profile+'</p>'
				str += '</div></div></div></div>'
			})

			$('#list').append(str)
		}

	})
	$('#page').attr('page',page)
}

$('#page').click(function(){

	// 当前页
	var page = $(this).attr('page') 
	// 搜索条件 名臣
	var search = $('#page').attr('ser')
	// 最后一条id
	var eid = $('.thumbnail').last().attr('eid')
	// 搜索条件 分类
	var tid = $('#bbt').attr('tid')

	page = parseInt(page) + 1

	get_page(page, search, eid, tid)
})

// $(function(){//页面第一次加载时
// 	var page = $('#page').attr('page')
// 	if(page == '') {
// 		page = 1
// 	}
	
// 	get_page(page)

// });

</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>