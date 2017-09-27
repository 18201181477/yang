
<!DOCTYPE html>
<html>

<!-- Head -->
<head>
<base href="/frontend/">
    <title>绑定用户</title>

    <!-- Meta-Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <!-- //Meta-Tags -->

    <!-- Style --> <link rel="stylesheet" href="css/style2.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>
    <h1>账号绑定</h1>

    <div class="container w3layouts agileits">

        <div class="register w3layouts agileits">
            <h2>手机绑定</h2>


            <form action="@if ($_GET['status'] == 0){{url('login/yan')}}@elseif ($_GET['status'] == 1){{url('login/weibo_login')}}@endif" method="post">
            {{csrf_field()}}          
                <input class="hidden" type="hidden" name="status" value="<?php echo $_GET['status']?>">
                
                <input value="<?php echo $_GET['nickname']?>" type="text" name="name" placeholder="用户名">
                
                <input type="text" name="email" placeholder="邮箱">
                
                <input type="text" name="captcha" style="width:50%" placeholder="输入验证码"><img class="img"  src="{{url('/captcha')}}">
                
                <input type="password" name="password" placeholder="密码">
                
                <input type="password" name="password_confirmation" placeholder='确认密码'>
                
                <input type="text" name="phone" placeholder="手机号码">
                
                
            <div class="send-button w3layouts agileits">
                    <input type="submit" value="确认">
            </div>
            <a style="color:white" href="{{url('index/login')}}">已有账号?选择登录</a>
            </form>
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
    $(".a1").css('background','red');
    $(".img").click(function(){
        this.src="{{url('captcha')}}"+'?r='+Math.random();
    })
    $(".a1").click(function(){
        $(this).css('background','red');
        $('.a2').css('background','');
        $(".hidden").val('0');
    })
    $(".a2").click(function(){
        $(this).css('background','red');
        $(".a1").css('background','');
        $(".hidden").val('1');
    })
</script>