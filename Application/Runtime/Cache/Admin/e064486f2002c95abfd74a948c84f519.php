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
            var kind = $('#kind').val();
            if(kind)
                $("option[value="+kind+"]").attr("selected",true);
            $('#submit').click(function(){
                var text = $("#content").html();
                $("textarea[name='content']").val(text);
                var arr = $('#addArticleForm').serialize();
                $.post("/AO/index.php/Admin/Knowledge/addarticle",arr,function(data){
                    if(data == 0)
                        alert("修改失败");
                    else
                    {
                        alert("修改成功");
                        var akid = $("#kind").val();
                        window.location.href="/AO/index.php/Admin/Knowledge/index?kind="+akid;
                    }
                });
            });
            
        });
    </script>
    <style type="text/css">
        .nav li a{
            color: #fff;
        }
        .trumbowyg
        {
          margin-top: 5%;
        }
    </style>
</head>
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 1000px">
    <div class="container">
        <div class="row" style="margin-top: 2%;">
            <div class="col-md-9">
            <h2 style="color:white; text-align: center; margin-left: 34%;">
                黑龙江节点动画有限公司
            </h2>
            </div>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 800px;">
            <div class="col-md-12">
              <h3 style="text-align: center;">
                修改文章/问答
              </h3>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding:3% 3% 3% 3%; margin-top: 1%;">
                <form class="form-horizontal" id="addArticleForm">
                  <input type="hidden" name="aid" value="<?php echo ($article["aid"]); ?>" />
                  <input type="hidden" id="kind" name="akid" value="<?php echo ($article["akid"]); ?>" />
                  <div class="form-group">
                    <div class="col-md-4">
                        <label for="exampleInputName2" class="control-label">标题</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo ($article["title"]); ?>">
                    </div>
                  </div>
                  <input type="hidden" name="aid" value="<?php echo ($article["aid"]); ?>">
                  <input type="hidden" name="uid" value="<?php echo ($uid); ?>">
                  <input type="hidden" id="oldContent" value="<?php echo ($article["content"]); ?>" />
                  <input type="hidden" id="kind" value="<?php echo ($article["akid"]); ?>">
                  <div class="form-group">
                    <div class="col-md-4">
                      <label for="exampleInputName2" class="control-label">分类</label><br>
                      <select name="akid" style="border: 2px solid #ddd;">
                          <option value="1">技术</option>
                          <option value="2">生活</option>
                          <option value="3">问答</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-4">
                        <label for="exampleInputName2" class="control-label">内容</label>
                    </div>
                    <div id="content">
                    </div>
                  </div>
                  <div class="col-md-2"><button type="button" class="btn btn-default" id="submit">发布</button></div>
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