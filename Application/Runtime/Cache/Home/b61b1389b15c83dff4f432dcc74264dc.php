<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="width:100%;overflow-x:hidden;">
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
        $('#submit').click(function(){
          $('#infoForm').submit();
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
              <li role="presentation"><a href="/AO/index.php/Home/Test/index">专项练习</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/testRecord">专项练习记录</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Test/ojlist">在线编程</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/status">在线编程提交状态</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/mydata">我的数据</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                在线编程
              </h2>
            </div>
            <div class="col-md-offset-5">
              <form class="form-inline" action="/AO/index.php/Home/Test/ojList" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="oid" placeholder="题名或者题号">
                  </div>
                  <button type="submit" class="btn btn-default">查询</button>
                </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 1%; padding-left: 3%;">
              <table class="table table-hover">
                <tr>
                  <td>题号</td>
                  <td>问题</td>
                </tr>
                <?php if(is_array($ojlist)): foreach($ojlist as $key=>$vo): ?><tr>
                  <td>
                      <?php echo ($vo["oid"]); ?>
                  </td>
                  <td>
                    <a href="/AO/index.php/Home/Test/oj?oid=<?php echo ($vo["oid"]); ?>">
                      <?php echo ($vo["title"]); ?>
                    </a>
                  </td>
                </tr><?php endforeach; endif; ?>
              </table>
            </div>
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