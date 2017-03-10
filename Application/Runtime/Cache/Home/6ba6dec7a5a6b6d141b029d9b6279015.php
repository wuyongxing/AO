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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/3.4.0/echarts.js"></script>
    <script>
      $(document).ready(function(){
          var myChart = echarts.init(document.getElementById('main'));
          var status = parseInt($("#status").val());
          var lineColor = [];
          var pointColor = [];
          for(var i = 0; i < 7; i++)
          {
            lineColor[i] = '#ddd';
            pointColor[i] = '#ddd';
          }
          lineColor[0] = '#00448D';
          lineColor[1] = '#00448D';
          pointColor[0] = '#00448D';
          if(status & 1)
          {
            lineColor[2] = '#00448D';
            pointColor[1] = '#00448D';
          }
          if(status & 2)
          {
            lineColor[3] = '#00448D';
            pointColor[2] = '#00448D';
          }
          if(status & 4)
          {
            lineColor[4] = '#00448D';
            pointColor[3] = '#00448D';
          }
          if(status & 8)
          {
            lineColor[5] = '#00448D';
            pointColor[4] = '#00448D';
          }
          if(status & 16)
          {
            lineColor[6] = '#00448D';
            pointColor[5] = '#00448D';
          }
          if(status & 32)
          {
            pointColor[6] = '#00448D';
          }
          option = {
              title: {
                  text: '进度状态'
              },
              series : [
                  {
                      type: 'graph',
                      layout: 'none',
                      symbolSize: 100,
                      label: {
                          normal: {
                              show: true
                          }
                      },
                      data: [
                      {
                          name: '需求池',
                          x: 0,
                          y: 440,
                          itemStyle:{
                              normal:{
                                  color: pointColor[0]
                              }
                          }
                      },
                      {
                          name: 'UE',
                          x: 150,
                          y: 340,
                          itemStyle:{
                              normal:{
                                  color: pointColor[1]
                              }
                          }
                      },
                      {
                          name: 'RD',
                          x: 150,
                          y: 540,
                          itemStyle:{
                              normal:{
                                  color: pointColor[2]
                              }
                          }
                      },
                      {
                          name: 'FE',
                          x: 300,
                          y: 340,
                          itemStyle:{
                              normal:{
                                  color: pointColor[3]
                              }
                          }
                      },
                      {
                          name: 'QA',
                          x: 450,
                          y: 440,
                          itemStyle:{
                              normal:{
                                  color: pointColor[4]
                              }
                          }
                      },
                      {
                          name: 'PM',
                          x: 600,
                          y: 440,
                          itemStyle:{
                              normal:{
                                  color: pointColor[5]
                              }
                          }
                      },
                      {
                          name: '已上线',
                          x: 750,
                          y: 440,
                          itemStyle:{
                              normal:{
                                  color: pointColor[6]
                              }
                          }
                      }
                      ],
                      // links: [],
                      links: [{
                          source: 0,
                          target: 1,
                          lineStyle: {
                              normal: {
                                  color: lineColor[0],
                              }
                          }
                      },{
                          source: 0,
                          target: 2,
                          lineStyle: {
                              normal: {
                                  color: lineColor[1],
                              }
                          }
                      }, {
                          source: 1,
                          target: 3,
                          lineStyle: {
                              normal: {
                                  color: lineColor[2],
                              }
                          }
                      },{
                          source: 2,
                          target: 4,
                          lineStyle: {
                              normal: {
                                  color: lineColor[3],
                              }
                          }
                      },{
                          source: 3,
                          target: 4,
                          lineStyle: {
                              normal: {
                                  color: lineColor[4],
                              }
                          }
                      },{
                          source: 4,
                          target: 5,
                          lineStyle: {
                              normal: {
                                  color: lineColor[5],
                              }
                          }
                      },{
                          source: 5,
                          target: 6,
                          lineStyle: {
                              normal: {
                                  color: lineColor[6],
                              }
                          }
                      }],
                      lineStyle: {
                          normal: {
                              opacity: 0.9,
                              width: 2,
                              curveness: 0
                          }
                      }
                  }
              ]
          };
          myChart.setOption(option);

          var pkid = $('#pkid').val();
          var text;
          if(pkid == 1)
            text = 'UE'
          else if(pkid == 2)
            text = 'FE';
          else if(pkid == 3)
            text = 'RD';
          else if(pkid == 4)
            text = 'QA';
          else if(pkid == 5)
            text = 'PM';
          text += '确认';
          $('#modify').text(text);
          $('#modify').click(function(){
            var spid = $('#spid').val();
            var pkid = $('#pkid').val();
            $.post('/AO/index.php/Home/Project/modifystatus',{'spid':spid,'pkid':pkid},function(data){
              if(data == 0)
                alert("确认失败");
              else
              {
                alert("确认成功");
                window.location.href="/AO/index.php/Home/Project/task?spid="+ spid;
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
        <div class="row" style="background-color: #fff; margin-top: 1%; padding-bottom: 2%;">
            <div class="col-md-12">
              <h3 style="text-align: center;">
                任务卡:<?php echo ($subproject["title"]); ?>
              </h3>
            </div>
            <div class="col-md-10 col-md-offset-1" style="border: 2px solid #ddd; border-radius: 10px; padding: 2% 0% 2% 0%">
              <div id="main" style="width: 100%;height:400px;"></div>
              <input type="hidden" id="status" value="<?php echo ($subproject["status"]); ?>">
              <input type="hidden" id="spid" value="<?php echo ($subproject["spid"]); ?>">
              <input type="hidden" id="pkid" value="<?php echo ($pkid); ?>">
              <div class="col-md-12" style="text-align: center;"><button class="btn btn-primary" id="modify"></button></div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-12">
                <h4><strong>负责人</strong></h4>
              </div>
              <div class="col-md-12">
                UE:<?php echo ($subproject["uename"]); ?><br>
                FE:<?php echo ($subproject["fename"]); ?><br>
                RD:<?php echo ($subproject["rdname"]); ?><br>
                QA:<?php echo ($subproject["qaname"]); ?><br>
                PM:<?php echo ($subproject["pmname"]); ?><br>
              </div>
              <div class="col-md-12">
                <h4><strong>开发内容</strong></h4>
              </div>
              <div class="col-md-12">
                <?php echo ($subproject["content"]); ?>
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