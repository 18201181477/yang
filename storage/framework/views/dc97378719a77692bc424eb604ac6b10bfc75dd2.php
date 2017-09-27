<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<base href="/frontend/">
<title><?=$hospital['name']?></title> 
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="http://www.pkuph.cn/templets/rmyy/image/logo3.png" media="screen"> 
<link href="doctor/main.css" rel="stylesheet" type="text/css">
<link href="doctor/index.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="doctor/jquery-1.js"></script>
<script language="javascript" type="text/javascript" src="doctor/js.js"></script>
<script language="javascript" type="text/javascript" src="doctor/fun.js"></script>
<script language="javascript" type="text/javascript" src="doctor/form.js"></script>
</head>
<body>
<script type="text/javascript">
$(function(){
		$('.sideBar ul').eq(1).click(function(){
		$('.ewmLayer').show();
		})
	$('.ewmLayer').find('.close').click(function(){
		$('.ewmLayer').hide();
		})

});
</script>
<div class="ewmLayer">
      <h1>微官网二维码<a class="close" href="javascript:;"></a></h1>
      <div><img alt="" src="doctor/img319.jpg"></div>
</div>
<div class="selectLayer"><ul></ul></div>
<div class="headDiv">
<div class="wal">
      <div class="list">
        <ul>
          <li><a href="">价格调查</a></li>
          <li><a href="">医师资格查询</a></li>
          <li><a href="">护士资格查询</a></li>
        </ul>
      </div>
      <a href="javascript:;" class="logo"><img src="doctor/logo.png"></a>
</div>
</div>
</div>
<div class="wal">
<!--wal-->
<div class="fl w676">
      <h1 class="pageTitle"><?=$doctorArr['docname']?></h1>
      <div class="ExpertsPart1">
            <div class="imgDiv"><img src="/img/<?=$doctorArr['img']?>" width="153" height="210"></div>
			       <a href="http://www.pkuph.cn/html/xunzhaokeshi/wuguanke/erke/yishengtuandui/" class="btn">预约</a>
            <div class="content">
                  <b>科室：</b>
                  <?php
                    $id = $doctorArr['offs_id'];
                    $office = \DB::select("SELECT name FROM offices WHERE id=$id");
                    foreach ($office as $val) {
                      echo $val->name;
                    }
                  ?>
                  <br>
                  <b>职称：</b>
                  <?php
                    if($doctorArr['title']==0){
                      echo "主任";
                    }elseif($doctorArr['title']==1){
                      echo "教授";
                    }elseif($doctorArr['title']==2){
                      echo "副主任";
                    }elseif($doctorArr['title']==3){
                      echo "医师";
                    }elseif($doctorArr['title']==4){
                      echo "实习医师";
                    }
                  ?>
                  <br>
                  <b>主治方向：</b><?=$doctorArr['main']?><br>
          			  <b>就诊经验：</b><?=$doctorArr['age'].'年'?><br>
                  <b>毕业院校：</b><?=$doctorArr['school']?><br>
          			  <b>常规出诊时间：</b>周一上午（500元），周二上午（500元），周四上午（500元），长期停诊：周一上午（500元）
            </div>
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
  				    <tbody>
              <tr>
               <th width="96">七天出诊信息</th>
               <th width="80">星期一</th>
               <th width="80">星期二</th>
               <th width="80">星期三</th>
               <th width="80">星期四</th>
               <th width="80">星期五</th>
               <th width="80">星期六</th>
               <th width="80">星期日</th>
              </tr>
              <tr>
                <td class="td_01">上午 am</td>
                <td class="td_02">500.00元 </td>
                <td class="td_02">500.00元 </td>
                <td></td>
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td>
              </tr>
              <tr>
                <td class="td_01">下午 pm</td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td>
              </tr>
              </tbody>
            </table>
      </div>
      <!---->
      <div class="pageTitle2"><h1>个人简历</h1></div>
      <div class="ExpertsPart2">
        我叫<?=$doctorArr['docname']?>,已有<?=$doctorArr['age']?>年工作经验，目前在<?=$hospital['name']?>工作，
        担任 <?php
          if($doctorArr['title']==0){
            echo "主任";
          }elseif($doctorArr['title']==1){
            echo "教授";
          }elseif($doctorArr['title']==2){
            echo "副主任";
          }elseif($doctorArr['title']==3){
            echo "医师";
          }elseif($doctorArr['title']==4){
            echo "实习医师";
          }
        ?> 职位。工作地址<?=$hospital['address']?>。我荣获过<?=$doctorArr['per_info']?>等奖项。
      </div>
      <!---->
      <div class="pageTitle2"><h1>学历任职</h1></div>
      <div class="ExpertsPart2">
        毕业于 <?=$doctorArr['school']?> ，就业于 <?=$hospital['name']?> 。任职 
        <?php
          if($doctorArr['title']==0){
            echo "主任";
          }elseif($doctorArr['title']==1){
            echo "教授";
          }elseif($doctorArr['title']==2){
            echo "副主任";
          }elseif($doctorArr['title']==3){
            echo "医师";
          }elseif($doctorArr['title']==4){
            echo "实习医师";
          }
        ?> 。
      </div>
      
      <div class="pageTitle2"><h1>学术成就</h1></div>
      <div class="ExpertsPart2">
			近年来在20G手法小切口玻璃体手术、PDT治疗中浆、新生血管性青光眼治疗等领域取得重要进展，
      并在国际著名眼底病学杂志RETINA上发表创新性论文。
      承担多项国家级、省部级科研项目，
      在首都临床特色项目资助下主持“PDT治疗中心性浆液性脉络膜视网膜病变”的临床多中心研究。
      参研项目先后获北京市科技进步壹、贰等奖，教育部科技进步贰等奖等；
      发表中、英文论文30余篇。
      合作主编《视网膜色素上皮基础与临床》，
      RETINA》第二分卷主译、《视网膜图谱》主译、《眼外伤与眼科急症处理》主译，
      《眼底病学》第二版副主编，《玻璃体视网膜手术学》副主编。
      协助黎晓新教授主持眼科学国家级精品课程建设。
      </div>
      <div class="pageTitle2"><h1>所获奖励</h1></div>
      <div class="ExpertsPart2">
		    <?=$doctorArr['per_info']?>
      </div>
