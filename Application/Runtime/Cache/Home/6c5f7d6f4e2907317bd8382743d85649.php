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
        $('#submit').click(function(){
          $('#infoForm').submit();
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
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Test/index">专项练习</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/ojlist">在线编程</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/status">在线编程提交状态</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Test/mydata">我的数据</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                专项练习
              </h2>
            </div>
            <div class="col-md-10 col-md-offset-1" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <form id="infoForm" action="/AO/index.php/Home/Test/test" method="post">
              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>逻辑和数学</h4>
                  </div>
                  <?php if(is_array($arr1)): foreach($arr1 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>编程语言</h4>
                  </div>
                  <?php if(is_array($arr2)): foreach($arr2 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>算法</h4>
                  </div>
                  <?php if(is_array($arr3)): foreach($arr3 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>计算机基础</h4>
                  </div>
                  <?php if(is_array($arr4)): foreach($arr4 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>数据结构</h4>
                  </div>
                  <?php if(is_array($arr5)): foreach($arr5 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>软件开发</h4>
                  </div>
                  <?php if(is_array($arr6)): foreach($arr6 as $key=>$vo): ?><div class="col-md-offset-3 col-md-6 checkbox">
                      <label>
                        <input type="checkbox" name="problem[]" value="<?php echo ($vo["tkid"]); ?>"><?php echo ($vo["kind"]); ?>
                      </label>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>
              </form>
            </div>
            <div class="col-md-12" style="margin-top: 1%; margin-left: 47%;">
            <button class="btn btn-primary" id="submit">测试</button>
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