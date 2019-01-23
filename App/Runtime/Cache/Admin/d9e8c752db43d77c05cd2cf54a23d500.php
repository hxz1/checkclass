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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎您,<?php echo (session('name')); ?></p>
	<p>当前登录IP：<?php echo ($ip); ?></p>
	<p>登录次数：<?php echo ($data['login_times']); ?></p>
	<p>上次登录时间：<?php echo date("Y-m-d H:i:s",$data['last_login_time']) ?></p>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="4" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>服务器操作系统</td>
				<td style="color: red"><span id="lbServerName"><?php echo PHP_OS ?></span></td>
				<td>服务器域名/IP</td>
				<td style="color: red"><?php echo $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]' ?></td>
			</tr>
			<tr>
				<td>Web 服务器</td>
				<td style="color: red"><?php echo $_SERVER["SERVER_SOFTWARE"] ?></td>
				<td>PHP 版本</td>
				<td style="color: red"><?php echo PHP_VERSION ?></td>
			</tr>
			<tr>
				<td>安全模式 </td>
				<td style="color: red"><?php echo (boolean) ini_get('safe_mode') ? 是: 否 ?></td>
				<td>执行时间限制</td>
				<td style="color: red"><?php echo ini_get('max_execution_time') . '秒' ?></td>
			</tr>
			<tr>
				<td>系统开发</td>
				<td style="color: red">ThinkPHP3.2.3 框架 </td>
				<td>服务器当前时间 </td>
				<td style="color: red"><?php echo date("Y-m-d H:i:s",time()) ?></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th colspan="4" scope="col">开发团队</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="4" style="color: red">sunshine_djt &nbsp&nbsp&nbsp 14计科2班揭锦涛</td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
</body>
</html>