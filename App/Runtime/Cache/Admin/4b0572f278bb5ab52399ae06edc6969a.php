<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />

<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layer/2.4/skin/layer.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layui/css/layui.css" />
<title>修改密码</title>
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教工号：</label>
			<div class="formControls col-xs-8 col-sm-9"> <?php echo ($data["teach_id"]); ?> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" data-id=<?php echo ($data["id"]); ?> autocomplete="off" placeholder="请输入新密码！" name="newpassword" id="newpassword">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" placeholder="请再次输入密码" name="newpassword2" id="newpassword2">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" id="tj" type="button" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

</body>
</html>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
	$('#tj').click(function(){
		var id = $('#newpassword').data('id');
		var newpassword = $('#newpassword').val();	
		var newpassword2 = $('#newpassword2').val();
		if(!newpassword){
			layer.msg("请输入新密码！");
			return;
		}
		if(newpassword !=newpassword2){
			layer.msg("两次输入密码不一致！");
			return;
		}
		$.ajax({url:"<?php echo U('change_password');?>",type:"post",data:{'id':id,'newpassword':newpassword,'newpassword2':newpassword2},success:function(res){
		 		if(res.code == 1){  
					layer.msg('修改成功！', {
					  icon: 1,
					  time: 1000 //1秒关闭（如果不配置，默认是3秒）
					}, function(){
					  parent.location.reload();
					});   
		 		}else if(res.code == 2){
		 			layer.msg('修改失败！',{icon: 2,time: 1000});
		 		}
	    	}}); 
	});

</script>