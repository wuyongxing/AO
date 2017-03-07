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
                黑龙江节点动画有限公司
                <?php if($group == 1): ?>业务部门
                <?php elseif($group == 2): ?>技术部门
                <?php else: ?>管理部门<?php endif; ?>
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#">新人入门</a></li>
              <li role="presentation"><a href="#">公告通知</a></li>
              <li role="presentation"><a href="#">电话号码</a></li>
              <li role="presentation"><a href="#">公司资源</a></li>
              <li role="presentation"><a href="#">考勤</a></li>
              <li role="presentation"><a href="#">员工登陆</a></li>
              <li role="presentation"><a href="#">其他部门入口</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h1>
                新人须知
              </h1>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <h4 style="margin-top: 5%">1.公司实行打卡制度</h4>
              <h4>2.公司每周休息一天，周日休息，上班时间 9：00am-6：00pm</h4>
              <h4>3.如果不能完成任务，请自觉加班</h4>
              <h4>4.来了之后先学习一星期，通过了测试才能干活</h4>
              <h4>5.做到人走电脑关</h4>
              <h4>6.如果遇到特殊情况需要请假，请提前至少一天说明情况</h4>
              <h4>7.上班期间不允许看电影，后期除外</h4>
              <h4>8.上班期间不允许看手机</h4>
              <h4>9.不允许拷贝公司的重要文件</h4>
              <h4>10.文件命名方式要按照公司规定</h4>
              <h4>11.报销需要提供公司抬头发票</h4>
              <h4>12.公司内部不允许谈恋爱</h4>
              <h4>13.新人刚来一周需要每天读一遍新人须知</h4>
              <h4>14.开会不能迟到</h4>
              <h4>15.每天下班之前，代码要用svn同步到远程分支上</h4>
              <h4>16.公司资源不能外泄</h4>
            </div>
            <div class="col-md-12" style="margin-top: 2%;text-align: center"><button class="btn btn-primary">新人测试</button></div>
        </div>
        <div class="row">
            <div class="footer_f">
                <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">黑龙江节点动画有限公司 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>