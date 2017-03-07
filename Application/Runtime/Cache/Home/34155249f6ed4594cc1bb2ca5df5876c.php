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
                var cid = $(this).val();
                $.post("/AO/index.php/Home/Knowledge/deleteask",{'cid':cid},function(data){
                    if(data == 0)
                        alert("删除失败");
                    else
                    {
                        alert("删除成功");
                        window.location.href="/AO/index.php/Home/Knowledge/myask";
                    }
                });
            });
        });
    </script>
    <script>
        function getNowFormatDate() {
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                    + " " + date.getHours() + seperator2 + date.getMinutes()
                    + seperator2 + date.getSeconds();
            return currentdate;
        }

        $(document).ready(function(){
            $('.modify').click(function(){
                var cid = $(this).val();
                var content = $("#"+cid).val();
                $('#submitcomment').val(content);
                $('#ccid').val(cid);
            });
            $("#submit").click(function(){
                var cid = $('#ccid').val();
                var content = $('#submitcomment').val();
                $.post("/AO/index.php/Home/Knowledge/modifycomment",{'cid':cid,'content':content},function(data){
                    if(data == 0)
                        alert("修改失败");
                    else
                    {
                        alert("修改成功");
                        $('#myModal').modal('hide');
                        window.location.href="/AO/index.php/Home/Knowledge/myask";
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
              <li role="presentation"><a href="/AO/index.php/Home/Knowledge/myarticle">我的文章</a></li>
              <li role="presentation" class="active"><a href="/AO/index.php/Home/Knowledge/myask">我的问答</a></li>
              <li role="presentation"><a href="/AO/index.php/Home/Login/logout">注销用户</a></li>
            </ul>
        </div>
        <div class="row" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12">
              <div class="col-md-10" style="padding-left: 46%;">
                  <h3>
                    我的问答
                  </h3>
              </div>
              <div class="col-md-2" style="margin-top: 1%;">
                <button class="btn btn-default"><a href="/AO/index.php/Home/Knowledge/newask" style="text-decoration: none; color:black;">提问</a></button>
              </div>
            </div>
            <div class="col-md-12" >
              <div class="col-md-6" style="border: 2px solid #ddd; border-radius: 10px;">
                <div class="col-md-12">
                    <h4 style="text-align: center;">
                        问题
                    </h4>
                    <table class="table table-hover">
                        <tr>
                            <td>标题</td>
                            <td>时间</td>
                            <td>修改</td>
                            <td>删除</td>
                        </tr>
                        <?php if(is_array($askList)): foreach($askList as $key=>$val): ?><tr>
                            <td><a href="/AO/index.php/Home/Knowledge/seeask?aid=<?php echo ($val["aid"]); ?>" target="_blank"><?php echo ($val["title"]); ?></a></td>
                            <td><?php echo ($val["date"]); ?></td>
                            <td><a href="/AO/index.php/Home/Knowledge/newask?aid=<?php echo ($val["aid"]); ?>" class="btn btn-default" style="text-decoration: none; color:block;">修改</a></td>
                            <td><button class="btn btn-default delete" value="<?php echo ($val["cid"]); ?>">删除</button></td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
              </div>
              <div class="col-md-6" style="border: 2px solid #ddd; border-radius: 10px;">
                <div class="col-md-12">
                    <h4 style="text-align: center;">
                        回答
                    </h4>
                    <table class="table table-hover">
                        <tr>
                            <td>评论</td>
                            <td>时间</td>
                            <td>修改</td>
                            <td>删除</td>
                        </tr>
                        <?php if(is_array($commentList)): foreach($commentList as $key=>$val): ?><tr>
                            <td>
                            <div style="height: 20px; width: 200px; overflow: hidden;"><a href="/AO/index.php/Home/Knowledge/seeask?aid=<?php echo ($val["aid"]); ?>" target="_blank" ><?php echo ($val["content"]); ?></a></div></td>
                            <td><?php echo ($val["date"]); ?></td>
                            <td><button type="button" class="btn btn-default modify" data-toggle="modal" data-target="#myModal" value="<?php echo ($val["cid"]); ?>">修改</button></td>
                            <input type="hidden" id="<?php echo ($val["cid"]); ?>" value="<?php echo ($val["content"]); ?>">
                            <td><button class="btn btn-default delete" value="<?php echo ($val["cid"]); ?>">删除</button></td>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">评论</h4>
          </div>
          <input type="hidden" id="ccid">
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