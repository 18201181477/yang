@extends('layouts.frontend_layouts')

@section('title')
	医学文章
@stop



@section('content')
<!doctype html>
<?php use App\Models\Title;?>
<html>
<head>
<meta charset="gb2312">
<title>个人博客模板（寻梦）</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
<link href="css/base.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>



<article>
  <h2 class="title_tj">
    <p>医学<span>推荐</span></p>
  </h2>
 
  <div class="bloglist left">
   @foreach($data as $val)
    <h3>{{$val->title_name}}</h3>
    <figure><img src="/img/{{$val->title_img}}"></figure>
    <ul>
      <p>{!! Title::str($val->title_conntent) !!}</p>

       <a href="/"><span style="cursor:pointer" class="label label-primary">阅读全文</span></a>
    </ul>

    <p class="dateview"><span>{{ $val->created_at }} </span><span>作者：{{$val->title_author}}</span></p>
    @endforeach
    {{$data->render()}}
  </div>
  
  <aside class="right">
    <div style="width:360px;" class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
    <div class="news">
    <h3>
      <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
      <li><a href="/" title="建站流程篇――教你如何快速学会做网站" target="_blank">建站流程篇――教你如何快速学会做网站</a></li>
      <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
      <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
    </ul>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
    </ul>
    <h3 class="links">
      <p>友情<span>链接</span></p>
    </h3>
    <ul class="website">
      <li><a href="/">个人博客</a></li>
      <li><a href="/">谢泽文个人博客</a></li>
      <li><a href="/">3DST技术网</a></li>
      <li><a href="/">思衡网络</a></li>
    </ul> 
    </div>  
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
  
</article>
<footer>

</footer>
<script src="js/silder.js"></script>
</body>
</html>

@stop
@section('js')
<script type="text/javascript">
  $(".label-primary").click(function(){
    location.href=''
  })
</script>
@stop