</div>
<div class="fr w293">
      <!--<a href="/html/cn/zt/tnb1/" target="_blank"><h1 class="sideTitle" style="background-color:#68b4b5;">糖尿病知识问答</h1></a>
      <div class="sideList"></div>-->
	  <h1 class="sideTitle">相关医生</h1>
      <div class="sideList">
           <ul>
                <li><a href="http://www.pkuph.cn/html/xunzhaokeshi/wuguanke/erke/yishengtuandui/7451.html">李丽馨</a> <span><a href="http://www.pkuph.cn/html/xunzhaokeshi/wuguanke/erke/">眼科</a></span> 主任医师</li>
                <li><a href="http://www.pkuph.cn/html/xunzhaokeshi/wuguanke/erke/yishengtuandui/7377.html">鲍永珍</a> <span><a href="http://www.pkuph.cn/html/xunzhaokeshi/wuguanke/erke/">眼科</a></span> 教授,主任医师</li>
           </ul>
      </div>
      <h1 class="sideTitle sideTitle_3">相关资讯</h1>
      <div class="sideList">
           <ul>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/11399.html">北京大学人民医院黎晓新教授再获眼科国...</a></li>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/10909.html">北京大学人民医院名师讲坛2017第二期开讲...</a></li>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/10394.html">年龄相关性白内障的诊治进展  ——北京大...</a></li>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/10302.html">中国首位眼科医生个人捐资成立基金会专...</a></li>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/10301.html">北京大学人民医院黎晓新获誉“中华眼科...</a></li>
            <li><a href="http://www.pkuph.cn/cn/xinwendongtai/8820.html">北京大学人民医院黎晓新在2015年美国眼科...</a></li>
           </ul>
      </div>
      <h1 class="sideTitle sideTitle_1">健康新闻</h1>
      <div class="sideList">
           <ul>
        		  <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/9525.html">眼病几乎成为国民病</a></li>
              <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/9392.html">孩子近视了，别慌！人民医院眼科专家告...</a></li>
              <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/9379.html">孩子近视了，别慌！人民医院眼科专家告...</a></li>
              <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/9333.html">半岁娃，散光两百多度——咋办？</a></li>
              <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/8647.html">你的眼睛是否过度疲劳？</a></li>
              <li><a href="http://www.pkuph.cn/cn/jiankangxinwen/8590.html">看东西变形警惕黄斑变性</a></li>
           </ul>
      </div>
      <h1 class="sideTitle sideTitle_2">健康视频</h1>
      <div class="sideList sideList2">
           <ul>
              <li><a href="http://www.pkuph.cn/cn/jiankangshipin/10831.html">寻光——赵明威</a></li>
           </ul>
      </div>
      <h1 class="sideTitle sideTitle_3 sideTitleMy">媒体视角</h1>
      <div class="sideList">
           <ul>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/8281.html">多家媒体报道：第五届“首都十大健康卫...</a></li>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/7725.html">健康报：健康快车光明行再出发</a></li>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/7294.html">新京报：权威科室系列——北京大学人民...</a></li>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/5543.html">北京大学校报：人民医院健康快车开进桂...</a></li>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/3176.html">中新网、中国网、中国经济网、新浪等：...</a></li>
            <li><a href="http://www.pkuph.cn/cn/meitishijue/3175.html">人民网、科技日报等报道我院专家吉布提...</a></li>
           </ul>
      </div> 
