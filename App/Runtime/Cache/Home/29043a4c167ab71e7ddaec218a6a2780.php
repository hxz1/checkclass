<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>学生网上选课系统</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Home/images/login.js"></script>
<link href="/Public/Home/css/login2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>学生网上选课系统</h1>

<div class="login" style="margin-top:50px;">
    
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
			<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>    
  
    
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 290px;">    
            <!--登录-->
            <div class="web_login" id="web_login">
               <div class="login-box">
                <li>
                
			<div class="login_form">
				<form action="" id="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post">
                <!-- <input type="hidden" name="did" value="0"/> -->
                <div style="margin-top: -28px;font-size: 16px;margin-left: 18px;">
                <span>请选择您的身份</span>
                <input type="radio" name="identity" value="1" checked="checked">学生
                <input type="radio" name="identity" value="2">老师
                </div>
               <!-- <input type="hidden" name="to" value="log"/> -->
                <div class="uinArea" id="uinArea" style="margin-top: 11px">
                <label class="input-tips" for="u">帐&nbsp;&nbsp;&nbsp;号：</label>
                <div class="inputOuter" id="uArea">
                    <input type="number" id="username" class="inputstyle" placeholder="请输入您的学号或教工号" />
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">密&nbsp;&nbsp;&nbsp;码：</label> 
               <div class="inputOuter" id="pArea">
                    <input type="password" id="password" class="inputstyle" placeholder="请输入密码" />
                </div>
                </div>
                <label class="input-tips">验证码:</label>

                <input type="text" id="code" class="inputstyle" style="height: 42px;margin-top: 8px;width: 108px;position: relative;top: 15px;">
                <img src="<?php echo U('code');?>" onclick='this.src=this.src+"?c="+Math.random()' style="height: 42px;margin-left: 189px;margin-top: -29px;width: 84px;">
                <div style="width: 100%;text-align:center;position: relative;top: 8px;"><input type="button" id="deng" value="登 录" style="width:150px; float: initial;" class="button_blue"/></div>
              </form>
           </div>
           
            	</div>
               
            </div>
            <!--登录end-->
  </div>

  <!--注册-->
    <div class="qlogin" id="qlogin" style="display: none; ">
   
    <div class="web_login">
    <form name="form2" id="regUser" accept-charset="utf-8"  action="" method="post">
	      <!-- <input type="hidden" name="to" value="reg"/> -->
		      		       <!-- <input type="hidden" name="did" value="0"/> -->
        <ul class="reg_form" id="reg-ul">
        		<div  class="cue">
                <span>请选择您的身份</span>
                <input type="radio" name="identity1" value="1" checked>学生
                <input type="radio" name="identity1" value="2">老师
                </div>
                <div id="userCue">
                </div>
                <li>
                	
                    <label for="user"  class="input-tips2">用户名：</label>
                    <div class="inputOuter2">
                        <input type="number" id="user" name="username" maxlength="16" class="inputstyle2" placeholder="请输入您的学号或教工号" />
                    </div>
                    
                </li>
                
                <li>
                <label for="passwd" class="input-tips2">密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd"  name="password" maxlength="16" class="inputstyle2" placeholder="密码长度为6~12位"/>
                    </div>
                    
                </li>
                <li>
                <label for="passwd2" class="input-tips2">确认密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd2" name="repassword" maxlength="16" class="inputstyle2" placeholder="请再次输入密码" />
                    </div>
                    
                </li>
                
                <li>
                 <label for="qq" class="input-tips2">手机：</label>
                    <div class="inputOuter2">
                       
                        <input type="text" id="qq" name="qq" maxlength="11" class="inputstyle2" placeholder="请输入正确的手机号"/>
                    </div>
                   
                </li>
                
                <li>
                    <div class="inputArea">
                        <input type="button" id="reg"  style="margin-top:10px;margin-left:86px;width: 150px" class="button_blue" value="注册"/>
                    </div>
                    
                </li><div class="cl"></div>
            </ul></form>
           
    
    </div>
   
    
    </div>
    <!--注册end-->
</div>
</body>
</html>
<script type="text/javascript">
$('#deng').click(function(){
     var username = $('#username').val();
     var password = $('#password').val();
     var code = $('#code').val();
     var identity = $("input[name='identity']:checked").val();
    $.ajax({url:"<?php echo U('index');?>",type:"post",data:{'name':username,'password':password,'code':code,'type':1,'identity':identity},success:function(res){
          if(res.code == 1){
              layer.msg(res.msg, {
              icon: 1,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            }, function(){
              window.location.href="http://www.checkclass.com/index.php";
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
          }else if(res.code == 10){
              layer.msg(res.msg, {
              icon: 1,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            }, function(){
              window.location.href="http://www.checkclass.com/index.php/teacher/index.html";
            }); 
          }
        }}); 
});

$('#reg').on('click',function(){
     var username = $('#user').val();
     var password = $('#passwd').val();
     var password2 = $('#passwd2').val();
     var phone = $('#qq').val();
     var identity = $("input[name='identity1']:checked").val();
     var re = /^1\d{10}$/ ;
     if (username == '') {
      $('#username').focus();
      $('#userCue').html("<font color='red'><b>×用户名不能为空！</b></font>");
      return false;
      } 
      if (password == '') {
      $('#password').focus();
      $('#userCue').html("<font color='red'><b>×密码不能为空！</b></font>");
      return false;
      } 
      if (username == '') {
      $('#username').focus();
      $('#userCue').html("<font color='red'><b>×用户名不能为空！</b></font>");
      return false;
      } 
      if (password.length<6||password.length>12) {
      $('#username').focus();
      $('#userCue').html("<font color='red'><b>×密码长度必须为6~12位！</b></font>");
      return false;
      } 
      if (password != password2) {
      $('#password').focus();
      $('#userCue').html("<font color='red'><b>×两次输入的密码不相同！</b></font>");
      return false;
      } 
     if (!re.test(phone)) {
      $('#qq').focus();
      $('#userCue').html("<font color='red'><b>×手机号格式不正确！</b></font>");
      return false;
      } 
     $.ajax({url:"<?php echo U('index');?>",type:"post",data:{'name':username,'password':password,'phone':phone,'identity':identity,'type':2},success:function(res){
          if(res.code == 1){
              layer.msg(res.msg, {
              icon: 1,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            }, function(){
               location.reload();
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