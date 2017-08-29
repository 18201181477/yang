
<!DOCTYPE html>
<html>
<base href="/frontend/">
<!-- Head -->
<head>

    <title>注册表单</title>

    <!-- Meta-Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <!-- Style --> <link rel="stylesheet" href="css/style2.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>

    <h1>注册表单</h1>

    <div class="container w3layouts agileits">

        <div class="register w3layouts agileits">
            <h2>注 册</h2>
            <form action="{{url('auth/register')}}" method="post">
            {{csrf_field()}}
                <input type="text" name="name" placeholder="用户名" required="">
                <input type="text" name="email" placeholder="邮箱" required="">
                <input placeholder="验证码" class="captcha" type="text" style="width:50%"><img onclick="this.src='{{ url('/captcha') }}?r='+Math.random();" src="{{url('captcha')}}">
                <input type="password" name="password" placeholder="密码" required="">
                <input type="password" name="password_confirmation" required="" placeholder="确认密码">
                <input type="text" name="Phone Number" placeholder="手机号码" required="">
                
                <div class="send-button w3layouts agileits">
                    <input type="submit" value="免费注册">
                </div>
            </form>
            <a style="color:white" href="login.html">已有账号?选择登录</a>
            <div class="clear"></div>
        </div>
            
            <div class="clear"></div>
        </div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
        

        <div class="clear"></div>

    </div>


</body>
<!-- //Body -->

</html>
<script type="text/javascript">
$(".captcha").blur(function(){
   var a = "{{Session::get('captcha')}}";
   alert(a)
})
    
</script>
