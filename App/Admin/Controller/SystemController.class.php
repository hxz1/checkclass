<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {
    public function index(){
    	$model = M('login');
        $count = $model->count();
        $page=new \Think\Page($count,6);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show=$page->show();
    	$data = $model->limit($page->firstRow,$page->listRows)->order('id desc')->select();
    	$this->assign('count',$count);
    	$this->assign('data',$data);
        $this->assign('show',$show);
        $this->display();
    }

    public function del(){
        if(IS_AJAX){
            $map['id'] = I('id');
            $model=M('login');
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

    public function batch_del(){
        $id_str = I('id_str');
        $model = M('login');
        $res = $model->delete($id_str);
        if($res){
            $this->ajaxReturn(array('code'=>1,'msg'=>'成功删除了'.$res.'条数据!'));
        }else{
            $this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
        }
    }

    public function config()
    {
        if(IS_POST){
            $data = I('post.');
            $start_time = strtotime($data['start']);
            $end_time = strtotime($data['end']);
            // dump($start_time);
            // dump($data);die;
            if($start_time > $end_time){
                $this->ajaxReturn(array('code'=>2,'msg'=>'起始时间不能大于结束时间！'));
            }
            $model = M('config');
            $res1 = $model->where(['id'=>1])->setField(['value'=>$start_time]);
            $res2 = $model->where(['id'=>2])->setField(['value'=>$end_time]);
            if($res1||$res2){
                $this->ajaxReturn(array('code'=>1,'msg'=>'保存成功！'));
            }else{
                $this->ajaxReturn(array('code'=>3,'msg'=>'保存失败！'));
            }
        }
        $data = M('config')->select();
        $this->assign('data',$data);
        $this->display();
    }
}