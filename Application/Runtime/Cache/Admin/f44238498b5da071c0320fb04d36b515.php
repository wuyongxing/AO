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
            $("#submit").click(function(){
                var arr = $("#loginForm").serialize();
                $.post("/AO/index.php/Admin/Meeting/add",arr,function(data){
                    if(data == 0)
                        alert("新增失败");
                    else
                    {
                        alert("新增成功");
                        window.location.href="/AO/index.php/Admin/Meeting/index";
                    }
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
                新增会议室
              </h3>
            </div>
            <div class="col-md-4 col-md-offset-4" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 5%;">
              <form class="form-horizontal" role="form" id="loginForm">
                  <input type="hidden" name="mid" value="<?php echo ($meeting["mid"]); ?>">
                  <div class="form-group" style="margin-top: 5%;">
                    <label for="inputPassword3" class="col-sm-4 control-label">会议室名称:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="RoomName" name="meetingroom" value="<?php echo ($meeting["meetingroom"]); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">容纳人数:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="6人" name="container" value="<?php echo ($meeting["container"]); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">密码:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="三楼" name="address" value="<?php echo ($meeting["address"]); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-10">
                      <button type="button" id="submit" class="btn btn-success">修改</button>
                    </div>
                  </div>
                </form>
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