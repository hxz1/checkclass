<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'checkclass', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口

    //RBAC权限数据信息
    //角色数组
    'RBAC_ROLES'            =>      array(
                                1   =>  '超级管理员',
                                2   =>  '普通管理员',
                            ),
    //权限数组（关联角色数组）
    'RBAC_ROLE_AUTHS'       =>      array(
                                1   =>  '*/*',//拥有全部的权限
                                2   =>  array('checkclass/*','class/*','index/*','login/*','news/*','student/*','system/check_time'),
                            ),
);