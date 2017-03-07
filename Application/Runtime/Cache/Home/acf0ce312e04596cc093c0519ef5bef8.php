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
        $("#file").change(function () {
          var $file = $(this);
          var fileObj = $file[0];
          var windowURL = window.URL || window.webkitURL;
          var dataURL;
          var $img = $("#pic");

          if (fileObj && fileObj.files && fileObj.files[0]) {
              dataURL = windowURL.createObjectURL(fileObj.files[0]);
              $img.attr('src', dataURL);
          } else {
              dataURL = $file.val();
              var imgObj = document.getElementById("preview");
              imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
              imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
          }
        });
        $("#upload").click(function(){
          var formData = new FormData();
          formData.append("photo",$("#file")[0].files[0]);
          formData.append('uid',$("#uid").val());
          $.ajax({ 
          url : '/AO/index.php/Home/Person/uploadPic', 
          type : 'POST', 
          data : formData, 
          // 告诉jQuery不要去处理发送的数据
          processData : false, 
          // 告诉jQuery不要去设置Content-Type请求头
          contentType : false,
          beforeSend:function(){
          },
          success : function(responseStr) { 
            if(responseStr == 1)
              alert("上传成功");
            else
              alert("上传失败");
          }, 
          error : function(responseStr) { 
            alert("上传失败");
          } 
          });
        });

        $("#modifyinfo").click(function(){
          var data = $("#infoForm").serialize();
          $.post("/AO/index.php/Home/Person/modifyInfo", data, function(data){
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 900px">
    <div class="container">
        <div class="row" style="margin-top: 2%;">
            <div class="col-md-9">
            <h2 style="color:white; text-align: center; margin-left: 34%;">
                个人中心
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
              <li role="presentation"><a href="/AO/index.php/Home/Person/index">修改密码</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Person/info">修改个人信息</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Person/salarybill">工资条查询</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Person/findAttendence">考勤</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12">
              <input type="hidden" name="uid" id="uid" value="<?php echo ($uid); ?>">
              <div class="col-md-2 col-md-offset-4" style="margin-top: 2%;"><img src="<?php echo ($pic); ?>" id="pic"style="height: 150px; width: 150px;"></div>
              <div class="col-md-2" style="margin-top: 10%;">
              <input type="file" id="file">
              <button id="upload" style="margin-top: 2%;" class="btn-default btn">上传</button>
              </div>
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