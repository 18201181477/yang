<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="/backend/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>科室展示</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="javascript:;">科室展示</a>
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>" id="csrf">
        <div class="banner">
            <div class="add">
                <a class="addA" href="/index/addpage">添加科室&nbsp;&nbsp;+</a>
            </div>
                <h1><?php if(isset($status)){echo '该科室已存在';}?></h1>
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="132px" class="tdColor tdC">序号</td>
                        <td width="616px" class="tdColor">科室名称</td>
                        <td width="300px" class="tdColor">所属科室</td>
                        <td width="200px" class="tdColor">科室医生</td>
                        <td width="250px" class="tdColor">操作</td>
                    </tr>
                    <?php  $a = 1 ; foreach($arr as $k => $v){?>
                    <tr class="parent">
                        <td><?php echo $a++ ?></td>
                        <td><?php echo $v['name']?>&nbsp;<a href="javascript:void (0)" class="jsa">[<?php if(!empty($v['son'])){echo '-';}else{echo '--';}?>]</a></td>
                        <td>顶级科室</td>
                        <td></td>
                        <td><a href="javascript:;"><img class="operation" src="img/update.png"></a><span class="del"><img class="operation delban" src="img/delete.png"></span><input
                                    type="hidden" value="<?php echo $v['id'] ?>"/>
                        </td>
                    </tr>
                    <?php if(!empty($v['son'])){
                        $b = 1;
                        foreach($v['son'] as $kk => $vv){?>
                            <tr class="son">
                                <td><?php echo '--'.$b++ ?></td>
                                <td>--<?php echo $vv['name']?></td>
                                <td><?php echo $v['name']?></td>
                                <td>
                                <a href="index/doctor?hosid=<?php echo $v['hosid'] ?>&offsid=<?php echo $vv['id'] ?>">查看医生</a>
                                </td>
                                <td><a href="javascript:;"><img class="operation" src="img/update.png">
                                    </a> <span class="del2"><img class="operation delban" src="img/delete.png"></span><input
                                            type="hidden" value="<?php echo $vv['id'] ?>"/>
                                </td>
                            </tr>
                        <?php }
                    }?>
                    <?php }?>
                </table>
                
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


</body>

<script type="text/javascript">
    $(document).on('click','.jsa',function(){
        if($(this).html() == '[-]'){

            $(this).parent().parent().nextUntil('.parent').hide();
            $(this).html('[+]');
        }else if($(this).html() == '[+]'){
            $(this).parent().parent().nextUntil('.parent').show();
            $(this).html('[-]');
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
