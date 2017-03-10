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
            $("#submit").click(function(){
                var content = $('#submitcomment').val();
                var pid = $('#pid').val();
                $.post("/AO/index.php/Admin/Project/newProject",{'pid':pid,'content':content},function(data){
                    if(data == 0)
                        alert("新建/修改失败");
                    else
                    {
                        alert("新建/修改成功");
                        window.location.href="/AO/index.php/Admin/Project/index";
                    }  
                });
            });

            $('.modify').click(function(){
              var pid = $(this).val();
              $('#submitcomment').val($("#"+pid).text());
              $('#pid').val(pid);
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
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Project/index">所有项目</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Project/todayOnline">今日待上线</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Project/todayOnlined">今日已上线</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-9">
              <h3 style="margin-left: 62%;">
                所有项目
              </h3>
            </div>
            <div class="col-md-2" style="margin-top: 1%;">
              <?php if($pkid == 5): ?><button class="btn btn-default" data-toggle="modal" data-target="#myModal">新建项目</button><?php endif; ?>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <table class="table table-hover">
                <tr>
                  <td>项目名称</td>
                  <td>项目负责人</td>
                  <td>日期</td>
                  <td>修改</td>
                </tr>
                <?php if(is_array($project)): foreach($project as $key=>$val): ?><tr>
                  <td id="<?php echo ($val["pid"]); ?>"><a href="/AO/index.php/Admin/Project/subProject?pid=<?php echo ($val["pid"]); ?>" target="_blank"><?php echo ($val["content"]); ?></a></td>
                  <td><?php echo ($val["username"]); ?></td>
                  <td><?php echo (date("Y-m-d H:i:s",$val["date"])); ?></td>
                  <td><button class="btn btn-default modify" data-toggle="modal" value="<?php echo ($val["pid"]); ?>" data-target="#myModal">修改</button>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <input type="hidden" id="pid">
            <h4 class="modal-title" id="myModalLabel">项目名称</h4>
          </div>
          <div class="modal-body">
            <textarea id="submitcomment" style="width:550px; height:130px;"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" id="submit" class="btn btn-primary">提交</button>
          </div>
        </div>
      </div>
    </div>
</body>