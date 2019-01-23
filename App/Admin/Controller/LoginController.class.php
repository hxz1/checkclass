<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	if(IS_AJAX){
            $model = M('admin');
    		$post = I('post.');
    		$verify = new \Think\Verify();
	    	$res=$verify->check($post['code']);
	    	if(!$res){
	    		$this->ajaxReturn(array('code'=>2,'msg'=>'验证码错误!'));
	    	}
    		$post['password'] = md5($post['password']);
    		unset($post['code']);
    		$data=$model->where($post)->find(); 
    		if($data){
                    if($data['status'] == 0){
                        $this->ajaxReturn(array('code'=>4,'msg'=>'您的账号已被禁用!请联系超级管理员'));
                    }
    				session('id',$data['id']);
	    			session('role_id',$data['role_id']);
	    			session('name',$post['name']);
                    $a['last_login_time'] = $data['login_time'];
                    $b['login_time'] = time();
                    $model->where(['id'=>$data['id']])->setInc('login_times');
                    $model->where(['id'=>$data['id']])->save($a);
                    $model->where(['id'=>$data['id']])->save($b);
                    $data1 = ['username'=>$post['name'],'ip'=>gethostbyname($_SERVER['SERVER_NAME']),'login_time'=>time()];
                    M('login')->add($data1);
	    			$this->ajaxReturn(array('code'=>1,'msg'=>'登录成功!'));
	    		}else{
	    			$this->ajaxReturn(array('code'=>3,'msg'=>'用户名或密码错误!'));
	    	}
    	}else{
			$this->display();
    	}
    }

	public function logout(){
    	session(null);
    	$this->success('退出成功！',U('login/index'));
    }
    

    //验证码    
    public function code(){
         $config =    array(
        'fontSize'    =>    20,    // 验证码字体大小
        'length'      =>    4,     // 验证码位数
        // 'imageH'      =>    100,   //验证码高度 设置为0为自动计算
        'useNoise'    =>    false, // 关闭验证码杂点
        'useImgBg'    =>    false, //是否使用背景图片 默认为false
        'fontttf'     =>    '4.ttf',//验证码字体，不设置随机取
        // 'expire'      =>    1,     //   验证码的有效期（秒）
        // 'codeSet'  =>  '123456789',  //验证码字符集合 
        // 'useZh '      =>     true, //是否使用中文
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
        $this->display();
    }
}