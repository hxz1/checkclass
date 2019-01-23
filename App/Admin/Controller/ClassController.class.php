<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends CommonController {
    public function index(){
        $count =  M('course')->count();
        $page=new \Think\Page($count,4);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show=$page->show();
        $data =  M('course')
                ->alias('c')
                ->join('__MAJOR__ m on c.major_id = m.id','left')
                ->join('__TEACHER__ t on c.teach_id = t.id','left')
                ->field('c.*,m.name as major_name,t.realname')
                ->limit($page->firstRow,$page->listRows)
                ->order('c.id asc')
                ->select();
        foreach ($data as $k => $v) {
            $data[$k]['nums'] = M('checkclass')->where(['class_id'=>$v['id'],'status'=>1])->count('class_id');
            $data[$k]['tol_nums'] = $v['tol_nums'] - $data[$k]['nums'];
        }
        $this->assign('show',$show);
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->display();
    }

    public function add(){
        if(IS_AJAX){
            $post = I('post.');
            $model = M('course');
            $post['add_time'] = time();
            $res = $model->add($post);
            if($res){
                $this->ajaxReturn(array('code'=>1,'msg'=>'添加成功!'));
            }else{
                $this->ajaxReturn(array('code'=>2,'msg'=>'添加失败!'));
            }
        }else{
            $data = M('major')->where(['status'=>1])->select();
            $data1 = M('teacher')->select();
            $this->assign('data',$data);
            $this->assign('data1',$data1);
            $this->display(); 
        }  
    }

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('course');
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
        $model = M('course');
        if(IS_AJAX){
            $post=I('post.');
            $where['id'] = $post['id'];
            // dump($post);die;
            $res = $model->where($where)->save($post);
            if($res){
                $this->ajaxReturn(array('code'=>1,'msg'=>'修改成功！'));
            }else{
                $this->ajaxReturn(array('code'=>2,'msg'=>'修改失败！'));
            }
        }else{
            $id = I('get.id');
            $data=$model->where(array('id'=>$id))->find();
            $major = M('major')->where(['status'=>1])->select();
            $data1 = M('teacher')->select();
            $this->assign('data1',$data1);
            $this->assign('major',$major);
            $this->assign('data',$data);
            $this->display();
        }   
    }

    public function status_stop(){
        $model = M('course');
        $id=I('id');
        $res = $model->where(array('id'=>$id))->setField(array('status'=>0));
        if($res){
            $this->ajaxReturn(1);
        }
    }

    public function status_start(){
        $model = M('course');
        $id=I('id');
        $res = $model->where(array('id'=>$id))->setField(array('status'=>1));
        if($res){
            $this->ajaxReturn(1);
        }
    }

    public function batch_del(){
        $id_str = I('id_str');
        $model = M('course');
        $res = $model->delete($id_str);
        if($res){
            $this->ajaxReturn(array('code'=>1,'msg'=>'成功删除了'.$res.'条数据!'));
        }else{
            $this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
        }
    }
}