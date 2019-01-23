<?php
namespace Admin\Controller;
use Think\Controller;
class CheckClassController extends CommonController {
    public function index(){
        $model = M('checkClass');
        $count = $model->count();
        $data = $model->select();
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->display();
    }

    public function add(){
        if(IS_AJAX){
            $post = I('post.');
            $model = M('checkClass');
            $post['create_time'] = time();
            $res = $model->add($post);
            if($res){
                $this->ajaxReturn(array('code'=>1,'msg'=>'添加成功!'));
            }else{
                $this->ajaxReturn(array('code'=>2,'msg'=>'添加失败!'));
            }
        }else{
            $this->display(); 
        }  
    }

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('checkClass');
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
        $model = M('checkClass');
        if(IS_AJAX){
            $post=I('post.');
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
            $this->assign('data',$data);
            $this->display();
        }   
    }

    public function batch_del(){
        $id_str = I('id_str');
        $model = M('checkClass');
        $res = $model->delete($id_str);
        if($res){
            $this->ajaxReturn(array('code'=>1,'msg'=>'成功删除了'.$res.'条数据!'));
        }else{
            $this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
        }
    }
}