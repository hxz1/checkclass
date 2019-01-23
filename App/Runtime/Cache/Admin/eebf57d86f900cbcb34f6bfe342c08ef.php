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
<link rel="stylesheet" type="text/css" href="/Public/Home/jsDate/need/laydate.css" />
<script type="text/javascript" src="/Public/Home/jsDate/laydate.js"></script>

<title>系统日志</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	选课设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>选课设置</span>
			</div>
			<div >
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						选课开始时间：</label>
						<div class="formControls col-xs-8 col-sm-3">
						<input style="height: 32px;width: 270px;" value="<?php echo (date("Y-m-d H:i:s",$data[0]['value'])); ?>" placeholder="请输入日期" id="demo" class="laydate-icon input-text start" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
					</div>
				</div>
			</div>
			<div >
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						选课结束时间：</label>
						<div class="formControls col-xs-8 col-sm-3">
						<input style="height: 32px;width: 270px;" value="<?php echo (date("Y-m-d H:i:s",$data[1]['value'])); ?>" placeholder="请输入日期" id="demo" class="laydate-icon input-text end" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
					</div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button style="margin-left: 73px;" class="btn btn-primary radius save" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
			</div>
		</div>
	</form>
</div>

</body>
</html>
<script type="text/javascript">

!function(){

	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库

	laydate({elem: '#demo'});//绑定元素

}();



//日期范围限制

var start = {

    elem: '#start',

    format: 'YYYY-MM-DD',

    min: laydate.now(), //设定最小日期为当前日期

    max: '2099-06-16', //最大日期

    istime: true,

    istoday: false,

    choose: function(datas){

         end.min = datas; //开始日选好后，重置结束日的最小日期

         end.start = datas //将结束日的初始值设定为开始日

    }

};



var end = {

    elem: '#end',

    format: 'YYYY-MM-DD',

    min: laydate.now(),

    max: '2099-06-16',

    istime: true,

    istoday: false,

    choose: function(datas){

        start.max = datas; //结束日选好后，充值开始日的最大日期

    }

};

laydate(start);

laydate(end);



//自定义日期格式

laydate({

    elem: '#test1',

    format: 'YYYY年MM月DD日',

    festival: true, //显示节日

    choose: function(datas){ //选择日期完毕的回调

        alert('得到：'+datas);

    }

});



//日期范围限定在昨天到明天

laydate({

    elem: '#hello3',

    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推

    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推

});

</script>
<script type="text/javascript">
$('.save').click(function(){
	var start = $('.start').val();
	var end = $('.end').val();
	// console.log(start);
	// console.log(end);
	// console.log(nums);
	$.ajax({url:"<?php echo U('config');?>",type:"post",data:{'start':start,'end':end},success:function(res){
                if(res.code == 1){
                    layer.msg(res.msg, {
                      icon: 1,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    }, function(){
                      location.reload();
                    }); 
                }else{
                    layer.msg(res.msg, {
                      icon: 2,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    });
                }
            }});  
});
</script>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/Admin/jquery.contextmenu/jquery.contextmenu.r2.js"></script>