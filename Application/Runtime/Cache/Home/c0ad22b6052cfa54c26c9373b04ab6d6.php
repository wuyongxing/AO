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
    <script type="text/javascript" src="/AO/Public/js/laydate.dev.js"></script>
    <script>
      $(document).ready(function(){
        $("#booking").click(function(){
          var arr = $("#timeinfo").serialize();
          $.post("/AO/index.php/Home/Meeting/doBooking",arr,function(data){
            if(data == 1)
            {
              alert("预定成功");
              window.location.href="/AO/index.php/Home/Meeting/mybooking";
            }
            else
              alert("预定失败");
          });
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
                黑龙江节点动画有限公司
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
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Meeting/index">搜索会议室</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Meeting/mybooking">我的预定</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                预定会议室
              </h3>
            </div>
            <div class="col-md-8 col-md-offset-3" style="padding: 2% 2% 0% 2%;">
                <form class="form-inline" id="timeinfo" onsubmit="return false;">
                  <input type="hidden" name="mid" value="<?php echo ($mid); ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail2">日期:</label>
                    <input type="text" class="form-control" id="from" name="from" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail2">-</label>
                    <input type="text" class="form-control" id="to" name="to" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                  </div>
                  <button type="button" id="booking" class="btn btn-default">预定</button>
                </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 1%;">
              <table class="table table-hover">
                <tr>
                  <td>会议室名称</td>
                  <td>预定人</td>
                  <td>预定日期</td>
                  <td>预定开始时间</td>
                  <td>预定结束时间</td>
                </tr>
                <?php if(is_array($time)): foreach($time as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["meetingroom"]); ?></td>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["date"]); ?></td>
                    <td><?php echo (date("H:i:s",$vo["from"])); ?></td>
                    <td><?php echo (date("H:i:s",$vo["to"])); ?></td>
                  </tr><?php endforeach; endif; ?>  
              </table>
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