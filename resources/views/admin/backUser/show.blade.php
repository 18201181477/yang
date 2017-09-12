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
							<td width="435px" class="tdColor">管理员</td>
							<td width="400px">状态</td>
							<td width="435px" class="tdColor">创建时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach($data as $v)
						<tr height="40px">
							<td>{{$v['id']}}</td>
							<td>{{$v['username']}}</td>
							<td>@if($v['status']==0)正常使用@else账号锁定@endif</td>
							<td>{{$v['created_at']}}</td>
							<td><a href="javascript:;"><img class="operation"
									src="img/update.png"></a> <img class="operation delban"
								src="img/delete.png"></td>
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
@stop