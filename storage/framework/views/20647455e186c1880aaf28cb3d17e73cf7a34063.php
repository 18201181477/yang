<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text ml; charset=gbk" />
        <title>提示报错</title>
        
        <style type="text/css">
            body{ margin:0; padding:0; background:#efefef; font-family:Georgia, Times, Verdana, Geneva, Arial, Helvetica, sans-serif; }
            div#mother{ margin:0 auto; width:943px; height:572px; position:relative; }
            div#errorBox{ background: url(/frontend/images/404_bg.png) no-repeat top left; width:943px; height:572px; margin:auto; }
            div#errorText{ color:#39351e; padding:146px 0 0 446px }
            div#errorText p{ width:303px; font-size:14px; line-height:26px; }
            div.link{ /*background:#f90;*/ height:50px; width:145px; float:left; }
            div#home{ margin:20px 0 0 444px;}
            div#contact{ margin:20px 0 0 25px;}
            h1{ font-size:40px; margin-bottom:35px; }
        </style>
        

        
    </head>
    <body>
        <div id="mother">
            <div id="errorBox">
                <div id="errorText">
                    <h1><?php echo e($message); ?></h1>
                    <p>
                        将在<span class="loginTime" style="color: red"><?php echo e($jumpTime); ?></span>秒后跳转至
                    </p>  
                    <p>
                        不想敲代码，想睡觉！
                    </p>

                    <p>
                        火星不太安全，我可以免费送你回地球
                    </p>
                </div>
                <a href="<?php echo e($url); ?>" title="首页">
                    <div class="link" id="home"></div>
                </a>
            </div>
        </div>
    </body>
</html>
<div id="applyFor" style="text-align: center; width: 500px; margin: 100px auto;"><h2></h2><a href="" style="color: red"></a></div>
                    
               
       

<script src="/frontend/js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript">
        $(function(){
            var url = "<?php echo e($url); ?>"
            var loginTime = parseInt($('.loginTime').text());
            var time = setInterval(function(){
                loginTime = loginTime-1;
                $('.loginTime').text-(loginTime);
                if(loginTime==0){
                    clearInterval(time);
                    window.location.href=url;
                }
            },1000);
        })
    </script>