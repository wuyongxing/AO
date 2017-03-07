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
            <div class="col-md-9">
            <h2 style="color:white; text-align: center; margin-left: 34%;">
                黑龙江节点动画有限公司
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/index">热榜</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/articleList?kind=1">技术</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/articleList?kind=2">生活</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Knowledge/ask">问答</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/myarticle">我的文章</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/myask">我的问答</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                问答
              </h2>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <table class="table table-hover">
                  <tr>
                      <td>问题</td>
                      <td>回答人数</td>
                      <td>日期</td>
                  </tr>
                  <?php if(is_array($ask)): foreach($ask as $key=>$val): ?><tr>
                        <td><a href="/AO/index.php/Home/Knowledge/seeask?aid=<?php echo ($val["aid"]); ?>"><?php echo ($val["title"]); ?></a></td>
                        <td><?php echo ($val["clicknum"]); ?></td>
                        <td><?php echo ($val["date"]); ?></td>
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