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

    <script src="/AO/Public/js/trumbowyg/trumbowyg.min.js"></script>

    <link rel="stylesheet" href="/AO/Public/js/trumbowyg/design/css/trumbowyg.css">

    <script>
      $(document).ready(function(){
        $("#content").trumbowyg();
        var text = $("#oldContent").val();
        $("#content").html(text);
        
        $("#input").trumbowyg();
        text = $("#oldInput").val();
        $("#input").html(text);

        $("#sample").trumbowyg();
        text = $("#oldSample").val();
        $("#sample").html(text);

        $("#submit").click(function(){
          var text = $("#content").html();
          $("textarea[name='content']").val(text);
          
          text = $("#input").html();
          $("textarea[name='input']").val(text);

          text = $("#sample").html();
          $("textarea[name='sample']").val(text);
          
          arr = $("#addArticleForm").serialize();
          $.post("/AO/index.php/Admin/Test/addoj",arr,function(data){
              if(data == 0)
              {
                  alert("新增失败");
              }
              else
              {
                  alert("新增成功");
                  window.location.href="/AO/index.php/Admin/Test/ojList";
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 1800px">
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
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 1600px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                Problem
              </h3>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 1%; padding: 3% 3% 3% 3%;">
              <form class="form-horizontal" id="addArticleForm">
                <div class="form-group">
                  <label class="control-label">标题</label>
                  <input type="text" class="form-control" name="title" value="<?php echo ($oj["title"]); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">时间空间限制</label>
                  <input type="text" class="form-control" name="time" value="<?php echo ($oj["time"]); ?>">
                </div>
                <input type="hidden" name="oid" value="<?php echo ($oj["oid"]); ?>" />
                <input type="hidden" id="oldContent" value="<?php echo ($oj["content"]); ?>" />
                <div class="form-group">
                    <label class="control-label">题目描述</label>
                    <div id="content">
                    </div>
                </div>
                <input type="hidden" id="oldInput" value="<?php echo ($oj["input"]); ?>" />
                <div class="form-group">
                    <label class="control-label">输入输出说明</label>
                    <div id="input">
                    </div>
                </div>
                <input type="hidden" id="oldSample" value="<?php echo ($oj["sample"]); ?>" />
                <div class="form-group">
                    <label class="control-label">样例说明</label>
                    <div id="sample">
                    </div>
                </div>    
                <button type="button" id="submit" class="btn btn-default">Submit</button>
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