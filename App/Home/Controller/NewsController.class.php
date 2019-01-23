<?php
namespace Home\Controller;
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

     public function details(){
        $id = I('id');
        M('news')->where(['id'=>$id])->setInc('click');
        $data = M('news')->where(['id'=>$id])->find();
        $this->assign('data',$data);
        $this->display();
    }
}