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
        $(".delete").click(function(){
          var ok = confirm("确认要删除吗?");
          var value = $(this).attr('oid');
          if(ok)
          {
              $.post("/AO/index.php/Admin/Test/deleteoj",{'oid':value},function(data)
              {
                if(data == 0)
                {
                    alert("删除失败");
                }
                else
                {
                    alert("删除成功");
                    window.location.href="/AO/index.php/Admin/Test/ojList";
                }
            });
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 1300px">
    <div class="container">
        <div class="row" style="margin-top: 2%;">
            <div class="col-md-12">
            <h2 style="color:white; text-align: center;">
                黑龙江节点动画有限公司后台管理
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="/AO/index.php/Admin/T
              /index">专项训练题目管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/kind">专题训练分类管理</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Test/ojList">在线测试题目管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 1000px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                Problem
              </h3>
            </div>
            <div class="col-md-offset-5">
              <form class="form-inline" action="/AO/index.php/Admin/Test/ojList" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="oid" placeholder="题名或者题号">
                  </div>
                  <button type="submit" class="btn btn-default">查询</button>
                  <button type="button" class="btn btn-default"><a href="/AO/index.php/Admin/Test/oj" style="text-decoration: none;color:black;">新增题目</a></button>
                </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 1%; padding-left: 3%;">
              <table class="table table-hover">
                <tr>
                  <td>题号</td>
                  <td>问题</td>
                  <td>修改</td>
                  <td>删除</td>
                </tr>
                <?php if(is_array($ojList)): foreach($ojList as $key=>$vo): ?><tr>
                  <td>
                      <?php echo ($vo["oid"]); ?>
                  </td>
                  <td>
                    <a href="/AO/index.php/Admin/Test/oj?oid=<?php echo ($vo["oid"]); ?>">
                      <?php echo ($vo["title"]); ?>
                    </a>
                  </td>
                   <td>
                    <a href="/AO/index.php/Admin/Test/oj?oid=<?php echo ($vo["oid"]); ?>">
                      修改
                    </a>
                  </td>
                   <td>
                    <a href="javascrip:void(0)" class="delete" oid="<?php echo ($vo["oid"]); ?>">
                      删除
                    </a>
                  </td>
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