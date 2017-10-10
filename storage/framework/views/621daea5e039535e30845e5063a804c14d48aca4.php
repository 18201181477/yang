<?php $__env->startSection('title'); ?>
	医学文章
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<!doctype html>
<?php use App\Models\Title;?>
<html>
<head>
<meta charset="gb2312">
<title>杨青个人博客网站―一个站在web前段设计之路的女技术员个人博客网站</title>
<meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
<meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link href="css/base.css" rel="stylesheet">
<link href="css/about.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<article>
 <h2 class="title_tj">
    <p>医学<span>推荐</span></p>
  </h2>
<div class="about left">
  <h2><?php echo e($data['title_name']); ?></h2>
    <ul> 
     <p>
     	<?=$data['title_conntent']?>
     </p>

    </ul>
    
 
</div>
<aside class="right">  
    <div class="about_c">
    <p>网名：<span>soul mates</span> | 水墨林溪</p>
    <p>姓名：萧青 </p>
    <p>生日：1987-10-30</p>
    <p>籍贯：河南省濮阳市</p>
    <p>现居：北京市海淀区</p>
    <p>职业：网站设计、网站制作</p>
    <p>喜欢的书：《红与黑》《时生》</p>
    <p>喜欢的音乐：《burning》《just one last dance》《相思引》</p>
<a target="_blank" href="http://wp.qq.com/wpa/qunwpa?idkey=d4d4a26952d46d564ee5bf7782743a70d5a8c405f4f9a33a60b0eec380743c64">
<img src="http://pub.idqqimg.com/wpa/images/group.png" alt="杨青个人博客网站" title="杨青个人博客网站"></a>
<a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=HHh9cn95b3F1cHVye1xtbTJ-c3E" ><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_22.png" alt="杨青个人博客网站"></a>
</div>     
</aside>
</article>
<footer>
 <p>每天一点养生小常识，您能拥有健康的生活</p>
</footer>
<script src="js/silder.js"></script>
</body>
</html>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
  $(".label-primary").click(function(){
    location.href=''
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>