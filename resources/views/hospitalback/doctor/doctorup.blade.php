@extends('layouts.hospital_layouts')

@section('title')
    
@stop

@section('content')

 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
 <div class="add" style="float:right;display: inline-block;height: 20px;">
                <a class="addA" href="{{url('hos/doctor')}}" style="color:#fff">列表展示&nbsp;&nbsp;+</a>
            </div>
    <div id="pageAll">
        
        <div class="page ">

        <form action="{{url('hos/doctorupadd')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 
            <!-- 上传广告页面样式 -->
            <div class="banneradd bor">
                <div class="baTop">
                    <span>医生添加</span>

                </div>
                <input type="hidden" name="doc_id" value="<?php echo $data['doc_id'] ?>">
                <div class="baBody">
                    <div class="bbD">
                        姓名：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="input1" name="name" placeholder="姓名" value="<?php echo $data['docname'] ?>" />
                    </div>
                            <div class="bbD">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          医生照片 ：<input type="file"  name="image" /> 
                          <img src="/img/<?php echo $data['img'] ?>" alt="" style='width: 80px;height:90px;' >
                          <input type="hidden" name="image" value="<?php echo $data['img'] ?>" >
                        </div>
                    <div class="bbD" id="list">
                        科室：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         <select name="offs_pid_id" class="cli">
                         <option value="" >顶级科室</option>
                            @foreach($data['arr'] as $k => $v)
                             <option value="<?php echo $v->id ?>" <?php if($data['offs_pid_id']==$v->id) {
                                 echo 'selected';
                             } ?> >{{$v->name}}</option>
                             @endforeach 
                        </select> 
                        <span id="offs_id" ></span>    
                        <input type="hidden" id="pid" value="<?php echo $data['offs_pid_id'] ?>">  
                        <input type="hidden" id="offsid" value="<?php echo $data['offs_id'] ?>">  
                    </div>   
                  
                    <div class="bbD">
                        毕业院校：<input type="text" class="input1" name="school"  placeholder="毕业院校" value="<?php echo $data['school'] ?>"  />
                    </div>
                    <div class="bbD">
                        主治方向：<input type="text" class="input1" name="main" placeholder="主治方向" value="<?php echo $data['main'] ?>" />
                    </div>
                    <div class="bbD">
                        从医年限：   <select name="age" >
                           <?php for($i=1;$i<=50;$i++){?>
                            <option value="<?php echo $i ?>" <?php if ($i==$data['age']) { echo 'selected';} ?> ><?php echo $i ?>年</option>
                           <?php  } ?>
                        </select> 
                    </div>
                    <div class="bbD">
                        职称：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         <select name="title" >
                           <?php 
                           $arr = ['主任医师','教授','副主任医师','医师','实习医师'] ;
                           foreach ($arr as $k => $v) {?>

                            <option value="<?php echo $k ?>" <?php if ($k==$data['title']) { echo 'selected';} ?> ><?php echo $v ?></option>
                           <?php  } ?>
                        </select> 
                    </div>
                     <div >
                        是否专家：
                        <input type="radio" name="is_expert" value="1" <?php if ($data['is_expert']==1) { echo 'checked';} ?>  /> 是
                        <input type="radio" name="is_expert" value="0"  <?php if ($data['is_expert']==0) { echo 'checked';} ?>  />否
                    </div>
                    <div class="bbD">
                        个人成就：<textarea name="per_info" cols="42" rows="5" placeholder=" 个人成就简介 "><?php echo $data['per_info'] ?></textarea>
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
           url: "{{url('hos/docoffs')}}",
           data: "_token={{csrf_token()}}&pid="+pid,
           dataType:'json',
           success: function(msg){
            var str = "<select name='offs_id' class='cli'>"
                str += "<option value='' >子级科室</option>"
            $(msg).each(function(k,v){
                 str += "<option value='"+v.id+"'  >"+v.name+"</option>"
            })
            str += "</select>" 
            // ob.next().remove()
            $('#offs_id').html(str)         
            }

});
    });

$(document).ready(function(){
       var pid = $('#pid').val();
       var offsid = $('#offsid').val();
       var ob = $('.cli')

       $.ajax({
           type: "POST",
           url: "{{url('hos/docoffs')}}",
           data: "_token={{csrf_token()}}&pid="+pid,
           dataType:'json',
           success: function(msg){
           
            var str = "<select name='offs_id' class='cli'>"
                str += "<option value='' >子级科室</option>"
            $(msg).each(function(k,v){
                    var sel = ''
                    if(v.id==offsid) {
                        sel +=  'selected="selected"'
                       
                    }
                    
                  str += "<option value='"+v.id+"'"+sel+">"+v.name+"</option>"
 
                // alert(str) 
            })
            str += "</select>" 
            // ob.next().remove()
            $('#offs_id').html(str)          
            }

});
    });
</script>
            
@stop
