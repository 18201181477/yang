@extends('layouts.frontend_layouts')
@section('title')
	医疗服务
@stop

@section('content')
	<div class="services">
		<div class="container">
			<h3>Services overview</h3>
			<div class="row services-info">		
				@foreach($arr as $val)	
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
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
								}
							?>
							</p>				
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
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
@stop