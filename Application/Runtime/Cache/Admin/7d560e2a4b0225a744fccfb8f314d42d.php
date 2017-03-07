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
        $(".dele").click(function(){
          var ok = confirm("确定删除?");
          if(!ok) return;
          var mid = $(this).attr("mid");
          $.post("/AO/index.php/Admin/Meeting/dele",{'mid':mid},function(data){
            if(data == 1)
              alert("删除成功");
            else
              alert("删除失败");
          })
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
              <li role="presentation"><a href="/AO/index.php/Admin/Index/index">员工管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Group/index">部门管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Announcement/index">通知公告管理</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Meeting/index">会议室管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/index" target="_blank">测试平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Knowledge/index" target="_blank">知识平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Project/index" target="_blank">项目平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                搜索会议室
              </h3>
            </div>
            <div class="col-md-offset-5 col-md-12">
              <form class="form-inline" action="/AO/index.php/Admin/Meeting/index" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" id="meetingroom" name="meetingroom" placeholder="会议室名称">
                  </div>
                  <button type="submit" class="btn btn-default">查询</button>
                  <button type="button" class="btn btn-default"><a href="/AO/index.php/Admin/Meeting/addMeeting" style="text-decoration: none; color:black;">新增会议室</a></button>
                </form>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; margin-top: 1%; padding:0 0 0 0;">
              <?php if(is_array($meeting)): foreach($meeting as $key=>$vo): ?><div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                  <div class="col-md-12" style="border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                    <div style="margin: 5px 5px 5px 5px;">
                      <p>名称：<?php echo ($vo["meetingroom"]); ?></p>
                      <p>楼层：<?php echo ($vo["address"]); ?></p>
                      <p>容纳人数：<?php echo ($vo["container"]); ?></p>
                      <button class="btn btn-success"><a href="/AO/index.php/Admin/Meeting/info?mid=<?php echo ($vo["mid"]); ?>" style="color:white; text-decoration: none;">修改</a></button>
                      <button type="button" class="dele btn btn-danger" mid="<?php echo ($vo["mid"]); ?>">删除</button>
                    </div>
                  </div>  
                </div><?php endforeach; endif; ?>
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