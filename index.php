<?php
header('Content-Type:text/html; charset=utf-8');

define('APP_PATH','./App/');//项目路径

define('APP_DEBUG',true);// 开启调试模式

define('BIND_MODULE','Home');//绑定后台文件

require "./ThinkPHP/ThinkPHP.php";//引入thinkPHP的核心运行文件

?>