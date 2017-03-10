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
          var data = $("#infoForm").serialize();
          $.post("/AO/index.php/Admin/Index/modifyInfo", data, function(data){
            if(data == 1)
              alert("修改成功");
            else
              alert("修改失败");
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 1100px">
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
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Index/index">员工管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Group/index">部门管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Announcement/index">通知公告管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Meeting/index">会议室管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/index" target="_blank">测试平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Knowledge/index" target="_blank">知识平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Project/index" target="_blank">项目平台管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 900px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                员工管理
              </h3>
            </div>
            <div class="col-md-offset-4 col-md-4" style="margin-top: 2%;">
              <form id="infoForm" onsubmit="return false;">
                <div class="form-group">
                  <label for="exampleInputEmail2">用户名:</label>
                  <input type="text" class="form-control" name="username" value="<?php echo ($user["username"]); ?>" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">工号:</label>
                  <input type="text" class="form-control" name="uid" value="<?php echo ($user["uid"]); ?>" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">电话:</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo ($user["phone"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">Email:</label>
                  <input type="text" class="form-control" name="email" value="<?php echo ($user["email"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">地址:</label>
                  <input type="text" class="form-control" name="address" value="<?php echo ($user["address"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">部门:</label><br>
                  <select class="btn" style="border: 1px gray solid;" name="gid">
                    <?php if(is_array($departmentinfo)): foreach($departmentinfo as $key=>$vo): if($vo['gid'] == $user['gid']): ?><option value="<?php echo ($vo["gid"]); ?>" selected="selected"><?php echo ($vo["groupname"]); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($vo["gid"]); ?>"><?php echo ($vo["groupname"]); ?></option><?php endif; endforeach; endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">职位:</label><br>
                  <select class="btn" style="border: 1px gray solid;" name="pkid">
                    <?php if(is_array($pkid)): foreach($pkid as $key=>$vo): if($vo['pkid'] == $user['pkid']): ?><option value="<?php echo ($vo["pkid"]); ?>" selected="selected"><?php echo ($vo["kind"]); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($vo["pkid"]); ?>"><?php echo ($vo["kind"]); ?></option><?php endif; endforeach; endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">身份证:</label>
                  <input type="text" class="form-control" name="idcard" value="<?php echo ($user["idcard"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">出生年月:</label>
                  <input type="text" class="form-control" name="age" value="<?php echo ($user["age"]); ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">学历:</label>
                  <input type="text" class="form-control" name="background" value="<?php echo ($user["background"]); ?>" >
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" id="modifyinfo">修改</button>
                </div>
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