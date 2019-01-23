<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />

<link rel="stylesheet" type="text/css" href="/CheckClass/Public/Admin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/CheckClass/Public/Admin/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/CheckClass/Public/Admin/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/CheckClass/Public/Admin/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/CheckClass/Public/Admin/h-ui.admin/css/style.css" />
<title>修改信息</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学生姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($data["stu_name"]); ?>" data-id="<?php echo ($data["id"]); ?>" id="stu_name" name="stu_name">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($data["class_name"]); ?>" id="class_name" name="class_name">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教师姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($data["tea_name"]); ?>" placeholder="请输入邮箱号码" name="tea_name" id="tea_name">
		</div>
	</div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius tj" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

</body>
</html>
<script type="text/javascript" src="/CheckClass/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/CheckClass/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/CheckClass/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/CheckClass/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/CheckClass/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
	$('.tj').click(function(){
		var stu_name = $('#stu_name').val();
		var id = $('#stu_name').data('id');
		var class_name = $('#class_name').val();
		var tea_name = $('#tea_name').val();
		$.ajax({url:"<?php echo U('edit');?>",type:"post",data:{'id':id,'stu_name':stu_name,'class_name':class_name,'tea_name':tea_name},success:function(res){
		 		if(res.code == 1){
		 			layer.msg('修改成功！', {
					  icon: 1,
					  time: 1000 //1秒关闭（如果不配置，默认是3秒）
					}, function(){
					  parent.location.reload();
					});    
		 		}else if(res.code == 2){
		 			layer.msg(res.msg,{icon: 2,time: 1000});
		 		}
	    	}}); 
	});

</script>