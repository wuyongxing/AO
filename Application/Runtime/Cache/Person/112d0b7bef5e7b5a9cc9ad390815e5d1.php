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
                个人中心
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#">修改密码</a></li>
              <li role="presentation"><a href="#">修改个人信息</a></li>
              <li role="presentation"><a href="#">我的文章</a></li>
              <li role="presentation"><a href="#">负责项目</a></li>
              <li role="presentation"><a href="#">工资条查询</a></li>
              <li role="presentation"><a href="#">考勤</a></li>
              <li role="presentation"><a href="#">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="margin-top: 16%">
            <div class="col-md-4 col-md-offset-4" style="border: 1px solid #ddd; border-radius:10px; padding: 2% 2% 0% 2%; text-align: center;">
                <form class="form-horizontal" role="form" id="loginForm">
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">旧密码</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">新密码</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">确认密码</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-2">
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