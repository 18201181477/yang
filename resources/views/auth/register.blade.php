
<!DOCTYPE html>
<html>

<!-- Head -->
<head>
<base href="/frontend/">
    <title>注册表单</title>

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
    <h1>注册表单</h1>

    <div class="container w3layouts agileits">

        <div class="register w3layouts agileits">
            <h2>注 册</h2>

            <form action="{{url('index/register')}}" method="post">
            {{csrf_field()}}
            <div class="a">
                <input  class="a1" style="border:0px solid white;width:100px;height:30px;" type="button" value="个人"><input class="a2" style="border:0px solid white;height:30px;width:100px;" type="button" value="医院">
            </div>
                <input value="0" class="hidden" type="hidden" name="User[status]" value="0">
                <div style="color:red">{{$errors->first('User.status')}}</div>
                <input value="{{ old('User')['name']}}" type="text" name="User[name]" placeholder="用户名" required="">
                <div style="color:red">{{$errors->first('User.name')}}</div>
                <input value="{{ old('User')['email']}}" type="text" name="User[email]" placeholder="邮箱" required="">
                <div style="color:red">{{$errors->first('User.email')}}</div>
                <input type="text" name="captcha" style="width:50%" placeholder="输入验证码"><img class="img"  src="{{url('/captcha')}}">
                <div style="color:red;">@if(\Session::has('message')){{\Session::get('message')}}@endif</div>
                <input value="{{ old('User')['password']}}" type="password" name="User[password]" placeholder="密码" required="">
                <div style="color:red">{{$errors->first('User.password')}}</div>
                <input value="{{ old('User')['password_confirmation']}}" type="password" name="User[password_confirmation]" placeholder='确认密码' required="">
                <div style="color:red">@if(\Session::has('sure')){{\Session::get('sure')}}@endif{{$errors->first('User.password_confirmation')}}</div>
                <input value="{{ old('User')['phone']}}" type="text" name="User[phone]" placeholder="手机号码" required="">
                <div style="color:red">{{$errors->first('User.phone')}}</div>
                <div style="color:red">@if(\Session::has('error')){{\Session::get('error')}}@endif</div>
            <div class="send-button w3layouts agileits">
                    <input type="submit" value="免费注册">
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