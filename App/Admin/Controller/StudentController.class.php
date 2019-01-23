<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends CommonController {
    public function index(){
        $count = M('student')->count();
        $page=new \Think\Page($count,4);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show=$page->show();
        $data = M('student')
                ->alias('s')
                ->join('__MAJOR__ m on s.major_id = m.id','left')
                ->field('s.*,m.name')
                ->limit($page->firstRow,$page->listRows)
                ->select();
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }

    public function add(){
        if(IS_AJAX){
            $post = I('post.');
            $model = D('student');
            if (false === $model->create()) {
                $this->ajaxReturn(array('code'=>2, 'msg'=>$model->getError()));        
            }
            $post['add_time'] = time();
            $post['password'] = md5($post['password']);
            $res = $model->add($post);
            if($res){
                $this->ajaxReturn(array('code'=>1,'msg'=>'添加成功!'));
            }else{
                $this->ajaxReturn(array('code'=>2,'msg'=>'添加失败!'));
            }
        }else{
            $data = M('major')->where(['status'=>1])->select();
            $this->assign('data',$data);
            $this->display(); 
        }  
    }

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('student');
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

    public function edit(){
        $model = D('student');
        if(IS_AJAX){
            $post=I('post.');
            if (false === $model->create()) {
                $this->ajaxReturn(array('code'=>2,'msg'=>$model->getError()));        
            }
            $where['id'] = $post['id'];
            $res = $model->where($where)->save($post);
            if($res){
                $this->ajaxReturn(array('code'=>1));
            }else{
                $this->ajaxReturn(array('code'=>2,'msg'=>'修改失败！'));
            }
        }else{
            $id = I('get.id');
            $data=$model->where(array('id'=>$id))->find();
            $data1 = M('major')->where(['status'=>1])->select();
            $this->assign('data1',$data1);
            $this->assign('data',$data);
            $this->display();
        }   
    }

    public function change_password(){
        $model = M('student');
        if(IS_AJAX){
            $post=I('post.');
            $where['id'] = $post['id'];
            $map['password'] = md5($post['newpassword']);
            $res = $model->where($where)->setField($map);
            if($res){
                $this->ajaxReturn(array('code'=>1));
            }else{
                $this->ajaxReturn(array('code'=>2));
            }
        }else{
            $id = I('get.id');
            $data=$model->where(array('id'=>$id))->find();
            $this->assign('data',$data);
            $this->display();
        }   
    }

    public function batch_del(){
        $id_str = I('id_str');
        $model = M('student');
        $res = $model->delete($id_str);
        if($res){
            $this->ajaxReturn(array('code'=>1,'msg'=>'成功删除了'.$res.'条数据!'));
        }else{
            $this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
        }
    }

    public function status_stop(){
        $model = M('student');
        $id=I('id');
        $res = $model->where(array('id'=>$id))->setField(array('status'=>0));
        if($res){
            $this->ajaxReturn(1);
        }
    }

    public function status_start(){
        $model = M('student');
        $id=I('id');
        $res = $model->where(array('id'=>$id))->setField(array('status'=>1));
        if($res){
            $this->ajaxReturn(1);
        }
    }
}