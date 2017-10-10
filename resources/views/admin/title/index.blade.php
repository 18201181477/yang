@extends('layouts.backend')
@section('css')
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/manhuaDate.1.0.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/manhuaDate.1.0.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<!-- <script type="text/javascript" src="js/page.js" ></script> -->
	<script type="text/javascript">
$(function (){
  $("input.mh_date").manhuaDate({
    Event : "click",//可选               
    Left : 0,//弹出时间停靠的左边位置
    Top : -16,//弹出时间停靠的顶部边位置
    fuhao : "-",//日期连接符默认为-
    isTime : false,//是否开启时间值默认为false
    beginY : 1949,//年份的开始默认为1949
    endY :2100//年份的结束默认为2049
  });
});
</script>
@stop
@section('content')
<body>
  <div id="pageAll">
    <div class="pageTop">
      <div class="page">
        <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
          href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
      </div>
    </div>

    <div class="page">
      <!-- vip页面样式 -->
      <div class="vip">
        <div class="conform">
          <form action="{{url('admin/title')}}" method="get">
            <div class="cfD">
              时间段：<input class="vinput mh_date" type="text" readonly="true" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
              <input class="vinput mh_date" type="text" readonly="true" />
            </div>
            <div class="cfD">
              <input value="{{$_GET['name'] or ''}}" class="addUser" name="name" type="text" placeholder="输入作者" />
              <button class="button">搜索</button>
            </div>
          </form>
        </div>
        <!-- vip 表格 显示 -->
        <div class="conShow">
          <table border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="66px" class="tdColor tdC">id</td>
              <td width="250px" class="tdColor">图片</td>
              <td width="188px" class="tdColor">作者</td>
              <td width="235px" class="tdColor">标题</td>
              <td width="220px" class="tdColor">排序</td>
              <td width="290px" class="tdColor">点赞数</td>
              <td width="282px" class="tdColor">添加时间</td>
              <td width="130px" class="tdColor">操作</td>
            </tr>
            
            @foreach($data as $v)
            <tr>
              <td>{{$v->id}}</td>
              <td><div class="onsImg onsImgv">
                  <img src="/img/{{$v->title_img}}">
                </div></td>
              <td>{{$v->title_author}}</td>
              <td>{{$v->title_name}}</td>
              <td>{{$v->sort}}</td>
              <td><span>{{$v->zan}}</span><input id="num" class="vipinput" type="text"><a data-id="{{$v->id}}" class="vsAdd" javascript:;>增加</a></td>
              <td>{{$v->created_at}}</td>
              <td><a href="connoisseuradd.html"><img class="operation"
                  src="img/update.png"></a> <img class="operation delban"
                src="img/delete.png"></td>
            </tr>
            @endforeach
          </table>
          <div class="paging"><?php echo $data->appends(['name'=>isset($_GET['name'])?$_GET['name']:''])->render()?></div>
        </div>
        <!-- vip 表格 显示 end-->
      </div>
      <!-- vip页面样式end -->
    </div>

  </div>


  <!-- 删除弹出框 -->
  <div class="banDel">
    <div class="delete">
      <div class="close">
        <a><img src="img/shanchu.png" /></a>
      </div>
      <p class="delP1">你确定要删除此条记录吗？</p>
      <p class="delP2">
        <a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
      </p>
    </div>
  </div>
  <!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
@stop
@section('js')
<script type="text/javascript">
  $(".vsAdd").click(function(){
    var obj = $(this);
    var num = $(this).prev().val();
    var id = $(this).data('id');
    if(isNaN(num)){
      alert('请输入数字');
      return false;
    }
    $.ajax({
      type:'get',
      url:"{{url('admin/ajax/title')}}",
      data:{'num':num,'id':id},
      success:function(msg){
        if(msg == 0){
          alert('修改失败');
          return false;
        }
        alert('修改成功');
        obj.prev().val('');
        obj.prev().prev().html(msg)
      }
    })
  })
</script>
@stop