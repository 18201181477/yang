@extends('layouts.frontend_layouts')

@section('nav1')
	<li><a href="{{ URL::route('index/index') }}"><span data-hover="主页">主页</span></a></li>
	<li><a href="{{ URL::route('index/about') }}"> <span data-hover="关于我们">关于我们</span></a></li>
	<li><a href="{{ URL::route('index/services') }}"> <span data-hover="医疗服务">医疗服务</span></a></li>
	<li><a href="{{ URL::route('index/news') }}"> <span data-hover="最新消息">最新消息</span></a></li>
	<li><a href="{{ URL::route('index/contact') }}" class="active"> <span data-hover="联系我们">联系我们</span></a></li>
@stop

@section('content')
	<!--contact-->
	<div class="contact">
		<div class="container">
			<h3>Contact us</h3>
			<div class="contact-form">
				<form>
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<div class="col-md-6 cnt-inpt">
						<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					</div>
					<div class="col-md-6 cnt-inpt">
						<input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
					</div>
					<div class="clearfix"> </div>
					<textarea onfocus="this.value = '' ;" onblur="if (this.value == '') {this.value = 'Message...';}" required=""> Message... </textarea>
					<input type="submit" value="submit">
				</form>
			</div>
		</div>
	</div>
	<!--//contact-->
@stop