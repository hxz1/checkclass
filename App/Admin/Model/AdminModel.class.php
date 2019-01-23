<?php
namespace Admin\Model;

use Think\Model;

class AdminModel extends Model{
	
	//自动验证
    protected $_validate=array(
        //  array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]), 
            array('phone','/^1[3|4|5|8][0-9]\d{4,8}$/','手机号码格式有误！','0','regex',3),
            array('name','','用户名已存在',0,'unique',1),
            array('email','email','email格式错误'),        		                                   
        );
}