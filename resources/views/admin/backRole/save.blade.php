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
		<form action="{{url('admin/BackRoleSave')}}" method="post" enctype="multipart/form-data">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加角色</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="rid" value="<?php echo $data[3]['rid']?>">
						角色名称：<input type="text" class="input1" name="role_name" value="{{$data[3]['role_name']}}" />
					</div>
					
					<div>
						<?php foreach($role as $v){?>
					        <span class="item_name" style="width:120px;"><?php echo $v['menu_name']?></span>
					        <label class="single_selection">
					          <?php foreach($v['child'] as $val){?>
            					<input name="mid[]" type="checkbox" 
            					<?php 
            					if(in_array($val['menu_name'],$data[3]['menu_name'])) { 
            						echo 'checked';
            						} ?> value='<?php echo $val['mid']?>'><?php echo $val['menu_name']?>
					            <?php
					            }
					          ?>
					        </label><br><br>
					        <?php
					        }
					        ?>
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