<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){
        $model = M('news');
        $count = $model->count();
        $page=new \Think\Page($count,4);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show=$page->show();
        $data = $model->limit($page->firstRow,$page->listRows)->select();
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }

    public function add(){
        $id = I('get.id');
        $model = M('news');
        if(IS_AJAX){
            $post = I('post.');
            if(!empty($post['id'])){
                $where['id'] = $post['id'];
                $res = $model->where($where)->save($post);
                if($res){
                    $this->ajaxReturn(array('code'=>1,'msg'=>'修改成功！'));
                }else{
                    $this->ajaxReturn(array('code'=>2,'msg'=>'修改失败！'));
                }
            }else{
                $post['add_time'] = time();
                $res = $model->add($post);
                if($res){
                    $this->ajaxReturn(array('code'=>1,'msg'=>'添加成功!'));
                }else{
                    $this->ajaxReturn(array('code'=>2,'msg'=>'添加失败!'));
                } 
            }
        }else{
            $data = $model->where(['id'=>$id])->find();
            $this->assign('data',$data);
            $this->display(); 
        }  
    }

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('news');
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

    // public function edit(){
    //     $model = D('news');
    //     if(IS_AJAX){
    //         $post=I('post.');
    //         if (false === $model->create()) {
    //             $this->ajaxReturn(array('code'=>2,'msg'=>$model->getError()));        
    //         }
    //         $where['id'] = $post['id'];
    //         $res = $model->where($where)->save($post);
    //         if($res){
    //             $this->ajaxReturn(array('code'=>1));
    //         }else{
    //             $this->ajaxReturn(array('code'=>2,'msg'=>'修改失败！'));
    //         }
    //     }else{
    //         $id = I('get.id');
    //         $data=$model->where(array('id'=>$id))->find();
    //         $this->assign('data',$data);
    //         $this->display();
    //     }   
    // }

     public function showContent(){
        $model=M('news');
        $id=I('get.id');
        $data=$model->find($id);
        echo htmlspecialchars_decode($data['content']);
    }

    public function batch_del(){
        $id_str = I('id_str');
        $model = M('news');
        $res = $model->delete($id_str);
        if($res){
            $this->ajaxReturn(array('code'=>1,'msg'=>'成功删除了'.$res.'条数据!'));
        }else{
            $this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
        }
    }
}