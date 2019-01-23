<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function welcome(){
    	$ip = gethostbyname($_SERVER['SERVER_NAME']);
    	$id = session('id');
    	$data = M('admin')->where(['id'=>$id])->find();
    	$this->assign('ip',$ip);
    	$this->assign('data',$data);
        $this->display();
    }
}