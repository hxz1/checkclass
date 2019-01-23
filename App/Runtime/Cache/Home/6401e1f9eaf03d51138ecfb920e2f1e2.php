<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>
	学生信息管理平台
</title>
<link href="/Public/Home/css/StudentStyle.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/js/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/ks.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jBox/jquery.jBox-2.3.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jBox/i18n/jquery.jBox-zh-CN.js" type="text/javascript"></script>
<script src="/Public/Home/js/Common.js" type="text/javascript"></script>
<script src="/Public/Home/js/Data.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
<style type="text/css">
.pagination a {text-decoration: none;border: solid 1px; }
.pagination .pxofy{float:left;margin-left: -343px;height:25px;*padding-top:1px;}   
.pagination a, .pagination span {display: block;float: left;line-height:24px;padding:0 9px;border-radius:2px;margin-right: 5px;font-family:Arial, Helvetica, sans-serif !important;}
.pagination .current {cursor:default;border: solid 1px ;}
.pagination .prev, .pagination .next{*line-height:22px;}

/*分页样式*/
.pagination a{color: #000000;border-color:#8EB2D2; background:#eaf4fa;}
.pagination a:hover{color:#023054;border-color:#8EB2D2;background:#B8DFFB;}
.pagination .current{color:#fff;border-color:#4ea052;background:#5ebc62;}
.pagination .current.prev, .pagination .current.next{color:#B9B9B9;border-color:#D3D3D3;background:#fff;}
.pagination .pxofy{color: #023054;
    margin-top: -9px;
}

.pagination{ margin-top:10px;padding:0 10px;}
.pagination .pxofy{float:left;color:#6c6c6c;    margin-left: -3px;}
.pagination .pagin-list{float:right;padding-left: 418px;}
.pagination .goto{float:right;margin-left:10px;}
.pagination .goto .text{padding:0;}
.pagination .goto input[type=text]{float:left;width:25px;height:22px;border:1px solid #8EB2D2;outline:none; text-align:center;}
</style>
</head>
<body>
    <div class="banner">
        <div class="bgh">
            <div class="page">
                <div id="logo" style="margin-left: -15px;">
                    <img src="/Public/Home/images/Student/logo.png" alt="" width="165" height="48" />
                </div>
                <div class="topxx">
                    <?php echo (session('name')); ?>，欢迎您！ 
                    <?php if(session('tid') != ''): ?><a href="<?php echo U('Teacher/index');?>">我的信息</a><?php endif; ?>
                    <?php if(session('sid') != ''): ?><a href="<?php echo U('index/index');?>">我的信息</a><?php endif; ?>
                    <a href="<?php echo U('Common/editpass');?>">密码修改</a> 
                    <a href="<?php echo U('Login/logout');?>">安全退出</a>
                </div>
                <div class="blog_nav">
                    <ul>
                        <li><a href="<?php echo U('common/permiss',array('code'=>1));?>">学生中心</a></li>
                        <li><a href="<?php echo U('News/index');?>">校内热闻</a></li>
                        <li><a href="<?php echo U('common/permiss',array('code'=>7));?>">选课情况</a></li>
                        <!-- <li><a href="../OnlineTeaching/StudentMaterial.aspx.html">资料中心</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="box mtop">
            <div class="leftbox">
                <div class="l_nav2">
                    <div class="ta1">
                        <strong>学生中心</strong>
                        <div class="leftbgbt">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>1));?>">个人信息</a>
                        </div>
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>2));?>">修改信息</a>
                        </div>
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>3));?>">在线选课</a>
                        </div>
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>4));?>">我的课程</a>
                            </div>
                    </div>
                    <div class="ta1">
                        <strong>教师中心</strong>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>5));?>">个人信息</a>
                        </div>
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>6));?>">修改信息</a>
                        </div>
                        <div>
                            <a href="<?php echo U('common/permiss',array('code'=>7));?>">我的课程</a>
                        </div>
                    </div>
                    <div class="ta1">
                        <strong>新闻中心</strong><div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="<?php echo U('News/index');?>">热闻通知</a></div>
                    </div>
                <div class="ta1">
                    <?php if(session('tid') != ''): ?><a href="<?php echo U('Teacher/index');?>">个人中心</strong></a><?php endif; ?>
                    <?php if(session('sid') != ''): ?><a href="<?php echo U('index/index');?>">个人中心</strong></a><?php endif; ?>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightbox"> 
