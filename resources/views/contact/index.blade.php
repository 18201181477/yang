@extends('layouts.frontend_layouts')
@section('css')
<style type="text/css">
#fullbg { 
	background-color:gray; 
	left:0; 
	opacity:0.5; 
	position:absolute; 
	top:0; 
	z-index:3; 
	filter:alpha(opacity=50); 
	-moz-opacity:0.5; 
	-khtml-opacity:0.5; 
} 
#dialog { 
	background-color:#fff; 
	border:5px solid rgba(0,0,0, 0.4); 
	width:800px;
	left:40%; 
	margin:-200px 0 0 -200px; 
	padding:1px; 
	position:fixed !important; /* 浮动对话框 */ 
	position:absolute; 
	top:50%; 
	z-index:5; 
	border-radius:5px; 
	display:none; 
}
.p{color: blue;} 
#who{color: red;}
</style>
@stop
@section('content')

	<!--contact-->
	<div class="contact">
		<div class="container">
			<div class="panel panel-default">
				@foreach($arr as $k=>$v)
					<div class="panel panel-default">
						<table class="table">
							<tr>
								<td width="15%"></span><span class="badge badge-primary">{{$k+1}} . floor</span></td>
								<td width="20%"><a href="javascript:;" title="{{$v->email}}">{{$v->name}}</a></td>
								<td width="15%">{{$v->email}}</td>
								<td width="15%">{{date('Y-m-d H:i:s',$v->addtime)}}</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="4">
									<?php
		                                echo preg_replace('#\[(.*)\]#U','<img src="images/qqface/$1"/>',$v->message);
		                            ?>
								</td>
							</tr>
						</table>
					</div>
				@endforeach
				{{$arr->render()}}
			</div>
			<div class="contact-form">
				<form action="{{url('contact')}}" method="post">
                    <?php echo csrf_field(); ?>
					<input type="text" value="姓名" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '姓名';}" required="">
					<div class="col-md-6 cnt-inpt">
						<input type="email" value="邮箱" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '邮箱';}" required="">
					</div>
					<div class="col-md-6 cnt-inpt">
						<input type="text" value="电话" name="telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '电话';}" required="">
					</div>
					<div class="clearfix"> </div>
					<textarea name="message" id="message"  required=""></textarea>
					
					<div class="btn-group">
	                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">表情
	                        <span class="caret"></span>
	                    </button>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                        <?php for($i=1;$i<=30;$i++){?>
	                            <img src="images/qqface/{{$i}}.gif" class="img1" name="[{{$i}}.gif]" style="cursor:pointer;">
	                        <?php }?>
	                        </li>
	                    </ul>
                	</div>
					<input type="submit" value="发表" class="pull-right">
				</form>

			</div>
		</div>
	</div>
	<div id="fullbg"></div> 
		<div id="dialog"> 
			<h3 class="p">
			<?php
				if(\Session::get('user')['name']){
					echo '<font color="red">' . \Session::get('user')['name']. '</font>';
				}else{
					echo '<font color="red">匿名</font>';
				}
			?>
			对<span id="who"></span>的回复<button class="label label-danger pull-right" onclick="closeBg();">X</button></h3>
			<div class="contact-form">
				<form action="{{url('reply')}}" method="post">
	                <?php echo csrf_field(); ?>
					<textarea name="message" id="msg" required=""></textarea>
					<div class="btn-group">
	                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">表情
	                        <span class="caret"></span>
	                    </button>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                        <?php for($i=1;$i<=30;$i++){?>
	                            <img class="img2" src="images/qqface/{{$i}}.gif" name="[{{$i}}.gif]" style="cursor:pointer;">
	                        <?php }?>
	                        </li>
	                    </ul>
                	</div>
					<input type="submit" class="pull-right" value="回复">
				</form>
			</div> 
		</div> 

    <!--//contact-->
@stop
@section('js')
<script type="text/javascript"> 
	//显示灰色 jQuery 遮罩层 
	function showBg(id,name) { 
		var bh = $("body").height(); 
		var bw = $("body").width(); 
		$("#fullbg").css({ 
			height:bh, 
			width:bw, 
			display:"block" 
		}); 
		$('#who').text(name);
		$("#dialog").show(); 
	} 
	//关闭灰色 jQuery 遮罩 
	function closeBg() { 
		$('#msg').val('');
		$("#fullbg,#dialog").hide(); 
	} 
</script>
<script type="text/javascript">
    $(document).on('click','.img1',function(){
        var content = $('#message').val();
        var img = $(this).prop('name');
        var newV = content+img;
        $('#message').val(newV);
    })
    $(document).on('click','.img2',function(){
        var content = $('#msg').val();
        var img = $(this).prop('name');
        var newV = content+img;
        $('#msg').val(newV);
    })
</script>
@stop