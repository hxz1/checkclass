<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	if(IS_AJAX){
    		$data = I('post.');
            if($data['type'] == 2){
                $data['add_time'] = time();                
                if($data['identity'] == 1){
                    unset($data['type'],$data['identity']);
                    // dump($data['name']);die;
                    $tt = M('student')->where(['stu_id'=>$data['name']])->find();
                    if($tt){
                        $this->ajaxReturn(['code'=>2,'msg'=>'用户已存在!']);
                    }
                    $data['stu_id'] = $data['name'];
                    unset($data['name']);
                    $data['password'] = md5($data['password']);
                    $res = M('student')->add($data);
                    if($res){
                        $this->ajaxReturn(['code'=>1,'msg'=>'注册成功!']);
                    }else{
                        $this->ajaxReturn(['code'=>3,'msg'=>'注册失败!']);
                    }
                }else{
                    $tt = M('teacher')->where(['teach_id'=>$data['name']])->find();
                    // echo M()->_sql();die;
                    unset($data['type'],$data['identity']);
                    if($tt){
                        $this->ajaxReturn(['code'=>2,'msg'=>'用户已存在!']);
                    }
                    $data['password'] = md5($data['password']);
                    $data['teach_id'] = $data['name'];
                    unset($data['name']);
                    $res = M('teacher')->data($data)->add();
                    if($res){
                        $this->ajaxReturn(['code'=>1,'msg'=>'注册成功!']);
                    }else{
                        $this->ajaxReturn(['code'=>3,'msg'=>'注册失败!']);
                    }
                }                    
            }else{
                $verify = new \Think\Verify();
                $res1=$verify->check($data['code']);
                if(!$res1){
                $this->ajaxReturn(array('code'=>4,'msg'=>'验证码错误!'));
                }
                if($data['identity'] == 1){
                    $res = M('student')->where(['stu_id'=>$data['name'],'password'=>md5($data['password'])])->find();
                    if(!$res){
                        $this->ajaxReturn(['code'=>3,'msg'=>'用户名或密码错误！']);
                    }
                    if($res['status'] == 0){
                        $this->ajaxReturn(['code'=>2,'msg'=>'账号已被禁用，请联系管理员！']);
                    }
                    session('sid',$res['id']);
                    session('name',$res['stu_id']);
                    $this->ajaxReturn(['code'=>1,'msg'=>'登录成功！']);
                }else{
                    $res = M('teacher')->where(['teach_id'=>$data['name'],'password'=>md5($data['password'])])->find();
                    if(!$res){
                        $this->ajaxReturn(['code'=>3,'msg'=>'用户名或密码错误！']);
                    }
                    if($res['status'] == 0){
                        $this->ajaxReturn(['code'=>2,'msg'=>'账号已被禁用，请联系管理员！']);
                    }
                    session('tid',$res['id']);
                    session('name',$res['teach_id']);
                    $this->ajaxReturn(['code'=>10,'msg'=>'登录成功！']);
                }
            }
    	}else{
        	$this->display();
    	}
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

    public function logout(){
        session(null);
        $this->success('退出成功！',U('login/index'));
    }
}