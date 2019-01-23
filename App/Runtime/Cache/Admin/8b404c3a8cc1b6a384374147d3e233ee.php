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
<style type="text/css">
.main p label {
    float: left;
    width: 82px;
    text-align: left;
}
.main p input[type="text"] {
    width: 240px;
    height: 28px;
    padding: 0px 10px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(197, 214, 224);
    border-image: initial;
    outline: none;
}
</style>
<title>添加管理员</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
	<div class="main">
	<p class="short-input ue-clear">
    	<label>标题：</label>
        <input name="title" id="title" type="text" placeholder="标题..." />
    </p>
    <p class="short-input ue-clear" style="margin-top: 10px;">
    	<label>作者：</label>
        <input name="author" type="text" id="author" placeholder="作者..." />
    </p>
    <p class="short-input ue-clear" style="margin-top: 10px;">
    	<label>内容：</label>
        <script type="text/plain" id="editor" name="content" style="width: 800px;height: 300px;"></script>
    </p>
	</div>
	<a href="javascript:;" class='btn btn-success tj' style="margin-left: 100px;
    margin-right: 20px;">确定</a>
    <a href="javascript:;" class='btn btn-default reset'>清空内容</a>
	</form>
</article>

</body>
</html>
<script type="text/javascript" src="/Public/Admin/ue/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Admin/ue/ueditor.all.min.js"></script>
<script type="text/javascript" src="/Public/Admin/ue/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
var ue = UE.getEditor('editor');
$('.tj').click(function(){
    var title = $('#title').val(); 
    var author = $('#author').val(); 
    var content = UE.getEditor('editor').getContent()
   $.ajax({url:"<?php echo U('add');?>",type:"post",data:{'title':title,'author':author,'content':content},success:function(res){
                if(res.code == 1){
                    layer.msg(res.msg, {
                      icon: 1,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    }, function(){
                      parent.location.reload();
                    }); 
                }else if(res.code == 2){
                    layer.msg(res.msg, {
                      icon: 2,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    });
                }
            }});  
})

</script>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>