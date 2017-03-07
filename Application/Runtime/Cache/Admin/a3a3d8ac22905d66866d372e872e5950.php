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
        $("#submit").click(function(){
          var arr = $("#addArticleForm").serialize();
          $.post("/AO/index.php/Admin/Index/doAddAnnouncement",arr,function(data){
              if(data == 0)
              {
                  alert("发布失败");
              }
              else
              {
                  alert("发布成功");
                  window.location.href="/AO/index.php/Admin/Index/announcementList";
              }
          });
        });
        $("#content").trumbowyg();
        var text = $("#oldContent").val();
        $("#content").text(text);
      });
    </script>
    <style type="text/css">
        .nav li a
        {
            color: #fff;
        }
        .trumbowyg
        {
          margin-top: 5%;
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
              <li role="presentation" class="active"><a href="#">员工管理</a></li>
              <li role="presentation"><a href="#">部门管理</a></li>
              <li role="presentation"><a href="#">通知管理</a></li>
              <li role="presentation"><a href="#">知识平台管理</a></li>
              <li role="presentation"><a href="#">会议室管理</a></li>
              <li role="presentation"><a href="#">项目管理</a></li>
              <li role="presentation"><a href="#">考勤管理</a></li>
              <li role="presentation"><a href="#">新人测试管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;" >
            <div class="col-md-offset-5 col-md-4">
              <h2>
                通知公告
              </h2>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding:3% 3% 3% 3%;">
                <form class="form-horizontal" id="addArticleForm">
                  <input type="hidden" name="aid" value="<?php echo ($article["aid"]); ?>" />
                  <input type="hidden" name="akid" value="<?php echo ($article["akid"]); ?>" />
                  <div class="form-group">
                    <label for="exampleInputName2" class="col-md-2 control-label">标题</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo ($article["title"]); ?>">
                    </div>
                  </div>
                  <input type="hidden" id="oldContent"value="<?php echo ($article["content"]); ?>" />
                  <div class="form-group">
                    <label for="exampleInputName2" class="col-md-2 control-label">内容</label>
                    <div id="content">
                    </div>
                  </div>
                  <div class="col-md-offset-2 col-md-2"><button type="button" class="btn btn-default" id="submit">发布</button></div>
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