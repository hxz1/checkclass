<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		$sid = session('sid');
		$tid = session('tid');
		//判断用户是否登录
		if(empty($sid) && empty($tid)){
			//没有登录，跳转到登录页面
			// $this -> error('请先登录...',U('Login/index'),3);exit;
			//编写javascript代码
			$url = U('Login/index');	
			echo "<script>alert(\"请先登录！\"); top.location.href='$url'</script>";exit;	
		}	
	}

	public function editpass()
	{
        $sid = session('sid');
        $tid = session('tid');
		if(IS_AJAX){
			$post = I('post.');
            if($post['type'] == 1){
                $res = M('student')->where(['stu_id'=>$post['id'],'password'=>md5($post['oripwd'])])->find();
                if(!$res){
                    $this->ajaxReturn(['code'=>2,'msg'=>'原密码错误！']);
                }
                $res1 = M('student')
                       ->where(['stu_id'=>$post['id']])
                        ->setField(['password'=>md5($post['newpwd'])]);
                if($res1){
                    $this->ajaxReturn(['code'=>1,'msg'=>'修改成功！']);
                }else{
                    $this->ajaxReturn(['code'=>3,'msg'=>'修改失败！']);
                }
            }elseif($post['type'] == 2){
                $res = M('teacher')->where(['teach_id'=>$post['id'],'password'=>md5($post['oripwd'])])->find();
                if(!$res){
                    $this->ajaxReturn(['code'=>2,'msg'=>'原密码错误！']);
                }
                $res1 = M('teacher')->where(['teach_id'=>$post['id']])->setField('password',md5($post['newpwd']));
                if($res1){
                    $this->ajaxReturn(['code'=>1,'msg'=>'修改成功！']);
                }else{
                    $this->ajaxReturn(['code'=>3,'msg'=>'修改失败！']);
                }
            }
		}else{
			if(!empty($sid)){
				$id = M('student')->where(['id'=>$sid])->getField('stu_id');
                $type = 1;   //身份为学生
			}
			if(!empty($tid)){
				$id = M('teacher')->where(['id'=>$tid])->getField('teach_id');
                $type = 2;   //身份为老师 
			}
            $this->assign('id',$id);
			$this->assign('type',$type);
			$this->display('/Index/editpass');
		}
	}

	public function permiss()
	{
		$type = I('get.code');
		$sid = session('sid');
		$tid = session('tid');
		//身份为老师
		if(empty($sid) && $tid){
                if($type == 1 ||$type == 2 ||$type == 3||$type == 4){
                	echo "<script>alert(\"您没有权限！\");history.go(-1) </script>";exit;
                }
                if($type == 5){
                	header("Location:http://www.checkclass.com/index.php/teacher/index.html");
					exit;
                }
                if($type == 6){
                	header("Location:http://www.checkclass.com/index.php/teacher/edit.html"); 
					exit;
                }
                if($type == 7){
                	header("Location:http://www.checkclass.com/index.php/teacher/myclass.html"); 
					exit;
                }
            }
		//身份为学生
		if(empty($tid) && $sid){
                if($type == 5 ||$type == 6 ||$type == 7){
                	echo "<script>alert(\"您没有权限！\");history.go(-1) </script>";exit;
                }
                if($type == 1){
                	header("Location:http://www.checkclass.com/index.php/index/index.html"); 
					exit;
                }
                if($type == 2){
                	header("Location:http://www.checkclass.com/index.php/index/edit.html"); 
					exit;
                }
                if($type == 3){
                	$start_time = M('config')->where(['id'=>1])->getField('value');
                	$end_time = M('config')->where(['id'=>2])->getField('value');
                    $id = session('sid');
                    $major_id = M('student')->where(['id'=>$id])->getField('major_id');
                    if(empty($major_id)){
                        echo "<script>alert(\"请先完善您的个人信息(选择自己的专业)！\");history.go(-1)</script>";exit;
                    }
                	if(time()>$end_time){
                		echo "<script>alert(\"很抱歉,选课时间已过,下次早点！\");history.go(-1)</script>";exit;
                	}
                	if(time()<$start_time){
                		echo "<script>alert(\"很抱歉,选课时间还没开始！\");history.go(-1)</script>";exit;
                	}
                	header("Location:http://www.checkclass.com/index.php/index/CheckClass.html"); 
					exit;
                }
                if($type == 4){
                	header("Location:http://www.checkclass.com/index.php/index/myclass.html"); 
					exit;
                }
            }
            if($type == 1){
                	header("Location:http://www.checkclass.com/index.php/index/index.html"); 
					exit;
                }
                if($type == 2){
                	header("Location:http://www.checkclass.com/index.php/index/edit.html"); 
					exit;
                }
                if($type == 3){
                	header("Location:http://www.checkclass.com/index.php/index/CheckClass.html"); 
					exit;
                }
                if($type == 4){
                	header("Location:http://www.checkclass.com/index.php/index/myclass.html"); 
					exit;
                }
                 if($type == 5){
                	header("Location:http://www.checkclass.com/index.php/teacher/index.html"); 
					exit;
                }
                if($type == 6){
                	header("Location:http://www.checkclass.com/index.php/teacher/edit.html"); 
					exit;
                }
                if($type == 7){
                	header("Location:http://www.checkclass.com/index.php/teacher/myclass.html"); 
					exit;
                }
	}
}