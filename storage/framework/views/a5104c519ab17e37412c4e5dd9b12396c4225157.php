<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="/backend/">
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="<?php echo e(url('admin/home')); ?>" target="main"><div class="line">
					<img src="img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="img/coin01.png" /><img class="icon2"src="img/coin02.png" />
				首页<img class="icon3" src="img/coin19.png" /><img class="icon4" src="img/coin20.png" /></dt>
		</dl> -->
		<?php foreach($data as $val){?>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="img/coin03.png" /><img class="icon2"
						src="img/coin04.png" /><?php echo $val['menu_name']?><img class="icon3"
						src="img/coin19.png" /><img class="icon4"
						src="img/coin20.png" />
				</dt>
				<?php if(isset($val['child'])){foreach($val['child'] as $v){?>
				<dd>
					<img class="coin11" src="img/coin111.png" /><img class="coin22"
						src="img/coin222.png" /><a class="cks" href="<?php echo url("admin/".$v['controller']."")?>"
						target="main"><?php echo $v['menu_name']?></a><img class="icon5" src="img/coin21.png" />
				</dd>
				<?php
				}
				}
				?>
			</dl>
			<?php
			}
			?>

		</div>

	</div>
</body>
</html>
<!--
本代码由热心网友上传，js代码网收集并编辑整理;
请尊重他人劳动成果;
转载请保留js代码链接 - www.jsdaima.com
-->