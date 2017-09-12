@extends('layouts.backend')
@section('content')
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
					<form action="{{url('admin/userAdd')}}" method="post">
					{{csrf_field()}}
						<div class="cfD">
							<input name="name" class="userinput" type="text" placeholder="输入用户名" />-
							<input name="password" class="userinput vpr" type="text" placeholder="输入用户密码" />
							<input type="submit" class="userbtn" value="添加">
						</div>
					</form>
					<div style="color:red">@if(\Session::has('message')){{\Session::get('message')}}@endif</div>
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
						@foreach($data as $v)
						<tr height="40px">
							<td>{{$v['mid']}}</td>
							<td>{{str_repeat('----',$v['lebel']).$v['menu_name']}}</td>
							<td>{{$v['controller']}}</td>
							<td><a href="{{url('admin/BackRoleSave')}}?rid={{$v['mid']}}"><img class="operation"
									src="img/update.png"></a> <a href="javascript:;" class="del" num="<?php echo $v['mid']?>"><img class="operation delban"
								src="img/delete.png"></a></td>
						</tr>
						@endforeach
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
			url:"{{url('admin/BackRoleDel')}}",
			data:'rid='+rid,
			success:function(e) {
				alert(e)
			}
		})
	})
</script>


@stop