</div>
<span class="clear_f"></span>
<!--walEnd-->
</div>
<script src="doctor/stat.js"></script>
<div class="footDiv">
<div class="wal">
      <div class="fl">
      <ul>
        <li>
		<h2><a href="http://www.pkuph.cn/html/about/">医院概况</a></h2>
             <dl>
               <dd><a href="http://www.pkuph.cn/cn/yiyuanjieshao/">医院介绍</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/lingdaotuandui/">领导团队</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/yiyuanlishi/">医院历史</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/yiyuanyuanxun/">医院院训</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/yiyuanrongyu/">医院荣誉</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/zuzhijiagou/">组织架构</a></dd>
               <dd><a href="http://www.pkuph.cn/html/about/guanghuizuji/">光辉足迹</a></dd>
             </dl>
        </li>
        <li>
		<h2><a href="http://www.pkuph.cn/html/yihutuandui/">医护团队</a></h2>
             <dl>
               <dd><a href="http://www.pkuph.cn/html/xunzhaokeshi/">寻找科室</a></dd>
               <dd><a href="http://www.pkuph.cn/html/yihutuandui/xunzhaoyisheng/">寻找医生</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/tesezhenliaoxiangmu/">特色医疗</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/hulituandui/">护理团队</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/jishushebei/">技术设备</a></dd>
               <dd><a href="http://www.pkuph.cn/html/yihutuandui/zhuanjiarenzhi/">专家任职</a></dd>
             </dl>
        </li>
        <li>
		<h2><a href="http://www.pkuph.cn/html/huanzhe/">患者服务</a></h2>
            <dl>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/">就诊指南</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/yuyueguahao/">预约挂号</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/zhuyuanxuzhi/">住院须知</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/jiaotongzhinan/">交通指南</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/jiuzhenxuzhi/">就诊须知</a></dd>
              <dd><a href="http://www.pkuph.cn/html/jiuzhenzhinan/czxx/">出诊信息查询</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/tingzhenxinxichaxun/">停诊信息查询</a></dd>
              <dd><a href="http://www.pkuph.cn/cn/jiuzhenzhinan/chuangweixinxi/">床位信息</a></dd>
             </dl>
        </li>
        <li>
             <h2><a href=""></a></h2>
             <dl>
			 <dd><a href="http://www.pkuph.cn/cn/tesefuwu/">特色服务</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/tesefuwu/yibaozhishi/">医保知识</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/tesefuwu/zhiyuanfuwu/">志愿服务</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/tesefuwu/quyuyiliao/">区域医疗</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/tesefuwu/zaixiandiaocha/">在线调查</a></dd>
             </dl>
        </li>
        <li>
		<h2><a href="http://www.pkuph.cn/html/health/">健康知识</a></h2>
             <dl>
               <dd><a href="http://www.pkuph.cn/cn/jiankangshipin/">健康视频</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/jiankangxingdong/">健康行动</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/jiangzuoyugao/">健康讲座</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/jiankangxinwen/">健康新闻</a></dd>
             </dl>
        </li>
        <li>
		<h2><a href="http://www.pkuph.cn/html/news/">新闻中心</a></h2>
             <dl>
               <dd><a href="http://www.pkuph.cn/cn/xinwendongtai/">新闻动态</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/xinwenjujiao/">新闻聚焦</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/meitishijue/">媒体视角</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/shipinxinwen/">视频新闻</a></dd>
               <dd><a href="http://www.pkuph.cn/cn/zhuantilanmu/">专题报道</a></dd>
             </dl>
        </li>
        <li>
             <h2><a href="">科研教学</a></h2>
             <dl>
               <dd><a href="">医学教育</a></dd>
               <dd><a href="">临床研究</a></dd>
             </dl>
        </li>
       </ul>
		  <ul class="newblock">
        <li> <h2><a href="http://www.pkuph.cn/html/yzxx.html">院长信箱</a></h2></li>
        <li> <h2><a href="http://www.pkuph.cn/html/ysaq.html">隐私安全</a></h2></li>
        <li> <h2><a href="http://www.pkuph.cn/html/bqsm.html">版权声明</a></h2></li>
        <li> <h2><a href="http://www.pkuph.cn/html/help.html">帮助信息</a></h2></li>
      </ul>
      </div>
      <div class="fr">
    	  <p style="font-size:12px;">ICP备案信息：京ICP备10005257</p>
    	  <p style="font-size:12px;">京ICP备05082109</p>
    	  <p style="font-size:12px;">医院地址（西直门院区）：北京市西直门南大街11号</p>
    	  <p style="font-size:12px;">邮编：100044</p>
    	  <p style="font-size:12px;">医院总机：88326666</p>
      <div class="msg" style="font-size:12px;">COPYRIGHT © 2004-2010　<a style="font-size:12px;" href="http://www.fractal-technology.com/">网站建设</a>：北京分形科技</div>
      </div>
</div>
</div>

<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " 
https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + 
"hm.baidu.com/h.js%3F76b845b81993cfc6a233500f759c0408' 
type='text/javascript'%3E%3C/script%3E"));
</script><script src="doctor/h.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	var doctor_name = $('#doctor_name').val();
 	$.post('http://www.pkuph.cn/api.php', {doctor_name:doctor_name,action:'getdoc'}, function(ret){ 
			$('#chzhen').append(ret.doctor);
  		},'json' );
})
</script>
</body></html>