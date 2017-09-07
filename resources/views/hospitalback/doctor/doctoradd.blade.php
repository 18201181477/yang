@extends('layouts.hospital_layouts')

@section('title')
    
@stop

@section('content')

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<style type="text/css">
 #map {width: 600px;height: 250px;overflow: hidden;margin:0;}
  #img{width: 360px;height: 200px;}
 </style>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
    <div id="pageAll">
        
        <div class="page ">
        <form action="{{url('hospitalback/doctoradd')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>"> 
            <!-- 上传广告页面样式 -->
            <div class="banneradd bor">
                <div class="baTop">
                    <span>医生添加</span>
                </div>
                <div class="baBody">
                    <div class="bbD">
                        姓名：<input type="text" class="input1" name="name" placeholder="姓名"  />
                    </div>
                    <div class="bbD">
                        医生照片：
                        <div class="bbDd">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <!-- <div class="bbDImg">+</div> -->
                            <input type="file"  name="image" /> 
                            
                            <!-- <a class="bbDDel" href="#">删除</a> -->
                        </div>
                    </div>
                    <div class="bbD">
                        毕业院校：<input type="text" class="input1" name="url"  placeholder="医院官网"  />
                    </div>
                    <div class="bbD">
                        主治方向：<input type="text" class="input1" name="main" placeholder="主治方向" />
                    </div>
                    <div class="bbD">
                        医院等级：<input type="text" class="input1" name="register"  placeholder="医院等级" value="<?php echo  isset($res['register'])?$res['register']:null;?>" />
                    </div>
                    <div class="bbD">
                        营业执照：<input type="text" class="input1" name="documents" placeholder="营业执照" value="<?php echo  isset($res['documents'])?$res['documents']:null;;?>" />
                    </div>
                    <div class="bbD">
                        医院简介：<textarea name="profile" cols="42" rows="5" placeholder=" 医院简介 "><?php echo  isset($res['profile'])?$res['profile']:null;;?></textarea>
                    </div>
                    <div class="bbD">
                        详细地址：<input type="text" class="input1" name="address" placeholder="详细地址" value="<?php echo  isset($res['address'])?$res['address']:null;;?>"/>
                    </div>
                    <div class="bbD">
                    <input type="text"  placeholder="医院地理位置" class="input1"  disabled="">
                    </div>

                    <div id="map"></div>
                    <div class="bbD">
                        经度：<input type="text" class="input1" id="x" name="x" value="<?php echo  isset($res['x'])?$res['x']:null;;?>" /><!-- 经度 -->
                    </div>
                    <div class="bbD">
                        纬度：<input type="text" class="input1" id="y" name="y" value="<?php echo isset($res['y'])?$res['y']:null;;?>"/><!-- 纬度 -->
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
            
@stop
