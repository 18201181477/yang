<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="/backend/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>添加科室</span>
            </div>
            <form action="/admin/departmentadd" method="post">
                {{csrf_field()}}
                <div class="baBody">
                    <div>
                        选择科室所属分类：<select name="office_pid" id="">
                            <option value="0">顶级科室</option>
                            <?php foreach($data as $k => $v){ ?>
                                <option value="<?php echo $v->id ?>"><?php echo $v->name ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="bbD">
                        科室名称：<input type="text" class="input1" name="office_name" />
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" href="#">提交</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>

</html>