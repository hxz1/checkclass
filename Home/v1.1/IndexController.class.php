<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $id = session('sid');
        $data = M('student')
		        ->alias('s')
		        ->join('__MAJOR__ m on s.major_id = m.id','left')
		        ->where(['s.id'=>$id])
		        ->field('s.*,m.name')
		        ->find();
        $this->assign('data',$data);
        $this->display();
    }

    public function edit()
    {
    	if(IS_AJAX){
            $data = I('post.');
            // dump($data);die;
            $data['update_time'] = time();
            $res = M('student')->where(['id'=>$data['id']])->save($data);
            if($res){
                $this->ajaxReturn(['code'=>1,'msg'=>'修改成功！']);
            }else{
                $this->ajaxReturn(['code'=>2,'msg'=>'修改失败！']);
            }
    	}else{
    		$data = M('major')->where(['status'=>1])->select();
            $data1 = M('student')->alias('s')
                    ->join('__MAJOR__ m on s.major_id = m.id','left')
                    ->where(['s.id'=>session('sid')])
                    ->field('s.*,m.name')->find();
            $this->assign('data',$data);
    		$this->assign('data1',$data1);
    		$this->display();
    	}
    }

    public function CheckClass()
    {
    	$count = M('course')->count();
        $page=new \Think\Page($count,4);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show=$page->show();
        $data = M('course')
            ->alias('c')
            ->join('__MAJOR__ m on c.major_id = m.id','left')
            ->join('__TEACHER__ t on c.teach_id = t.id','left')
            ->where(['c.status'=>1])
            ->field('c.*,t.realname,t.id as tid,m.name as major_name')
            ->limit($page->firstRow,$page->listRows)
            ->select();
        $major = M('major')->where(['status'=>1])->select();
        foreach ($data as $k => $v) {
            $data[$k]['nums'] = M('checkclass')->where(['class_id'=>$v['id'],'status'=>1])->count('class_id');
            $data[$k]['tol_nums'] = $v['tol_nums'] - $data[$k]['nums'];
        }
        if(IS_AJAX){
            $id = I('post.id');
            if($id == 0){
            	$map = ['c.status'=>1];
            	$maps = ['status'=>1];
            }else{
            	$map = ['c.major_id'=>$id,'c.status'=>1];
            	$maps = ['major_id'=>$id,'status'=>1];
            }
            $count = M('course')->where($maps)->count();
	        $page=new \Think\Page($count,1);
	        $page->setConfig('prev','上一页');
	        $page->setConfig('next','下一页');
	        $page->setConfig('first','首页');
	        $page->setConfig('last','末页');
	        $show=$page->show();
            $class = M('course')
                    ->alias('c')
                    ->join('__MAJOR__ m on c.major_id = m.id','left')
                    ->join('__TEACHER__ t on c.teach_id = t.id','left')
                    ->where($map)
                    ->field('c.*,t.realname,t.id as tid,m.name as major_name')
                    ->limit($page->firstRow,$page->listRows)
                    ->select();
                    foreach ($class as $k => $v) {
                        $class[$k]['nums'] = M('checkclass')->where(['class_id'=>$v['id'],'status'=>1])->count('class_id');
                        $class[$k]['tol_nums'] = $v['tol_nums'] - $class[$k]['nums'];
                    }
            if(!empty($class)){
                $this->ajaxReturn(['code'=>1,'data'=>$class,'count'=>$count,'show'=>$show]);
            }
        }
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->assign('data',$data);
        $this->assign('major',$major);
    	$this->display();
    } 

    public function check()
    {
        $data = array();
        $data['stu_id'] = session('sid');
        $data['class_id'] = I('post.id');
        // dump($data);die;
        $res1 = M('Checkclass')->where($data)->find();
        if($res1){
            $this->ajaxReturn(['code'=>3,'msg'=>'您已选了此课程！']);die;
        }
        $data['teach_id'] = I('post.tid');
        $data['add_time'] = time();
        $res = M('Checkclass')->add($data);
        // echo M()->_sql();die;
        if($res){
            $this->ajaxReturn(['code'=>1,'msg'=>'选课成功！']);
        }else{
            $this->ajaxReturn(['code'=>2,'msg'=>'操作失败！']);
        }
    }

    public function myclass()
    {
        $uid = session('sid');
        $data = M('Checkclass')
                ->alias('c')
                ->join('__COURSE__ e on c.class_id = e.id','left')
                ->join('__TEACHER__ t on e.teach_id = t.id','left')
                ->field('c.id,e.name,e.credit,t.realname,e.cla_place,e.weekdays,e.jieci')
                ->where(['c.stu_id'=>$uid])
                ->select();
        $this->assign('data',$data);
    	$this->display();
    } 

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('Checkclass');
            $res = $model->where($map)->delete();
            if($res){
                $this->ajaxReturn(array('code'=>1));
            }else{
                $this->ajaxReturn(array('code'=>2));
            }  
        }else{
            $this->display();
        }
    }
}