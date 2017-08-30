<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>新增医院</span>
				</div>
				<form action="{{url('admin/add')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 						
				<div class="baBody">
				<div class="bbD">
					医院名称：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="input1" name="name" type="text" />								
				</div>
				
				<div class="bbD">
					医院网址：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="url" class="input1" />
				</div>

				<div class="bbD">
					上传图片：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="bbDd">
						<div class="bbDImg">+</div>
						<input type="file" class="file" name="image" /> <a class="bbDDel" href="#">删除</a>
					</div>
				</div>

				<div class="bbD">
					分类：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="type" class="input1" />
				</div>

				<div class="bbD">
						医院简介：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="btext2">
							<textarea name="profile" class="text2"></textarea>
						</div>
				</div>
								

				<div class="bbD">
					营业执照许可证号：<input type="text" name="documents" class="input1" />
				</div>

				<div class="bbD">
					医院等级：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="grade" class="input1" />
				</div>

				<div class="bbD">
					医院所在位置：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="address" class="input1" />
				</div>

				<div class="bbD">
						医院公交路线：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="btext2">
							<textarea name="route" class="text2"></textarea>
						</div>
				</div>				
				
				<div class="bbD">
					联系电话：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="phone" class="input1" />
				</div>

				<div class="bbD">
					排序：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="input2" name="sort" type="text" />				
				</div>

				<div class="bbD">
					<p class="bbDP">
						<input type="submit" value="提交" class="btn_ok btn_yes">
						<input type="reset" value="重置" class="btn_ok btn_no">
						
					</p>
				</div>

				</div>
			</form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>