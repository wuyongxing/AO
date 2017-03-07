<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>黑龙江节点动画</title>

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/AO/Public/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="/AO/Public/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/AO/Public/jquery/jquery-1.10.1.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/AO/Public/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#mySelect").change(function(){ 
          var x = $(this).children('option:selected').attr("key");
          $(".tablelist").css("display","none");
          if(x != -1) 
          {
            $("#"+x).css("display","block");
          }  
        });
      });
    </script>
    <style type="text/css">
        .nav li a{
            color: #fff;
        }
    </style>
</head>
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 900px">
    <div class="container">
        <div class="row" style="margin-top: 2%;">
            <div class="col-md-9">
            <h2 style="color:white; text-align: center; margin-left: 34%;">
                个人中心
            </h2>
            </div>
            <div class="col-md-1" style="margin-top: 2%; padding-left: 5%;">
              <img src="<?php echo ($pic); ?>" style="width: 30px;height: 30px;"/>
            </div>
            <div class="col-md-2" style="margin-top: 2%;">
              <a href="/AO/index.php/Home/Person/index" style="text-decoration: none; color:white;"><h4>hi,<?php echo ($username); ?></h4></a>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="/AO/index.php/Home/Person/index">修改密码</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Person/info">修改个人信息</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Person/salarybill">工资条查询</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Person/findAttendence">考勤</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-offset-5" style="padding: 2% 2% 0% 2%;">
                工资条：
                <select id="mySelect">
                  <option key="-1">未选择</option>
                  <?php if(is_array($salarybill)): foreach($salarybill as $key=>$vo): ?><option key="<?php echo ($vo["sid"]); ?>">
                      <?php echo ($vo["date"]); ?>
                    </option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="col-md-8 col-md-offset-2" style="margin-top: 5%">
                <?php if(is_array($salarybill)): foreach($salarybill as $key=>$vo): ?><table class="table table-hover tablelist" id="<?php echo ($vo["sid"]); ?>" style="display: none;">
                    <tr>
                      <td>工号</td>
                      <td>姓名</td>
                      <td>日期</td>
                      <td>出勤</td>
                      <td>工资</td>
                      <td>饭补贴</td>
                      <td>交通补贴</td>
                      <td>合计</td>
                      <td>五险一金</td>
                      <td>个税</td>
                      <td>合计</td>
                      <td>实发工资</td>
                    </tr>
                    <tr>
                      <td><?php echo ($vo["uid"]); ?></td>
                      <td><?php echo ($vo["username"]); ?></td>
                      <td><?php echo ($vo["date"]); ?></td>
                      <td><?php echo ($vo["day"]); ?></td>
                      <td><?php echo ($vo["salary"]); ?></td>
                      <td><?php echo ($vo["food"]); ?></td>
                      <td><?php echo ($vo["transport"]); ?></td>
                      <td><?php echo ($vo["totalgive"]); ?></td>
                      <td><?php echo ($vo["five"]); ?></td>
                      <td><?php echo ($vo["person"]); ?></td>
                      <td><?php echo ($vo["totalcost"]); ?></td>
                      <td><?php echo ($vo["total"]); ?></td>
                    </tr>
                  </table><?php endforeach; endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="footer_f">
                <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">黑龙江节点动画有限公司 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>