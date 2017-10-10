<?php $__env->startSection('title'); ?>
    医院后台
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="/backend/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>科室添加</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div class="add" style="float:right;display: inline-block;height: 20px;">
                <a class="addA" href="<?php echo e(url('hos/offices')); ?>" style="color:#fff">返回列表&nbsp;&nbsp;+</a>
            </div>
<div id="pageAll">

    <div class="pageTop">

        <div class="page"> 

            <img src="img/coin02.png" /><span><a href="javascript:void;">添加科室</a> 
           
        </div>

    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>添加科室</span>
            </div>
             
            <form action="<?php echo e(url('hos/officeadd')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                
                <div class="baBody">
                    <div>

                        选择科室：<select name="office_pid[]" class="cli">
                         <option value="" >顶级科室</option>
                            <?php foreach($data as $k => $v): ?>
                                <option value="<?php echo $v->id ?>" ><?php echo e($v->name); ?></option>
                            <?php endforeach; ?>
                        </select>   
                        <span id="offs_id"></span> 
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                        <input type="submit" class="btn_ok btn_yes" value="提交" />
                            <!-- <button  href="#"></button> -->
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $('.cli').change(function(){
       var pid = $(this).val()
       var ob = $(this)
       $.ajax({
           type: "POST",
           url: "<?php echo e(url('hos/offspid')); ?>",
           data: "_token=<?php echo e(csrf_token()); ?>&pid="+pid,
           dataType:'json',
           success: function(msg){
            var str = "<select name='office_pid[]' class='cli'>"
                str += "<option value='' >子级科室</option>"
            $(msg).each(function(k,v){
                 str += "<option value='"+v.id+"' >"+v.name+"</option>"
            })
            str += "</select>"   
    
           $('#offs_id').html(str)        
            }

});
    });
</script>

</html>
<?php $__env->stopSection(); ?>
<!-- // return view('pc.index')->with([
             //    'message'=>'添加成功',
             //    'url'=>'index/addpage',
             //    'jumpTime'=>2,
             //  ]); -->
<?php echo $__env->make('layouts.hospital_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>