<style type="text/css">
.cztable{
    text-align:center;
}
.pagination .pxofy{
    margin-top: -29px;
}
</style>    
<h2 class="mbx">个人信息 &gt; 在线选课</h2>  
<div class="morebt" style="padding-top: 0px;">
<ul id="ulStudMsgHeadTab">
    <li><a class="tab2" onclick="" href="<?php echo U('Index/index');?>">个人信息</a> </li>
    <li><a class="tab2" onclick="" href="<?php echo U('Index/edit');?>">修改信息</a> </li>
    <li><a class="tab1" onclick="" href="<?php echo U('common/permiss',array('code'=>3));?>">在线选课</a></li>
    <li><a class="tab2" onclick="" href="<?php echo U('Index/myclass');?>">我的课程</a></li>
</ul>
</div>
<div class="cztable">
    <select class="form-control border-radius" style="width: 200px">
      <option value="0">全部专业</option>
      <?php if(is_array($major)): $i = 0; $__LIST__ = $major;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" class="dd">
       <tr>
       <th>序号</th>
       <th>课程名</th>
       <th>学分</th>
       <th>已选数量</th>
       <th>可选数量</th>
       <th>所属专业</th>
       <th>授课老师</th>
       <th>上课地点</th>
       <th>上课时间</th>
       <th>操作</th>
       </tr>
       <tr>
       <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><td><?php echo ($data["id"]); ?></td>
        <td><?php echo ($data["name"]); ?></td>
        <td><?php echo ($data["credit"]); ?></td>
        <td><?php echo ($data["nums"]); ?></td>
        <td><?php echo ($data["tol_nums"]); ?></td>
        <td><?php echo ($data["major_name"]); ?></td>
        <td><?php echo ($data["realname"]); ?></td>
        <td><?php echo ($data["cla_place"]); ?></td>
        <td align="center">星期<?php echo ($data["weekdays"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($data["jieci"]); ?>节</td>
        <td><button class="btn btn-success check" data-id="<?php echo ($data["id"]); ?>" data-tid='<?php echo ($data["tid"]); ?>'">选择</button></td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="pagination ue-clear">
    <div class="pagin-list">
        <?php echo ($show); ?>
    </div>
    <div class="pxofy">显示第 1 条到 <?php echo ($count); ?>条记录，总共<?php echo ($count); ?>条记录</div>
  </div>
</div>

            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('select').change(function(){ 
            var id = $('select option:selected') .val();
            var html = '<tr><th>序号</th><th>课程名</th><th>学分</th><th>可选数量</th><th>所属专业</th><th>授课老师</th><th>上课地点</th><th>上课时间</th><th>操作</th></tr>';
            $.ajax({url:"<?php echo U('CheckClass');?>",type:"post",data:{'id':id},success:function(res){
                if(res.code == 1){
                    $.each(res.data,function(k, v){
                    html+='<tr><td class="id">'+v.id+'</td>'+
                            '<td>'+v.name+'</td>'+
                            '<td>'+v.credit+'</td>'+
                            '<td>'+v.tol_nums+'</td>'+
                            '<td>'+v.major_name+'</td>'+
                            '<td>'+v.realname+'</td>'+
                            '<td>'+v.cla_place+'</td>'+
                            '<td>星期'+v.weekdays+'&nbsp;&nbsp;&nbsp;'+v.jieci+'节</td>'+
                            '<td><button class="btn btn-success check">选择</button></td></tr>'; 
                    });
                    var count = '显示第 1 条到'+res.count+'条记录，总共'+res.count+'条记录';
                    var show = res.show;
                    // console.log(show);return;
                }
                $(".dd").empty().append(html);
                $(".pagin-list").empty().append(show);
                $(".pagination .pxofy").css("margin-top","0px");
                $(".pxofy").empty().append(count);
            }}); 
       
        }) 

        $('.check').click(function(){
            var id = $(this).data('id');
            var tid = $(this).data('tid');
            $.ajax({url:"<?php echo U('check');?>",type:"post",data:{'id':id,'tid':tid},success:function(res){
               if(res.code == 1){
              layer.msg(res.msg, {
              icon: 1,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            }, function(){
               location.reload();
            }); 
          }else if(res.code == 2){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }else if(res.code == 3){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }else if(res.code == 4){
              layer.msg(res.msg, {
              icon: 2,
              time: 2000 //1秒关闭（如果不配置，默认是3秒）
            });
          }        
            }}); 
          });
        }) 
</script>