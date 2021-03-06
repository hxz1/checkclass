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
<title>学生列表</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 新闻管理 <span class="c-gray en">&gt;</span> 新闻列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
			<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
		</a> 
		<a href="javascript:;" onclick="member_add('添加新闻/通知','<?php echo U('add');?>','','510')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加新闻
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
				<th width="100">标题</th>
				<th width="100">作者</th>
				<th width="150">点击量</th>
				<th width="130">添加时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" class="dels"></td>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo ($vo["author"]); ?></td>
				<td><?php echo ($vo["click"]); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
				<td class="td-manage">
				<!-- <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> -->
				<a title="编辑" onclick="member_edit('修改新闻/通知','http://www.checkclass.com/admin.php/news/add/id/<?php echo ($vo["id"]); ?>','600','510')"  class="ml-5" style="text-decoration:none;display: inline;"><i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="查看" style="text-decoration:none;display: inline;" href ='javascript:;' class="ml-5 show" data="<?php echo ($vo["id"]); ?>" data-title="<?php echo ($vo["title"]); ?>"><i class="Hui-iconfont">&#xe616;</i></a>  
				<a title="删除" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="ml-5 del"  style="text-decoration:none;display: inline;"><i class="Hui-iconfont">&#xe6e2;</i></a>
				<!-- <a title="删除" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="ml-5 del" style="text-decoration:none"> -->
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

<script type="text/javascript">
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
$('.show').on('click',function(){
    var id= $(this).attr('data');
    var title=$(this).attr('data-title');
        //iframe层
        layer.open({
            type: 2,
            title: title,
            shadeClose: true,
            shade: 0.5,
            area: ['880px', '90%'],
            content: "http://www.checkclass.com/admin.php/News/showContent/id?id="+id //iframe的url
        });showContent
    });
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
					layer.msg('删除失败!',{icon:2,time:2000});
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
</body>
</html>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>