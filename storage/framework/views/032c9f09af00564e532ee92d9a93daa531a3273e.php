<?php $__env->startSection('title'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
 <div class="add" style="float:right;display: inline-block;height: 20px;">
                <a class="addA" href="<?php echo e(url('hos/doctor')); ?>" style="color:#fff">列表展示&nbsp;&nbsp;+</a>
            </div>
    <div id="pageAll">
        
        <div class="page ">

        <form action="<?php echo e(url('hos/doctoradd')); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 
            <!-- 上传广告页面样式 -->
            <div class="banneradd bor">
                <div class="baTop">
                    <span>医生添加</span>

                </div>
                <div class="baBody">
                    <div class="bbD">
                        姓名：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input1" name="name" placeholder="姓名"  />
                    </div>
                            <div class="bbD">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          医生照片 ：<input type="file"  name="image" /> 
                        </div>
                    <div class="bbD">
                        科室：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         <select name="offs_pid_id" class="cli">
                         <option value="" >顶级科室</option>
                            <?php foreach($data as $k => $v): ?>
                                <option value="<?php echo $v->id ?>" ><?php echo e($v->name); ?></option>
                            <?php endforeach; ?>
                        </select>    
                    </div>   
                  
                    <div class="bbD">
                        毕业院校：<input type="text" class="input1" name="school"  placeholder="毕业院校"  />
                    </div>
                    <div class="bbD">
                        主治方向：<input type="text" class="input1" name="main" placeholder="主治方向" />
                    </div>
                    <div class="bbD">
                        从医年限：   <select name="age" >
                           <?php for($i=1;$i<=50;$i++){?>
                            <option value="<?php echo $i ?>" ><?php echo $i ?>年</option>
                           <?php  } ?>
                        </select> 
                    </div>
                    <div class="bbD">
                        职称：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         <select name="title" >
                           <?php 
                           $arr = ['主任医师','教授','副主任医师','医师','实习医师'] ;
                           foreach ($arr as $k => $v) {?>

                            <option value="<?php echo $k ?>" ><?php echo $v ?></option>
                           <?php  } ?>
                        </select> 
                    </div>
                     <div >
                        是否专家：<input type="radio" name="is_expert" value="1" /> 是
                        <input type="radio" name="is_expert" value="0" />否
                    </div>
                    <div class="bbD">
                        个人成就：<textarea name="per_info" cols="42" rows="5" placeholder=" 个人成就简介 "></textarea>
                    </div>
                    
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" href="#">提交</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </div>
            </div>
</form>
    
        </div>
    </div>
</body>
</html>
<script>
    $('.cli').change(function(){
       var pid = $(this).val()
       var ob = $(this)
       $.ajax({
           type: "POST",
           url: "<?php echo e(url('hos/docoffs')); ?>",
           data: "_token=<?php echo e(csrf_token()); ?>&pid="+pid,
           dataType:'json',
           success: function(msg){
            var str = "<select name='offs_id' class='cli'>"
                str += "<option value='' >子级科室</option>"
            $(msg).each(function(k,v){
                 str += "<option value='"+v.id+"' >"+v.name+"</option>"
            })
            str += "</select>"   
    
            ob.after(str)           
            }

});
    });
</script>
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>