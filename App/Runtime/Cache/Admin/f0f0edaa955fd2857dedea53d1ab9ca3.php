<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link href="/Public/Admin/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<title>后台登录</title>
</head>
<body>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" type="text" placeholder="请输入您的用户名" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" type="password" placeholder="请输入您的密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60c;</i></label>
        <div class="formControls col-xs-8">
          <input class="input-text size-L" id="code" placeholder="请输入验证码" style="width:150px;">
          <img src="<?php echo U('code');?>" onclick='this.src=this.src+"?c="+Math.random()' style="height: 40px;margin-left: 65px">
          </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input type="button" class="btn btn-success radius size-L tj" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" style="margin-left: 100px">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright  by Djt_sunshine</div>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>

</body>
</html>
<script type="text/javascript">
    $('.tj').click(function(){
      var username = $('#username').val();
      var password = $('#password').val();
      var code = $('#code').val();
      if(!username){
        layer.alert('请输入您的用户名！');
        return;
      }
      if(!password){
        layer.alert('请输入密码！');
        return;
      }
      if(!code){
        layer.alert('请输入验证码！');
        return;
      }
      $.ajax({url:"<?php echo U('index');?>",type:"post",data:{'name':username,'password':password,'code':code},success:function(res){
          if(res.code == 1){
              layer.msg(res.msg, {
              icon: 1,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            }, function(){
              window.location.href="http://www.checkclass.com/admin.php/index/index";
            }); 
          }else if(res.code == 2){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }else if(res.code == 3){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }else if(res.code == 4){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }
        }}); 
    });
</script>