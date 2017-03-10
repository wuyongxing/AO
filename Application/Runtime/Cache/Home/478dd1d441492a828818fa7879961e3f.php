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
     <script type="text/javascript" src="/AO/Public/js/laydate.dev.js"></script>
    <script>
      $(document).ready(function(){
          $("#submit").click(function(){
              var arr = $('#taskinfo').serialize();
              $.post("/AO/index.php/Home/Project/addSubProject",arr,function(data){
                if(data == 1)
                {
                  alert("新增、修改成功");
                  window.location.href="/AO/index.php/Home/Project/subProject?pid="+$('#pid').val();
                }
                else
                  alert("新增、修改失败");
              });
          });
          $('.add').click(function(){
            $('#spid').val("");
            $('#status').val("");
            $('#title').val("");
            $('#time').val("");
            $('#start').val("");
            $('#end').val("");
            $('#ueid').val("");
            $('#feid').val("");
            $('#rdid').val("");
            $('#qaid').val("");
            $('#content').val("");
          });
          $('.modify').click(function(){
            var pid = $(this).val();
            $('#spid').val($("#"+pid+'spid').text());
            $('#status').val($("#"+pid+'status').attr("value"));
            $('#title').val($("#"+pid+'title').text());
            $('#time').val($("#"+pid+'time').text());
            $('#start').val($("#"+pid+'start').text());
            $('#end').val($("#"+pid+'end').text());
            $('#ueid').val($("#"+pid+'ueid').val());
            $('#feid').val($("#"+pid+'feid').val());
            $('#rdid').val($("#"+pid+'rdid').val());
            $('#qaid').val($("#"+pid+'qaid').val());
            $('#content').val($("#"+pid+'content').val());
          });

          $(".addPerson").click(function(){
            var uid = prompt("输入要加入的参与人的工号:");
            var pid = $("#pid").val();
            $.post("/AO/index.php/Home/Project/addPerson",{'uid':uid,'pid':pid},function(data){
              if(data == 0)
                alert("添加失败");
              else
              {
                alert("添加成功");
                window.location.href="/AO/index.php/Home/Project/subProject?pid="+pid;
              }
            });
          });

          $(".deletePerson").click(function(){
            var uid = prompt("输入要删除的参与人的工号:");
            var pid = $("#pid").val();
            $.post("/AO/index.php/Home/Project/deletePerson",{'uid':uid,'pid':pid},function(data){
              if(data == 0)
                alert("删除失败");
              else
              {
                alert("删除成功");
                window.location.href="/AO/index.php/Home/Project/subProject?pid="+pid;
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
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Project/index">我的项目</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Project/weekTask">本周任务</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Project/todayOnline">今日待上线</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Project/todayOnlined">今日已上线</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-8">
              <h3 style="margin-left: 66%;">
                <?php echo ($project["content"]); ?>
              </h3>
            </div>
           
            <div class="col-md-4" style="margin-top: 2%;">
              <?php if($pkid == 5): ?><button class="btn btn-default addPerson">新增参与人</button>
                <button class="btn btn-default deletePerson">删除参与人</button>
                <button class="btn btn-default add" data-toggle="modal" data-target="#myModal">新建任务卡</button><?php endif; ?>
            </div>
            <div class="col-md-12" style="text-align: center;">参与人:<?php echo ($person); ?></div>
            <div class="col-md-10 col-md-offset-1" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <table class="table table-hover">
                <tr>
                  <td>id</td>
                  <td>任务卡</td>
                  <td>起始时间</td>
                  <td>结束时间</td>
                  <td>估点</td>
                  <td>状态</td>
                  <td>负责人</td>
                  <td>创建时间</td>
                  <?php if($pkid == 5): ?><td>修改</td><?php endif; ?>
                </tr>
                <?php if(is_array($subproject)): foreach($subproject as $key=>$val): ?><tr>
                  <td id="<?php echo ($val["spid"]); ?>spid"><?php echo ($val["spid"]); ?></td>
                  <td><a href="/AO/index.php/Home/Project/task?spid=<?php echo ($val["spid"]); ?>" id="<?php echo ($val["spid"]); ?>title" target="_blank"><?php echo ($val["title"]); ?></a></td>
                  <td id="<?php echo ($val["spid"]); ?>start"><?php echo ($val["start"]); ?></td>
                  <td id="<?php echo ($val["spid"]); ?>end"><?php echo ($val["end"]); ?></td>
                  <td id="<?php echo ($val["spid"]); ?>time"><?php echo ($val["time"]); ?></td>
                  <td id="<?php echo ($val["spid"]); ?>status" value="<?php echo ($val["status"]); ?>"><?php if($val["status"] == 63): ?>已上线<?php elseif($val["status"] == 0): ?>需求池<?php else: ?>开发中<?php endif; ?></td>
                  <input type="hidden" id="<?php echo ($val["spid"]); ?>ueid" value="<?php echo ($val["ueid"]); ?>">
                  <input type="hidden" id="<?php echo ($val["spid"]); ?>feid" value="<?php echo ($val["feid"]); ?>">
                  <input type="hidden" id="<?php echo ($val["spid"]); ?>rdid" value="<?php echo ($val["rdid"]); ?>">
                  <input type="hidden" id="<?php echo ($val["spid"]); ?>qaid" value="<?php echo ($val["qaid"]); ?>">
                  <input type="hidden" id="<?php echo ($val["spid"]); ?>content" value="<?php echo ($val["content"]); ?>">
                  <td><?php echo ($val["username"]); ?></td>
                  <td id="<?php echo ($val["spid"]); ?>date"><?php echo (date("Y-m-d H:i:s",$val["date"])); ?></td>
                   <?php if($pkid == 5): ?><td><button class="btn btn-default modify" data-toggle="modal" value="<?php echo ($val["spid"]); ?>" data-target="#myModal">修改</button>
                  </td><?php endif; ?>
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
            <h4 class="modal-title" id="myModalLabel">新增、修改任务卡</h4>
          </div>
          <div class="col-md-12" style="padding: 2% 1% 2% 1%;">
            <form class="form-horizontal" id="taskinfo">
              <input type="hidden" id="spid" name="spid">
              <input type="hidden" id="status" name="status">
               <input type="hidden" id="pid" name="pid" value="<?php echo ($project["pid"]); ?>">
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-4 control-label">标题</label>
                <div class="col-sm-8">
                  <input type="text" id="title" name="title" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-4 control-label">估点</label>
                <div class="col-sm-8">
                  <input type="text" id="time" name="time" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">起始时间</label>
                <div class="col-sm-6">
                  <input type="text" id="start" name="start" class="form-control" onclick="laydate()">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">结束时间</label>
                <div class="col-sm-6">
                  <input type="text" id="end" name="end" class="form-control" onclick="laydate()">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">UE工号</label>
                <div class="col-sm-6">
                  <input type="text" id="ueid" name="ueid" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">FE工号</label>
                <div class="col-sm-6">
                  <input type="text" id="feid" name="feid" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">RD工号</label>
                <div class="col-sm-6">
                  <input type="text" id="rdid" name="rdid" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">QA工号</label>
                <div class="col-sm-6">
                  <input type="text" id="qaid" name="qaid" class="form-control">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">内容</label>
                <div class="col-sm-6">
                  <textarea id="content" name="content" style="width:360px; height:130px;"></textarea>
                </div>
              </div>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" id="submit" class="btn btn-primary">提交</button>
          </div>
        </div>
      </div>
    </div>
</body>