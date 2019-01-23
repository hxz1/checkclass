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
        *{
            margin: 0;
            padding: 0;
        }
        input{
            border:0;
        }
    </style>       
<h2 class="mbx">个人信息 &gt; 修改信息 &nbsp;&nbsp;&nbsp;</h2>       
<div class="morebt" style="padding-top: 0px;">
<ul id="ulStudMsgHeadTab">
    <li><a class="tab2" onclick="" href="<?php echo U('Teacher/index');?>">个人信息</a> </li>
    <li><a class="tab1" onclick="" href="<?php echo U('Teacher/edit');?>">修改信息</a> </li>
    <li><a class="tab2" onclick="" href="<?php echo U('Teacher/myclass');?>">我的课程</a></li>
</ul>
</div>
<div class="cztable">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="right" width="80">姓名：</td>
            <td width="260"><input type="text" value="<?php echo ($data["realname"]); ?>" class="realname">&nbsp;</td>
            <td align="right" width="90">教工号：</td>
            <td><?php echo ($data["teach_id"]); ?>&nbsp;</td>
        </tr>
        <tr>
            <td align="right">性别：</td>
            <td>
            <?php if($data['sex'] == '男'): ?><input name="sex" type="radio" id="sex-1" value="男" checked>男
                <input type="radio" id="sex-2" name="sex" value="女">女
            <?php elseif($data['sex'] == '女'): ?>
                <input class="sex" type="radio" value="男">男
                <input type="radio" class="sex" value="女" checked>女
            <?php else: ?>
                <input type="radio" class="sex" value="男">男
                <input type="radio" class="sex" value="女">女<?php endif; ?>
            </td>
            <td align="right">注册时间：</td>
            <td><?php echo (date("Y-m-d H:i:s",$data["add_time"])); ?>&nbsp;</td>
        </tr>
        <tr>
            <td align="right">手机：</td>
            <td><input type="text" value="<?php echo ($data["phone"]); ?>" class="phone">&nbsp;</td>
            <td align="right">邮箱：</td>
            <td><input type="text" value="<?php echo ($data["email"]); ?>" class="email">&nbsp;</td>
        </tr>
        <tr align="center">
            <td colspan="5" height="40">
                <div align="center">
                    <input type="button" id="button2" value="确定修改" class="btn btn-success" />
                </div>
            </td>
        </tr>
    </table>
</div>

            </div>
        </div>
        
    </div>
</body>
</html>
<script type="text/javascript">
    $('#button2').click(function(){
        var id = <?php echo ($data["id"]); ?>;
        var realname = $('.realname').val();
        var sex=$('input:radio:checked').val();
        var major_id = $('.major option:selected').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var re = /^1\d{10}$/ ;
        var reg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
        if (!re.test(phone)) {
              layer.msg('手机号格式不正确！', {
                      icon: 2,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    }, function(){
                      $('.phone').focus();
                    }); 
              return false;
        } 
        if (!reg.test(email)) {
              layer.msg('邮箱格式不正确！', {
                      icon: 2,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    }, function(){
                      $('.email').focus();
                    }); 
              return false;
        } 
        $.ajax({url:"<?php echo U('edit');?>",type:"post",data:{'id':id,'realname':realname,'sex':sex,'phone':phone,'email':email,'major_id':major_id},success:function(res){
                if(res.code == 1){
                    layer.msg('修改成功！', {
                      icon: 1,
                      time: 1000 //1秒关闭（如果不配置，默认是3秒）
                    }, function(){
                      location.reload();
                    });    
                }else if(res.code == 2){
                    layer.msg(res.msg,{icon: 2,time: 1000});
                }
            }}); 
    });

</script>