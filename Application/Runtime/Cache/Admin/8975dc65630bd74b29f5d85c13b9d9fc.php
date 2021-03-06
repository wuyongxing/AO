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
            $(".delete").click(function(){
                var ok = confirm("确认删除?");
                if(!ok) return;
                var cid = $(this).val();
                $.post("/AO/index.php/Admin/Knowledge/deletecomment",{'cid':cid},function(data){
                    if(data == 0)
                        alert("删除失败");
                    else
                    {
                        alert("删除成功");
                        var aid = $("#aid").val();
                        var akid = $('#akid').val();
                        window.location.href="/AO/index.php/Admin/Knowledge/article?aid="+aid+"&akid="+akid;
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
        </div>
        
        <div class="row" style="background-color: #fff; margin-top: 1%; padding-top: 1%; padding-bottom: 1%;">
            <div class="col-md-8 col-md-offset-2" style="padding: 1% 1% 1% 1%;">
                <div class="col-md-12" style="border: 2px solid #ddd">
                    <input type="hidden" id="akid" value="<?php echo ($article["akid"]); ?>">
                    <input type="hidden" id="aid" value="<?php echo ($article["aid"]); ?>">
                    <div class="col-md-12">
                        <h3 style="text-align: center;"><?php echo ($article["title"]); ?></h3>
                    </div>
                    <div class="col-md-12">
                        <h4 style="text-align: center;"><?php echo ($article["date"]); ?> </h4>
                    </div>
                    <div class="col-md-12">
                        <h4 style="text-align: center;"><?php echo ($article["clicknum"]); ?>人浏览</h4>
                    </div>
                    <div class="col-md-12" style="margin-top: 2%;">
                        <p><?php echo ($article["content"]); ?></p>
                    </div>
                    <div class="col-md-12">
                        <hr>                        
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <h4>评论区</h4>
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                    </div>
                    <div id="comment" class="col-md-12">
                        <?php if(is_array($comment)): foreach($comment as $key=>$val): ?><div class="col-md-10">
                            <hr>
                            <?php echo ($val["username"]); ?> <?php echo ($val["date"]); ?>
                            <br>
                            <?php echo ($val["content"]); ?>
                        </div>
                        <div class="col-md-2" style="margin-top: 5%;">
                            <button type="button" class="btn btn-default delete" value="<?php echo ($val["cid"]); ?>">删除</button>
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