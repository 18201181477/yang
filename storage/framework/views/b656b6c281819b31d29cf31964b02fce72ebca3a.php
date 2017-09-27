
<body>

        <div class="wrapper-page">
            <div class="panel panel-color <?php echo e(\Session::get('status')?'panel-inverse':'panel-danger'); ?>">

                <div class="panel-heading">
                   <h3 class="text-center m-t-10"><?php echo \Session::get('message')?></h3>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        <div class="alert <?php echo e(\Session::get('status')?'alert-info':'alert-danger'); ?> alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            浏览器页面将在<b id="loginTime"><?php echo \Session::get('jumpTime'); ?></b>秒后跳转......
                        </div>
                        <div class="form-group m-b-0">
                            <div class="input-group">
                                <?php /*<input type="password" class="form-control" placeholder="Enter Email">*/ ?>
                                <span class="input-group-btn"> <button type="submit" class="btn <?php echo e(\Session::get('status')?'btn-success':'btn-danger'); ?>">点击立即跳转</button> </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="/frontend/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(function(){
                //循环倒计时，并跳转
                var url = "<?php echo e(\Session::get('url')); ?>";
                var loginTime = parseInt($('#loginTime').text());
                console.log(loginTime);
                var time = setInterval(function(){
                    loginTime = loginTime-1;
                    $('#loginTime').text(loginTime);
                    if(loginTime==0){
                        clearInterval(time);
                        window.location.href=url;
                    }
                },1000);
            })
//点击跳转
            $('.btn-success').click(function () {
                var url = "<?php echo e(\Session::get('url')); ?>";
                window.location.href=url;
            })
        </script>

    </body>