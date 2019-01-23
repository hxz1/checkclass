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
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layer/2.4/skin/layer.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layui/css/layui.css" />
<style type="text/css">
.pagination a {text-decoration: none;border: solid 1px;	}
.pagination .pxofy{float:left;margin-left: 5px;height:25px;*padding-top:1px;}	
.pagination a, .pagination span {display: block;float: left;line-height:24px;padding:0 9px;border-radius:2px;margin-right: 5px;font-family:Arial, Helvetica, sans-serif !important;}
.pagination .current {cursor:default;border: solid 1px ;}
.pagination .prev, .pagination .next{*line-height:22px;}

/*分页样式*/
.pagination a{color: #000000;border-color:#8EB2D2; background:#eaf4fa;}
.pagination a:hover{color:#023054;border-color:#8EB2D2;background:#B8DFFB;}
.pagination .current{color:#fff;border-color:#4ea052;background:#5ebc62;}
.pagination .current.prev, .pagination .current.next{color:#B9B9B9;border-color:#D3D3D3;background:#fff;}
.pagination .pxofy{color: #023054;}

.pagination{ margin-top:10px;padding:0 10px;}
.pagination .pxofy{float:left;color:#6c6c6c;margin-left: -12px;}
.pagination .pagin-list{float:right;}
.pagination .goto{float:right;margin-left:10px;}
.pagination .goto .text{padding:0;}
.pagination .goto input[type=text]{float:left;width:25px;height:22px;border:1px solid #8EB2D2;outline:none; text-align:center;}
</style>
<title>修改密码</title>
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red" data-id="<?php echo ($data["id"]); ?>">*</span>账户：</label>
			<div class="formControls col-xs-8 col-sm-9"> <?php echo ($data["name"]); ?> </div>
		</div>

		<div class="layui-form-item">
    <div class="row cl">
    <label class="form-label col-xs-4 col-sm-3">&nbsp;权限：</label>
      	<label><input name="role" type="radio" value="1" <?php if($data["role_id"] == 1): ?>checked<?php endif; ?> />超级管理员</label> <br>
		<label><input name="role" type="radio" value="2" <?php if($data["role_id"] == 2): ?>checked<?php endif; ?>/>普通管理员</label> <br>
		<!-- <label style="margin-left: 150px;"><input name="role" type="checkbox" value="3" />选课情况管理 </label> <br>
		<label style="margin-left: 150px;"><input name="role" type="checkbox" value="4" />课程管理 </label> <br>
		<label style="margin-left: 150px;"><input name="role" type="checkbox" value="5" />系统管理 </label> <br> -->
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
		var id = $('.c-red').data('id');
		text = $("input:radio[name='role']:checked").val();
		$.ajax({url:"<?php echo U('role');?>",type:"post",data:{'role_id':text,'id':id},success:function(res){
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