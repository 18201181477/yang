<?php $__env->startSection('content'); ?>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>" id="csrf">
        <div class="banner">
            <div class="add">
                <a class="addA" href="/admin/departmentadd">添加科室&nbsp;&nbsp;+</a>
            </div>
                <h1><?php if(isset($status)){echo '该科室已存在';}?></h1>
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="132px" class="tdColor tdC">序号</td>
                        <td width="616px" class="tdColor">科室名称</td>
                        <td width="616px" class="tdColor">所属科室</td>
                        <td width="250px" class="tdColor">操作</td>
                    </tr>
                    <?php foreach($arr as $k => $v){?>
                    <tr class="parent">
                        <td><?php echo $v['id']?></td>
                        <td><?php echo $v['name']?>&nbsp;<a href="javascript:void (0)" class="jsa">[<?php if(!empty($v['son'])){echo '收缩';}else{echo '--';}?>]</a></td>
                        <td>顶级科室</td>
                        <td><a href="banneradd.html"><img class="operation" src="img/update.png"></a><span class="del"><img class="operation delban" src="img/delete.png"></span><input
                                    type="hidden" value="<?php echo $v['id'] ?>"/>
                        </td>
                    </tr>
                    <?php if(!empty($v['son'])){
                        foreach($v['son'] as $kk => $vv){?>
                            <tr class="son">
                                <td><?php echo $vv['id']?></td>
                                <td>--<?php echo $vv['name']?></td>
                                <td><?php echo $v['name']?></td>
                                <td><a href="banneradd.html"><img class="operation" src="img/update.png">
                                    </a> <span class="del2"><img class="operation delban" src="img/delete.png"></span><input
                                            type="hidden" value="<?php echo $vv['id'] ?>"/>
                                </td>
                            </tr>
                        <?php }
                    }?>
                    <?php }?>
                </table>
                <div class="paging">此处是分页</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


</body>

<script type="text/javascript">
    $(document).on('click','.jsa',function(){
        if($(this).html() == '[收缩]'){
            $(this).parent().parent().nextUntil('.parent').hide();
            $(this).html('[展开]');
        }else if($(this).html() == '[展开]'){
            $(this).parent().parent().nextUntil('.parent').show();
            $(this).html('[收缩]');
        }
    });

    //删除父级科室
    $(document).on('click','.del',function(){
        var id = $(this).next().val();
        var csrf = $('#csrf').val();
        if(window.confirm('此操作将删除子科室？')){
            $.ajax({
                type: "POST",
                url: "/admin/departmentdel",
                data: "id="+id+"&_token="+csrf,
                success: function(msg){
                    if(msg == 1){
                        location.reload();
                    }else{
                        alert('删除失败，请稍后再试');
                    }
                }
            });
        }
    });

    //删除子级科室
    $(document).on('click','.del2',function(){
        var id = $(this).next().val();
        var csrf = $('#csrf').val();
        $.ajax({
            type: "POST",
            url: "/admin/departmentdel",
            data: "id="+id+"&_token="+csrf,
            success: function(msg){
                if(msg == 1){
                    location.reload();
                }else{
                    alert('删除失败，请稍后再试');
                }
            }
        });
    });
</script>
</html>
<!--
本代码由热心网友上传，js代码网收集并编辑整理;
请尊重他人劳动成果;
转载请保留js代码链接 - www.jsdaima.com
-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>