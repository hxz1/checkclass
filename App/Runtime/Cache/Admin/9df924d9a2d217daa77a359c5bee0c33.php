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
<link rel="stylesheet" type="text/css" href="/Public/Admin/layui/css/layui.css" />
<title>admin</title>
</head>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> 
		<a class="navbar-logo f-l mr-10" style="margin-top: 12px;" href="javascript:;">学生网上选课后台管理系统</a>
		<span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> 
		<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<?php if($_SESSION['role_id']== 1): ?><li>超级管理员</li>
					<?php else: ?>
					<li>普通管理员</li><?php endif; ?>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo (session('name')); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="#">个人信息</a></li>
							<li><a href="<?php echo U('Login/logout');?>">切换账户</a></li>
							<li><a href="<?php echo U('Login/logout');?>">退出</a></li>
						</ul>
					</li>
					<!-- <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li> -->
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe616;</i>管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('admin/index');?>" data-title="管理员列表" href="javascript:;">管理员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-student">
			<dt><i class="Hui-iconfont">&#xe613;</i>学生管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('student/index');?>" data-title="学生列表" href="javascript:;">学生列表</a></li>
				</ul>
			</dd>
		</dl>
		<!-- <dl id="menu-checkclass">
			<dt><i class="Hui-iconfont">&#xe620;</i>选课情况管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('CheckClass/index');?>" data-title="已选课程列表" href="javascript:;">已选课程列表</a></li>
				</ul>
			</dd>
		</dl> -->
		<dl id="menu-student">
			<dt><i class="Hui-iconfont">&#xe613;</i>教师管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('teacher/index');?>" data-title="教师列表" href="javascript:;">教师列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-student">
			<dt><i class="Hui-iconfont">&#xe613;</i>专业管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('major/index');?>" data-title="专业列表" href="javascript:;">专业列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-checkclass">
			<dt><i class="Hui-iconfont">&#xe620;</i>新闻管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('News/index');?>" data-title="已选课程列表" href="javascript:;">新闻列表</a></li>
				</ul>
				<ul>
					<li><a data-href="<?php echo U('News/add');?>" data-title="已选课程列表" href="javascript:;">添加新闻</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-class">
			<dt><i class="Hui-iconfont">&#xe622;</i>课程管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('class/index');?>" data-title="课程列表" href="javascript:;">课程列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-news">
			<dt><i class="Hui-iconfont">&#xe60d;</i>系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('system/config');?>" data-title="选课管理" href="javascript:;">选课参数设置</a></li>
				</ul>
				<ul>
					<li><a data-href="<?php echo U('system/index');?>" data-title="登录日志" href="javascript:;">登录日志</a></li>
				</ul>
			</dd>
		</dl>
		<!-- <dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i>系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('system/index');?>" data-title="系统日志" href="javascript:;">系统日志</a></li>
				</ul>
			</dd>
		</dl> -->
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<body>
<div class="dislpayArrow hidden-xs">
<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="<?php echo U('index/welcome');?>">我的桌面</span>
					<em></em>
				</li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
			<i class="Hui-iconfont">&#xe6d4;</i>
			</a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
			<i class="Hui-iconfont">&#xe6d7;</i>
			</a>
		</div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('index/welcome');?>"></iframe>
		</div>
	</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
	</ul>
</div>
</body>
</html>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>