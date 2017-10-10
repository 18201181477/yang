@extends('layouts.backend')
@section('content')
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
		<form action="{{url('admin/BackUserAdd')}}" method="post" enctype="multipart/form-data">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加成员</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						用户名称：<input type="text" class="input1" name="username" />
					</div>
					<div class="bbD">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						用户密码：<input type="text" class="input1" name="passwd" />
					</div>
					
					<div class="bbD">
						<p class="bbDP">
							<input type="submit" class="btn_ok btn_yes" value="提交">
							<input type="reset" value="取消" class="btn_ok btn_no">
						</p>
					</div>
				</div>
			</div>
</form>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
@stop