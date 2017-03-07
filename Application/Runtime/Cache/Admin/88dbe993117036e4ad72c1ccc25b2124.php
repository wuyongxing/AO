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
            var text = $('#kind').val();
            if(text == 1)
                $("#kind1").addClass("active");
            else if(text == 2)
                $("#kind2").addClass("active");
            else
                $("#kind3").addClass("active");
        });
        $(document).ready(function(){
            $('.delete').click(function(){
                var ok = confirm("确认删除?");
                if(!ok) return;
                var aid = $(this).val();
                var kind = $('#kind').val();
                $.post("/AO/index.php/Home/Knowledge/deletearticle",{'aid':aid},function(data){
                    if(data == 0)
                        alert("删除失败");
                    else
                    {
                        alert("删除成功");
                        window.location.href="/AO/index.php/Admin/Knowledge/index?kind="+kind;
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
            <div class="col-md-9">
            <h2 style="color:white; text-align: center; margin-left: 34%;">
                黑龙江节点动画有限公司
            </h2>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" id="kind1"><a href="/AO/index.php/Admin/Knowledge/index">技术</a></li>
              <li role="presentation" id="kind2"><a href="/AO/index.php/Admin/Knowledge/index?kind=2">生活</a></li>
              <li role="presentation" id="kind3"><a href="/AO/index.php/Admin/Knowledge/index?kind=3">问答</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                <?php if($kind == 1): ?>技术
                <?php elseif($kind == 2): ?>
                生活
                <?php else: ?>
                问答<?php endif; ?>
              </h3>
            </div>
            <div class="col-md-offset-5">
              <form class="form-inline" action="/AO/index.php/Admin/Knowledge/index" method="get">
                <input type="hidden" id="kind" name="kind" value="<?php echo ($kind); ?>">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="关键字">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
              </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%; margin-top: 1%;">
              <table class="table table-hover">
                <tr>
                  <td>文章</td>
                  <td>发布时间</td>
                  <td>修改</td>
                  <td>删除</td>
                </tr>
                <?php if(is_array($article)): foreach($article as $key=>$val): ?><tr>
                    <td><a href="/AO/index.php/Admin/Knowledge/article?aid=<?php echo ($val["aid"]); ?>&akid=<?php echo ($val["akid"]); ?>" target="_blank"><?php echo ($val["title"]); ?>(<?php echo ($val["clicknum"]); ?>)</a></td>
                    <td><?php echo ($val["date"]); ?></td>
                    <td><a href="/AO/index.php/Admin/Knowledge/modifyarticle?aid=<?php echo ($val["aid"]); ?>" class="btn btn-default" style="text-decoration: none; color:block;">修改</a></td>
                    <td><button class="btn btn-default delete" value="<?php echo ($val["aid"]); ?>">删除</button></td>
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