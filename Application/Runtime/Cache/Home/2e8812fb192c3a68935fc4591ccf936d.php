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
            $('.delete').click(function(){
                var ok = confirm("确认删除?");
                if(!ok) return;
                var aid = $(this).val();
                $.post("/AO/index.php/Home/Knowledge/deletearticle",{'aid':aid},function(data){
                    if(data == 0)
                        alert("删除失败");
                    else
                    {
                        alert("删除成功");
                        window.location.href="/AO/index.php/Home/Knowledge/myarticle";
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
            <div class="col-md-1" style="margin-top: 2%; padding-left: 5%;">
              <img src="<?php echo ($pic); ?>" style="width: 30px;height: 30px;"/>
            </div>
            <div class="col-md-2" style="margin-top: 2%;">
              <a href="/AO/index.php/Home/Person/index" style="text-decoration: none; color:white;"><h4>hi,<?php echo ($username); ?></h4></a>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/index">热榜</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/articleList?kind=1">技术</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/articleList?kind=2">生活</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/ask">问答</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Knowledge/myarticle">我的文章</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/myask">我的问答</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12">
              <div class="col-md-10" style="padding-left: 46%;">
                  <h3>
                    我的文章
                  </h3>
              </div>
              <div class="col-md-2" style="margin-top: 1%;">
                <button class="btn btn-default"><a href="/AO/index.php/Home/Knowledge/newarticle" style="text-decoration: none; color:black;">新增文章</a></button>
              </div>
            </div>
            <div class="col-md-12" >
              <div class="col-md-6" style="border: 2px solid #ddd; border-radius: 10px;">
                <div class="col-md-12">
                    <h4 style="text-align: center;">
                        技术
                    </h4>
                    <table class="table table-hover">
                        <tr>
                            <td>标题</td>
                            <td>时间</td>
                            <td>修改</td>
                            <td>删除</td>
                        </tr>
                        <?php if(is_array($jishu)): foreach($jishu as $key=>$val): ?><tr>
                            <td><a href="/AO/index.php/Home/Knowledge/article?aid=<?php echo ($val["aid"]); ?>" target="_blank"><?php echo ($val["title"]); ?></a></td>
                            <td><?php echo ($val["date"]); ?></td>
                            <td><a href="/AO/index.php/Home/Knowledge/newarticle?aid=<?php echo ($val["aid"]); ?>" class="btn btn-default" style="text-decoration: none; color:block;">修改</a></td>
                            <td><button class="btn btn-default delete" value="<?php echo ($val["aid"]); ?>">删除</button></td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
              </div>
              <div class="col-md-6" style="border: 2px solid #ddd; border-radius: 10px;">
                <div class="col-md-12">
                    <h4 style="text-align: center;">
                        生活
                    </h4>
                    <table class="table table-hover">
                        <tr>
                            <td>标题</td>
                            <td>时间</td>
                            <td>修改</td>
                            <td>删除</td>
                        </tr>
                        <?php if(is_array($shenghuo)): foreach($shenghuo as $key=>$val): ?><tr>
                            <td><a href="/AO/index.php/Home/Knowledge/article?aid=<?php echo ($val["aid"]); ?>" target="_blank"><?php echo ($val["title"]); ?></a></td>
                            <td><?php echo ($val["date"]); ?></td>
                            <td><a href="/AO/index.php/Home/Knowledge/newarticle?aid=<?php echo ($val["aid"]); ?>" class="btn btn-default" style="text-decoration: none; color:block;">修改</a></td>
                            <td><button class="btn btn-default delete" value="<?php echo ($val["aid"]); ?>">删除</button></td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
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