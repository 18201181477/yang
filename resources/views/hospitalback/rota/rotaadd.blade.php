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
    <title>科室添加</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div class="add" style="float:right;display: inline-block;height: 20px;">
                <a class="addA" href="{{url('hos/offices')}}" style="color:#fff">返回列表&nbsp;&nbsp;+</a>
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
                <span>添加值班</span>
            </div>
             
            <form action="{{url('hos/rotaadd')}}" method="post">
                {{csrf_field()}}
                
                <div class="baBody">
                    <div>
                         <input type="hidden" name="docid" value="<?php echo $ary['doc_id'] ?>" />

                        值班时间：<input type="text" name="rotatime" />
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


</html>
@stop
<!-- // return view('pc.index')->with([
             //    'message'=>'添加成功',
             //    'url'=>'index/addpage',
             //    'jumpTime'=>2,
             //  ]); -->