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
<title>教师列表</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 教师管理 <span class="c-gray en">&gt;</span> 教师列表 
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
			<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
		</a> 
		<a href="javascript:;" onclick="member_add('添加教师','<?php echo U('add');?>','450','410')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加教师
		</a>
	</span> 
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">教工号</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="90">姓名</th>
				<th width="90">邮箱</th>
				<th width="130">创建时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" class="dels"></td>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["teach_id"]); ?></td>
				<td><?php echo ($vo["sex"]); ?></td>
				<td><?php echo ($vo["phone"]); ?></td>
				<td><?php echo ($vo["realname"]); ?></td>
				<td><?php echo ($vo["email"]); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
				<?php if($vo['status'] == 1): ?><td class="td-status">
				<span class="label label-success radius">已启用</span>
				</td>
				<?php else: ?>
				<td class="td-status">
				<span class="label label-dangerous radius">已禁用</span>
				</td><?php endif; ?>
				<td class="td-manage">
				<?php if($vo['status'] == 1): ?><a style="text-decoration:none" onClick="status_stop(this,<?php echo ($vo[id]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
				<?php else: ?>
				<a style="text-decoration:none" onClick="status_start(this,<?php echo ($vo[id]); ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe631;</i></a><?php endif; ?>
				<a title="编辑" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" onclick="member_edit('编辑','http://www.checkclass.com/admin.php/teacher/edit/id/<?php echo ($vo["id"]); ?>','470','360')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6df;</i>
				</a>
				<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','http://www.checkclass.com/admin.php/teacher/change_password/id/<?php echo ($vo["id"]); ?>',<?php echo ($vo["id"]); ?>,'400','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> 
				<a title="删除" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="ml-5 del" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6e2;</i>
				</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="pagination ue-clear">
    <div class="pagin-list">
        <?php echo ($show); ?>
    </div>
    <div class="pxofy">显示第 1 条到 <?php echo ($count); ?>条记录，总共<?php echo ($count); ?>条记录</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}

/*用户-禁用*/
function status_stop(obj,id){
	var id =id;
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U('status_stop');?>',
			dataType: 'json',
			data:{'id':id},
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="status_start(this,<?php echo ($vo[id]); ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				layer.msg('修改失败!',{icon: 2,time:1000});
			},
		});		
	});
}
/*用户-启用*/
function status_start(obj,id){
	var id =id;
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U('status_start');?>',
			dataType: 'json',
			data:{'id':id},
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="status_stop(this,<?php echo ($vo[id]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				layer.msg('修改失败!',{icon: 2,time:1000});
			},
		});
	});
}

/*用户-编辑*/
function member_edit(title,url,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
$('.del').click(function(){
	var id = $(this).data('id');
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type:'post',
			url: '<?php echo U('del');?>',
			dataType: 'json',
			data:{'id':id},
			success: function(res){
				if(res.code == 1){
					layer.alert('删除成功!', function(index){
					  window.location.reload();
					});  	
				}else{
					layer.msg('删除失败!',{icon:1000});
				}	
			},
		});		
	});
});

function datadel(){
	var obj = $('.dels');
	check_val = [];
    for(k in obj){
        if(obj[k].checked)
            check_val.push(obj[k].value);
    }
    var id_str = check_val.join(",");
    layer.confirm('确认要删除吗？',function(index){
    	$.ajax({url:"<?php echo U('batch_del');?>",type:"post",data:{'id_str':id_str},success:function(res){
	 		if(res.code == 1){
	 			layer.alert(res.msg, function(index){
				  window.location.reload();
				}); 
	 		}else if(res.code == 2){
	 			layer.msg(res.msg,{icon:2});
	 		}
    	}}); 
    });  
}
</script>