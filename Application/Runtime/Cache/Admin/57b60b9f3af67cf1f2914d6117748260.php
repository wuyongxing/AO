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
        $("#modifyinfo").click(function(){
            var arr = $("#infoForm").serialize();
            $.post("/AO/index.php/Admin/Test/modifyProblem",arr,function(data)
            {
              if(data == 0)
                  alert("新增/修改失败");
              else
              {
                  window.location.href="/AO/index.php/Admin/Test/problemlist?tkid=<?php echo ($tkid); ?>";
                  alert("新增/修改成功");
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
            <div class="col-md-12">
            <h2 style="color:white; text-align: center;">
                黑龙江节点动画有限公司后台管理
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Test/index">专项训练题目管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/kind">专题训练分类管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/ojList">在线测试题目管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                专项训练题目管理
              </h3>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <div class="col-md-offset-4 col-md-4" style="margin-top: 2%;">
              <form id="infoForm" onsubmit="return false;">
                <div class="form-group">
                  <input type="hidden" name="pid" value="<?php echo ($problem["pid"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">问题:</label>
                  <input type="text" class="form-control" name="content" value="<?php echo ($problem["content"]); ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" name="tkid" value="<?php echo ($tkid); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">A:</label>
                  <input type="text" class="form-control" name="A" value="<?php echo ($problem["a"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">B:</label>
                  <input type="text" class="form-control" name="B" value="<?php echo ($problem["b"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">C:</label>
                  <input type="text" class="form-control" name="C" value="<?php echo ($problem["c"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">D:</label>
                  <input type="text" class="form-control" name="D" value="<?php echo ($problem["d"]); ?>" >
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail2">Answer:</label>
                  <input type="text" class="form-control" name="answer" value="<?php echo ($problem["answer"]); ?>" >
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" id="modifyinfo">提交</button>
                </div>
              </form>
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