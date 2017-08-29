@extends('layouts.frontend_layouts')

@section('nav1')
	<li><a href="{{ URL::route('index/index') }}"><span data-hover="主页">主页</span></a></li>
	<li><a href="{{ URL::route('index/about') }}"> <span data-hover="关于我们">关于我们</span></a></li>
	<li><a href="{{ URL::route('index/services') }}" class="active"> <span data-hover="医疗服务">医疗服务</span></a></li>
	<li><a href="{{ URL::route('index/news') }}"> <span data-hover="最新消息">最新消息</span></a></li>
	<li><a href="{{ URL::route('index/contact') }}"> <span data-hover="联系我们">联系我们</span></a></li>
@stop

@section('content')
	<div class="services">
		<div class="container">
			<h3>Services overview</h3>
			<div class="row services-info">			
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img9.jpg">
								<img src="images/img9.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img10.jpg">
								<img src="images/img10.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img11.jpg">
								<img src="images/img11.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img12.jpg">
								<img src="images/img12.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img13.jpg">
								<img src="images/img13.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img14.jpg">
								<img src="images/img14.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img15.jpg">
								<img src="images/img15.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img16.jpg">
								<img src="images/img16.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 services-grids">
					<div class="thumbnail">
						<div class="moments-bottom">
							<a href="images/img17.jpg">
								<img src="images/img17.jpg" class="img-responsive zoom-img " alt="">				
							</a>
						</div>
						<div class="caption services-caption">
							<h4><a href="single.html">Facilisis dignissimos luptat</a></h4>
							<p>Cras justo odioda pibus facilisis dignissimos voluptatem accusantium</p>				
						</div>
					</div>
				</div>
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