<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/backend/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页引用-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
  <!-- 新 Bootstrap 核心 CSS 文件 -->  
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->  
    <script src="js/jquery2.1.4.min.js"></script>  
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->  
    <script src="bootstrap/js/bootstrap.min.js"></script>  
@section('css')
@show
</head>
	@yield('content')
</html>
@section('js')
@show