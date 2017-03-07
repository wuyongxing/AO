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
        $('#add').click(function(){
          $.post("/AO/index.php/Admin/Test/add",$('#addForm').serialize(),function(data){
              if(data == 0)
                alert("新增失败");
              else
              {
                alert("新增成功");
                window.location.href="/AO/index.php/Admin/Test/index";
              }
            });
        });
        $('.modify').click(function(){
          var id = $(this).attr('tkid');
          var value = $("#"+id).val();
          $.post("/AO/index.php/Admin/Test/modify",{'tkid':id,'kind':value},function(data){
              if(data == 0)
                alert("修改失败");
              else
                alert("修改成功");
            });
        });
        $('.delete').click(function(){
          var ok = confirm("确定要删除?");
          if(!ok) return;
          var id = $(this).attr('tkid');
          $.post("/AO/index.php/Admin/Test/delete",{'tkid':id},function(data){
              if(data == 0)
                alert("删除失败");
              else
              {
                alert("删除成功");
                window.location.href="/AO/index.php/Admin/Test/index";
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 1300px">
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
              <li role="presentation"><a href="/AO/index.php/Admin/Test/index">专项训练题目管理</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Admin/Test/kind">专题训练分类管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Admin/Test/ojList">在线测试题目管理</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h3>
                专项训练分类管理
              </h3>
            </div>
            <div class="col-md-offset-4">
              <form class="form-inline" id="addForm">
                  <div class="form-group">
                    <select class="select btn" name="tmkid" style="border: 2px solid #ddd;">
                      <option value="1">逻辑和数学</option>
                      <option value="2">编程语言</option>
                      <option value="3">算法</option>
                      <option value="4">计算机基础</option>
                      <option value="5">数据结构</option>
                      <option value="6">软件开发</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="kind" placeholder="分类">
                  </div>
                  <button type="button" id="add" class="btn btn-default">添加分类</button>
                </form>
            </div>
            <div class="col-md-10 col-md-offset-1" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%; margin-top: 1%;">
              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>逻辑和数学</h4>
                  </div>
                  <?php if(is_array($arr1)): foreach($arr1 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>编程语言</h4>
                  </div>
                  <?php if(is_array($arr2)): foreach($arr2 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>算法</h4>
                  </div>
                  <?php if(is_array($arr3)): foreach($arr3 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>计算机基础</h4>
                  </div>
                  <?php if(is_array($arr4)): foreach($arr4 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>数据结构</h4>
                  </div>
                  <?php if(is_array($arr5)): foreach($arr5 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
                </div>
              </div>

              <div class="col-md-4" style="margin: 1% 0% 1% 0%;padding: 5px 15px 5px 15px;">
                <div class="col-md-12" style="height: 200px; border: 2px solid #ddd; border-radius: 10px; margin: 1% 0% 1% 0%;">
                  <div class="col-md-offset-3 col-md-6" >
                    <h4>软件开发</h4>
                  </div>
                  <?php if(is_array($arr6)): foreach($arr6 as $key=>$vo): ?><div class="col-md-12">
                      <div class="col-md-6">
                        <input type="text" style="width: 100px; margin-top: 5%;" id="<?php echo ($vo["tkid"]); ?>" value="<?php echo ($vo["kind"]); ?>">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default modify" tkid="<?php echo ($vo["tkid"]); ?>">修改</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-default delete" tkid="<?php echo ($vo["tkid"]); ?>">删除</button>
                      </div>
                    </div><?php endforeach; endif; ?>
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