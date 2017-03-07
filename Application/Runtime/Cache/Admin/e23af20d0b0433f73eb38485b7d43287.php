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
          var value = $(this).attr('aid');
          if(ok)
          {
              $.post("/AO/index.php/Admin/Announcement/deleteAnnouncement",{'aid':value},function(data)
              {
                if(data == 0)
                {
                    alert("删除失败");
                }
                else
                {
                    alert("删除成功");
                    window.location.href="/AO/index.php/Admin/Announcement/index";
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
              <li role="presentation"><a href="/AO/index.php/Admin/Index/index">员工管理</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Group/index">部门管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Announcement/index">通知公告管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Meeting/index">会议室管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/index" target="_blank">测试平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Knowledge/index" target="_blank">知识平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Project/index" target="_blank">项目平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-offset-5 col-md-4">
              <h2>
                部门管理
              </h2>
            </div>
            <div class="col-md-2" style="margin-top: 2%">
                <a href="/AO/index.php/Admin/Group/addGroup" id="add" class="btn btn-primary">
                    新增部门
                </a>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <table class="table table-hover">
                <tr>
                  <td>部门名称</td>
                  <td>部门信息</td>
                  <td>修改</td>
                </tr>
                <?php if(is_array($department)): foreach($department as $key=>$vo): ?><tr>
                  <td>
                    <a href="/AO/index.php/Admin/Group/info?gid=<?php echo ($vo["gid"]); ?>"><?php echo ($vo["groupname"]); ?></a>
                  </td>
                  <td>
                    <?php echo ($vo["describe"]); ?>
                  </td>
                  <td>
                    <a href="/AO/index.php/Admin/Group/modifyGroup?gid=<?php echo ($vo["gid"]); ?>">修改</a>
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