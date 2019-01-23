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

<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layer/2.4/skin/layer.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/layui/css/layui.css" />
<title>学生列表</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 选课管理 <span class="c-gray en">&gt;</span> 选课列表 
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
			<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
		</a> 
		<a href="javascript:;" onclick="member_add('添加选课','<?php echo U('add');?>','450','370')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加选课
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
				<th width="100">学生名</th>
				<th width="40">课程名</th>
				<th width="90">老师名</th>
				<th width="130">添加时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" class="dels"></td>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["stu_name"]); ?></td>
				<td><?php echo ($vo["class_name"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td>
				<td class="td-manage">
				<a title="编辑" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" onclick="member_edit('编辑','http://www.checkclass.com/admin.php/checkClass/edit/id/<?php echo ($vo["id"]); ?>','470','310')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6df;</i>
				</a>
				<a title="删除" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="ml-5 del" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6e2;</i>
				</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
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

/*用户-编辑*/
function member_edit(title,url,w,h){
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