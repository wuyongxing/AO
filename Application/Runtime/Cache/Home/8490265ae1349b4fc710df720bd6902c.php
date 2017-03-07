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
        var index = 1;
        var total = parseInt($('#total').val());
        $('#1').css('display','block');
        $('#progress').html("<h4>1/"+total+"</h4>");
        $('#pre').click(function(){
          if(index == 1) 
            return;
          index--;
          $("next").text("下一题");
          $('#progress').html("<h4>"+index+"/"+total+"</h4>");
          $('#'+ (index)).css('display','block');
          $('#'+ (index + 1)).css('display','none');
        });

        $('#next').click(function(){
          index++;
          if(index == total)
          {
            $(this).text("提交");
          }
          else if(index == (total + 1))
          {
            var score = 0;
            //var pid = [];
            for(var i = 1; i <= total; i++)
            {
              var answer = $('#'+i).attr('answer');
              //pid.push($('#'+i).attr('pid'));
              var res = $('input:radio[name='+i+']:checked').val();
              if(answer == res)
                score++;
            }
            //$.post("/AO/index.php/Home/Test/score",{},function(){});
            $('#problem').css('display','none');
            $('#score').css('display','block');
            var text = "<h2>专项训练</h2><h3>正确题数:"+score+"/"+total+"</h3><h3>得分:"+score*5+"</h3>"
            $('#pingfen').html(text);
            return;
          }
          $('#progress').html("<h4>"+index+"/"+total+"</h4>");
          $('#'+ (index - 1)).css('display','none');
          $('#'+ (index)).css('display','block');
        });

        $('#intocorrect').click(function(){
          $('#score').css('display','none');
          $('#correct').css('display','block');
          cindex = 1;
          $('#c1').css('display','block');
          $('#cprogress').html("<h4>1/"+total+"</h4>");
        });

        $('#cpre').click(function(){
          if(cindex == 1) 
            return;
          cindex--;
          $("cnext").text("下一题");
          $('#cprogress').html("<h4>"+cindex+"/"+total+"</h4>");
          $('#c'+ (cindex)).css('display','block');
          $('#c'+ (cindex + 1)).css('display','none');
        });

        $('#cnext').click(function(){
          if(cindex == total)
            return;
          cindex++;
          $('#cprogress').html("<h4>"+cindex+"/"+total+"</h4>");
          $('#c'+ (cindex - 1)).css('display','none');
          $('#c'+ (cindex)).css('display','block');
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
        <div class="row" id="problem" style="background-color: #fff; margin-top: 1%; height: 700px;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                专项练习
              </h2>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <input type="hidden" id="total" value="<?php echo ($total); ?>">
              <div class="col-md-2 col-md-offset-10" id="progress" style="margin-top: 2%;"></div>
              <?php if(is_array($problem)): foreach($problem as $k=>$val): ?><div class="col-md-12" id="<?php echo ($k+1); ?>" pid="<?php echo ($val["pid"]); ?>" answer="<?php echo ($val["answer"]); ?>" style="display: none; margin-top: 1%; margin-bottom: 5%;">
                  <p><?php echo ($val["content"]); ?></p>
                  <input type="radio" name="<?php echo ($k+1); ?>" value="A"><?php echo ($val["a"]); ?><br>
                  <input type="radio" name="<?php echo ($k+1); ?>" value="B"><?php echo ($val["b"]); ?><br>
                  <input type="radio" name="<?php echo ($k+1); ?>" value="C"><?php echo ($val["c"]); ?><br>
                  <input type="radio" name="<?php echo ($k+1); ?>" value="D"><?php echo ($val["d"]); ?><br>  
                </div><?php endforeach; endif; ?>
            </div>
            <div class="col-md-12" style="margin-top: 1%; margin-left: 42%;">
            <button id="pre" class="btn btn-primary">上一题</button>
            <button id="next" class="btn btn-primary">下一题</button>
          </div>
        </div>

        <div class="row" id="score" style="background-color: #fff; margin-top: 1%; height: 700px; display:none;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                专项练习
              </h2>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px;">
              <div class="col-md-6" id="pingfen" style="padding:5% 0% 0% 15%;"></div>
              <div class="col-md-6" style="padding-left:10%;"><img src="/AO/Public/img/problemdata.png"></div>
            </div>
            <div class="col-md-12" style="margin-top: 1%; margin-left: 45%;">
            <button id="intocorrect" class="btn btn-primary">查看答案</button>
          </div>
        </div>

        <div class="row" id="correct" style="background-color: #fff; margin-top: 1%; height: 700px; display:none;">
            <div class="col-md-12" style="text-align: center;">
              <h2>
                专项练习
              </h2>
            </div>
            <div class="col-md-8 col-md-offset-2" style="border: 2px solid #ddd; border-radius: 10px; padding-left: 3%;">
              <div class="col-md-2 col-md-offset-10" id="cprogress" style="margin-top: 2%;"></div>
              <?php if(is_array($problem)): foreach($problem as $k=>$val): ?><div class="col-md-12" id="c<?php echo ($k+1); ?>" pid="<?php echo ($val["pid"]); ?>" answer="<?php echo ($val["answer"]); ?>" style="display: none; margin-top: 1%; margin-bottom: 5%;">
                  <p><?php echo ($val["content"]); ?></p>
                  <?php if($val["answer"] == A): ?><input type="radio" name="c<?php echo ($k + 1); ?>" checked="checked"><?php echo ($val["a"]); ?><br>
                  <?php else: ?>
                    <input type="radio" name="c<?php echo ($k + 1); ?>"><?php echo ($val["a"]); ?><br><?php endif; ?>
                  <?php if($val["answer"] == B): ?><input type="radio" name="c<?php echo ($k + 1); ?>" checked="checked"><?php echo ($val["b"]); ?><br>
                  <?php else: ?>
                    <input type="radio" name="c<?php echo ($k + 1); ?>"><?php echo ($val["b"]); ?><br><?php endif; ?>
                  <?php if($val["answer"] == C): ?><input type="radio" name="c<?php echo ($k + 1); ?>" checked="checked"><?php echo ($val["c"]); ?><br>
                  <?php else: ?>
                    <input type="radio" name="c<?php echo ($k + 1); ?>"><?php echo ($val["c"]); ?><br><?php endif; ?>
                  <?php if($val["answer"] == D): ?><input type="radio" name="c<?php echo ($k + 1); ?>" checked="checked"><?php echo ($val["d"]); ?><br>
                  <?php else: ?>
                    <input type="radio" name="c<?php echo ($k + 1); ?>"><?php echo ($val["d"]); ?><br><?php endif; ?>  
                </div><?php endforeach; endif; ?>
            </div>
            <div class="col-md-12" style="margin-top: 1%; margin-left: 42%;">
            <button id="cpre" class="btn btn-primary">上一题</button>
            <button id="cnext" class="btn btn-primary">下一题</button>
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