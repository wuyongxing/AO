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
            $("#submit").click(function(){
                var arr = $("#loginForm").serialize();
                $.post("/AO/index.php/Admin/Index/doAttendence",arr,function(data){
                    if(data == 0)
                        alert("工号不存在");
                    else if(data == 1)
                        alert("请在规定时间内打卡");
                    else
                        alert("打卡成功");
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
            <div class="col-md-12">
            <h2 style="color:white; text-align: center;">
                黑龙江节点动画有限公司办公管理系统
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="/AO/index.php/Admin/Index/attendence">员工打卡</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Index/findAttendence">查询考勤</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">返回登录</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-10 col-md-offset-2" style="padding: 2% 2% 0% 2%;">
                <form class="form-inline" action="/AO/index.php/Admin/Index/findAttendence" method="post">
                  <div class="form-group">
                    <label for="exampleInputName2">工号</label>
                    <input type="text" class="form-control" id="uid" name="uid" placeholder="Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail2">日期:</label>
                    <input type="text" class="form-control" id="from" name="from" onclick="laydate()">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail2">-</label>
                    <input type="text" class="form-control" id="to" name="to" onclick="laydate()">
                  </div>
                  <button type="submit" class="btn btn-default">查询</button>
                </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="margin-top: 1%">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>工号</td>
                            <td>姓名</td>
                            <td>日期</td>
                            <td>上午</td>
                            <td>下午</td>
                            <td>出勤情况</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($dateInfo)): foreach($dateInfo as $key=>$vo): ?><tr>
                        <td><?php echo ($vo["uid"]); ?></td>
                        <td><?php echo ($vo["username"]); ?></td>
                        <td><?php echo ($vo["date"]); ?></td>
                        <td><?php if($vo["start"] == 1): ?>已打卡<?php else: ?>未打卡<?php endif; ?></td>
                        <td><?php if($vo["end"] == 1): ?>已打卡<?php else: ?>未打卡<?php endif; ?></td>
                        <td><?php if($vo["start"] == 1 and $vo["end"] == 1): ?>出勤<?php else: ?>缺勤<?php endif; ?></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>   
              
            </div>
        </div>
        <div class="row" style="margin-top: 15%">
            <div class="footer_f">
                <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">黑龙江节点动画有限公司 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>