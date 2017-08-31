<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/pageGroup.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/pageGroup.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;成员详情
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form>
						<div class="cfD">
							
							<button class="userbtn">添加</button>

						</div>
					</form>
				</div>

				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="435px" class="tdColor">名称</td>
							<td width="400px" class="tdColor">照片</td>
							<td width="630px" class="tdColor">网址</td>
							<td width="400" class="tdColor">描述</td>
							<td width="400" class="tdColor">添加时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						<?php foreach($data['data'] as $val){?>
							<tr height="40px">
								<td><?php echo $val['id']?></td>
								<td><?php echo $val['name']?></td>
								<td><img src="{{url($val['img'])}}" style="height: 100px;width: 200px;" /></td>
								<td><?php echo $val['per_url']?></td>
								<td><?php echo $val['per_info']?></td>
								<td><?php echo date('Y-m-d H:i:s',$val['add_time'])?></td>
								<td><a href="{{url('admin/memberSave')}}?id=<?php echo $val['id']?>" id="up"><img class="operation"
										src="img/update.png"></a> <a href="javascript:;" num="<?php echo $val['id']?>" class="del"><img
									src="img/delete.png"></a></td>
							</tr>
						<?php
						}
						?>
					</table>
					
					<div class="paging">
						
						<div id="pageGro" class="cb">
							<a href="<?php echo $data['prev_page_url']?>"><div class="pageUp">上一页</div></a>
						    
						    <a href="<?php echo $data['next_page_url']?>"><div class="pageDown">下一页</div></a>
						</div>
						
					</div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


</body>

<script>
	$('.del').click(function(){
		var id = $(this).attr('num')
		var ob = $(this)
		$.ajax({
			type:'get',
			url:"{{url('admin/memberDel')}}",
			data:'id='+id,
			success:function(e) {
				if(e==1) {
					ob.parent().parent().remove()
				} else {
					alert('删除失败')
				}
			}
		})
	})
</script>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>
<!--
本代码由热心网友上传，js代码网收集并编辑整理;
请尊重他人劳动成果;
转载请保留js代码链接 - www.jsdaima.com
-->