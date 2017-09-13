@extends('layouts.frontend_layouts')
@section('title')
	医疗服务
@stop

@section('content')

	<div class="services">
		<div class="container">

<div class="btn-group">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">医院分类 
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<?php foreach($info as $val){?>
			<li><a href="{{url('service')}}?type_id=<?php echo $val['tid']?>"><?php echo $val['tname']?></a></li>
		<?php
		}
		?>
		
	</ul>
</div>
			<h3>Services overview</h3>
			<div class="row services-info" id="list">		
				
				@foreach($arr as $val)	
				<div class="col-sm-6 col-md-4 services-grids" >

					<div class="thumbnail" eid="{{$val['id']}}">
					
						<div class="moments-bottom">
							<a href="{{url('/info',['id',$val['id']])}}">
								<img src="/img/<?=$val['image']?>" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="{{url('/info',['id',$val['id']])}}"><?=$val['name']?></a></h4>
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
				@endforeach

				<div class="clearfix"></div>
			</div>
			<button type="button" id="page" class="btn btn-primary btn-lg" page="1" ser="{{$data['search']}}" >加载更多</button
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


function get_page(page, search, eid) {
	$.ajax({
		type:'get',
		url:'{{url("ServiceShow")}}',
		data:'page='+page+'&search='+search+'&eid='+eid,
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
	var page = $(this).attr('page')
	var search = $('#page').attr('ser')
	var eid = $('.thumbnail').last().attr('eid')

	page = parseInt(page) + 1

	get_page(page, search, eid)
})

// $(function(){//页面第一次加载时
// 	var page = $('#page').attr('page')
// 	if(page == '') {
// 		page = 1
// 	}
	
// 	get_page(page)

// });

</script> 
@stop