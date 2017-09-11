@extends('layouts.hospital_layouts')

@section('title')
    医院后台
@stop

@section('content')
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
            <div class="add" style="float:right;display: inline-block;height: 20px;">
                <a class="addA" href="{{url('hos/addpage')}}" style="color:#fff">添加科室&nbsp;&nbsp;+</a>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>" id="csrf">
        <div class="banner">
       <form action="{{url('hos/doctorshow')}}" method="post">
                    {{csrf_field()}}
                        <div class="cfD">
                            <input name="name" class="userinput" type="text" placeholder="姓名查找" />-
                            <input name="offsid" class="userinput vpr" type="text" placeholder="科室查找" />
                            <input type="submit" class="userbtn" value="添加">
                        </div>
                    </form>
                
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="20px" class="tdColor tdC">序号</td>
                        <td width="70px" class="tdColor">姓名</td>
                        <td width="100px" class="tdColor">主科室</td>
                        <td width="120px" class="tdColor">所属科室</td>
                        <td width="45px" class="tdColor">从业年限</td>
                        <td width="150px" class="tdColor">毕业院校</td>
                        <td width="250px" class="tdColor">个人成就</td>
                        <td width="100px" class="tdColor">主治方向</td>
                        <td width="15px" class="tdColor">是否专家</td>
                        <td width="50px" class="tdColor">职称</td>
                        <td width="150px" class="tdColor">照片</td>
                        <td width="150px" class="tdColor">操作</td>
                    </tr>
                    <?php  $a = 1 ; foreach($arr as $k => $v){?>
                    <tr class="parent">
                        <td><?php echo $a++ ?></td>
                        <td><?php echo $v['name']?></td>
                        <td><?php echo $v['offs_pid_id']?></td>
                        <td><?php echo $v['offs_id']?></td>
                        <td><?php echo $v['age']?>年</td>
                        <td><?php echo $v['school']?></td>
                        <td><?php echo $v['per_info']?></td>
                        <td><?php echo $v['main']?></td>
                        <td><?php echo $v['is_expert']?></td>
                        <td><?php echo $v['title']?></td>
                        <td><?php echo $v['img']?></td>
                        <td><a href="javascript:;"><img class="operation" src="img/update.png"></a><span class="del"><img class="operation delban" src="img/delete.png"></span><input type="hidden" value="<?php echo $v['id'] ?>"/>
                        </td>
                    </tr>
                 
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
//     $(document).on('click','.jsa',function(){
//         if($(this).html() == '[-]'){

//             $(this).parent().parent().nextUntil('.parent').hide();
//             $(this).html('[+]');
//         }else if($(this).html() == '[+]'){
//             $(this).parent().parent().nextUntil('.parent').show();
//             $(this).html('[-]');
//         }
//     });

    //删除父级科室
    // $(document).on('click','.del',function(){
    //     // var dd = $('.del').next().val();
    //     // alert(dd)
    //     // return
    //     var id = $(this).next().val();
    //     var csrf = $('#csrf').val();
    //     if(window.confirm('此操作将删除该科室？')){
    //         $.ajax({
    //             type: "POST",
    //             url: "{{url('hos/officesdel')}}",
    //             data: "id="+id+"&_token="+csrf,
    //             success: function(msg){
    //             if(msg == 1){
    //                 location.reload();
    //             }else{
    //                 alert('删除失败，请稍后再试');
    //             }

             
    //             }
    //         });
    //     }
    // });

   
</script>
</html>
@stop