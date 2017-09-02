<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<link rel="stylesheet" type="text/css" href="css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<title>蓝色的企业后台cms管理系统模板_网站模板_js代码</title>
<meta name="keywords" content="国内网站模板,蓝色,企业后台管理系统,企业后台模板,cms后台管理系统,cms网站管理系统,cms后台模板,cms管理系统模板" />
<meta name="description" content="蓝色的企业后台cms管理系统模板。" />
</head>
<script type="text/javascript">
function SetWinHeight(obj){ 
	var win=obj; 
	if (document.getElementById){ 
		if (win && !window.opera){ 
			if (win.contentDocument && win.contentDocument.body.offsetHeight) 
			win.height = win.contentDocument.body.offsetHeight+40; 
			else if(win.Document && win.Document.body.scrollHeight) 
			win.height = win.Document.body.scrollHeight+40; 
		} 
	} 
}
</script>
<frameset rows="100,*" cols="*" scrolling="No" framespacing="0" frameborder="no" border="0">
	<frame src="inc/backend_head.blade.php" name="headmenu" id="mainFrame" title="mainFrame"><!-- 引用头部 -->
	<!-- 引用左边和主体部分 --> 
	<frameset rows="100*" cols="220,*" scrolling="No" framespacing="0" frameborder="no" border="0">
		<frame src="inc/backend_left.blade.php" name="leftmenu" id="mainFrame" title="mainFrame">
		<?php echo $__env->yieldContent('content'); ?>
	</frameset>
</frameset>
</html>
<!--
本代码由热心网友上传，js代码网收集并编辑整理;
请尊重他人劳动成果;
转载请保留js代码链接 - www.jsdaima.com
-->