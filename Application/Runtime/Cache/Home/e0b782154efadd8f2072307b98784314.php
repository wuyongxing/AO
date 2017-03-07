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
            $("#submit").click(function(){
                var aid = $("#aid").val();
                var content = $('#submitcomment').val();
                var akid = $('#akid').val();
                $.post("/AO/index.php/Home/Knowledge/comment",{'aid':aid,'content':content,'akid':akid},function(data){
                    if(data == 0)
                        alert("评论失败");
                    else
                    {
                        alert("评论成功");
                        $('#myModal').modal('hide');
                        var text = '<div class="col-md-12"><hr>'+getNowFormatDate()+'<br>'+content+'</div>';
                        $('#comment').append(text);
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
<body style="background-image: url(/AO/Public/img/bg.png);background-repeat:no-repeat; background-size: 100% 100%">
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
        
        <div class="row" style="background-color: #fff; margin-top: 1%; padding-top: 1%; padding-bottom: 1%;">
            <div class="col-md-3" style="padding: 1% 1% 1% 1%;">
                <div class="col-md-12" style="border: 2px solid #ddd;">
                    <div class="col-md-6" style="background-image: url(<?php echo ($user["pic"]); ?>);background-repeat:no-repeat; background-size: 100% 100%; height: 120px; margin-top: 3%;">
                    </div>
                    <div class="col-md-6" style="margin-top: 28%;">
                        <h4>姓名:<?php echo ($user["username"]); ?></h4>
                        <h4>提问总数:<?php echo ($total); ?></h4>
                        <h4>回答总数:<?php echo ($totalnum); ?></h4>
                    </div>
                    <div class="col-md-12">
                        <h3 style="text-align: center;">他的热门提问</h3>
                    </div>
                    <?php if(is_array($articleList)): foreach($articleList as $key=>$val): ?><div class="col-md-12" style="margin-top: 1%;">
                            <a href="/AO/index.php/Home/Knowledge/seeask?aid=<?php echo ($val["aid"]); ?>"><?php echo ($val["title"]); ?>(<?php echo ($val["clicknum"]); ?>)</a>
                        </div><?php endforeach; endif; ?>

                    <div class="col-md-12">
                        <h3 style="text-align: center;">他的回答</h3>
                    </div>
                    <?php if(is_array($commentList)): foreach($commentList as $key=>$val): ?><div class="col-md-12" style="margin-top: 1%; overflow: hidden; height:20px;">
                            <a href="/AO/index.php/Home/Knowledge/seeask?aid=<?php echo ($val["aid"]); ?>"><?php echo ($val["content"]); ?></a>
                        </div><?php endforeach; endif; ?>

                </div>
            </div>
            <div class="col-md-7" style="padding: 1% 1% 1% 1%;">
                <div class="col-md-12" style="border: 2px solid #ddd">
                    <input type="hidden" id="akid" value="<?php echo ($article["akid"]); ?>">
                    <div class="col-md-12">
                        <h3 style="text-align: center;"><?php echo ($article["title"]); ?></h3>
                    </div>
                    <div class="col-md-12">
                        <h4 style="text-align: center;"><?php echo ($article["date"]); ?> </h4>
                    </div>
                    <div class="col-md-12">
                        <h4 style="text-align: center;"><?php echo ($article["clicknum"]); ?>个回答</h4>
                    </div>
                    <div class="col-md-12" style="margin-top: 2%;">
                        <p><?php echo ($article["content"]); ?></p>
                    </div>
                    <div class="col-md-12">
                        <hr>                        
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <h4>讨论区</h4>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">发布讨论</button>
                        </div>
                    </div>
                    <div id="comment" class="col-md-12">
                        <?php if(is_array($comment)): foreach($comment as $key=>$val): ?><div class="col-md-12">
                            <hr>
                            <?php echo ($val["date"]); ?>
                            <br>
                            <?php echo ($val["content"]); ?>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">评论</h4>
          </div>
          <div class="modal-body">
            <textarea id="submitcomment" style="width:550px; height:130px;"></textarea>
            <input type="hidden" id="aid" value="<?php echo ($article["aid"]); ?>">
          </div>
          <div class="modal-footer">
            <button type="button" id="submit" class="btn btn-primary">提交</button>
          </div>
        </div>
      </div>
    </div>
</body>