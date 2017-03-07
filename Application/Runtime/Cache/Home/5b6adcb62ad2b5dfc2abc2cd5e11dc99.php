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
                $.post("/AO/index.php/Home/Login/login",arr,function(data){
                    if(data == 0)
                        alert("密码错误");
                    else
                    {
                        if($('#isAdmin option:selected').val() == '0')
                            window.location.href="/AO/index.php/Home/Index/index";
                        else if($('#isAdmin option:selected').val() == '1')
                            window.location.href="/AO/index.php/Admin/Index/index";
                        else
                            window.location.href="/AO/index.php/Admin/Attendence/index";
                    }
                });
            });
        });
    </script>
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
        <div class="row" style="margin-top: 16%">
            <div class="col-md-offset-4 col-md-4" style="border: 1px solid #ddd; border-radius:10px; padding: 2% 2% 0% 2%;">
                <form class="form-horizontal" role="form" id="loginForm">
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">部门</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="isAdmin" id="isAdmin">
                          <option selected="selected" value="0">普通员工</option>
                          <option value="1">管理员</option>
                          <option value="2">打卡</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">工号</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="uid" placeholder="Number" name="uid">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" id="submit" class="btn btn-default">登录</button>
                    </div>
                  </div>
                </form>
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