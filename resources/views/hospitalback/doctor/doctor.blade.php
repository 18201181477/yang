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
    <title>医生展示</title>
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
                <a class="addA" href="{{url('hos/doctorpage')}}" style="color:#fff">人员添加&nbsp;&nbsp;+</a>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>" id="csrf">
        <div class="banner">
       <form action="{{url('hos/doctor')}}" method="get">
                    {{csrf_field()}}
                        <div class="cfD">
                            <input name="docname" class="userinput" type="text" placeholder="姓名查找" value="<?php echo $data['docname'] ?>" />-
                            <input name="name" class="userinput vpr" type="text" placeholder="科室查找" value="<?php echo $data['name'] ?>" />
                            <input type="submit" class="userbtn" value="搜索">
                        </div>
                    </form>
                
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="30px" class="tdColor tdC">序号</td>
                        <td width="90px" class="tdColor">姓名</td>
                        <td width="120px" class="tdColor">所属科室</td>
                        <td width="75px" class="tdColor">从业年限</td>
                        <td width="150px" class="tdColor">毕业院校</td>
                        <td width="150px" class="tdColor">主治方向</td>
                        <td width="60px" class="tdColor">是否专家</td>
                        <td width="100px" class="tdColor">职称</td>
                        <td width="100px" class="tdColor">值班安排</td>
                        <td width="150px" class="tdColor">操作</td>
                    </tr>
                    <?php  $a = 1 ; foreach($data['arr'] as $k => $v){?>
                    <tr class="parent">
                        <td><?php echo $a++ ?></td>
                        <td><?php echo $v['docname']?></td>
                        <td><?php echo $v['name']?></td>
                        <td><?php echo $v['age']?>年</td>
                        <td><?php echo $v['school']?></td>
                        <td><?php echo $v['main']?></td>
                        <td><?php echo $v['is_expert']?'是':'否';?></td>
                        <td>
                        <?php 
                       $ary = ['主任医师','教授','副主任医师','医师','实习医师'] ;
                       foreach ($ary as $kk => $vv) {
                           if ($kk==$v['title']) {
                              echo $vv;
                           }
                       }
                      ?>
                        </td>
                        <td><a href="{{url('hos/rota')}}?docid=<?php echo $v['doc_id'] ?>">查看值班</a></td>
                        <td><a href="{{url('hos/doctorup')}}?id=<?php echo $v['doc_id'] ?>"><img class="operation" src="img/update.png"></a><span class="del"><img class="operation delban" src="img/delete.png"></span><input type="hidden" value="<?php echo $v['doc_id'] ?>"/>
                        </td>
                    </tr>
                 
                    <?php }?>
                </table>
                <style>
                        .pagination{
                            margin-left: 400px;
                        }
                </style>
                <?php  echo $data['arr']->appends(['docname'=>isset($_GET['docname'])?$_GET['docname']:null,'name'=>isset($_GET['name'])?$_GET['name']:null])->links() ?>

                
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


</body>

<script type="text/javascript">

    //删除父级科室
    $(document).on('click','.del',function(){
        // var dd = $('.del').next().val();
        // alert(dd)
        // return
        var id = $(this).next().val();
        var csrf = $('#csrf').val();
        if(window.confirm('此操作将删除该医生信息？')){
            $.ajax({
                type: "POST",
                url: "{{url('hos/doctordel')}}",
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

   
</script>
</html>
@stop