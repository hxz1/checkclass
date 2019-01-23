<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends CommonController {
   public function index(){
        $id = session('tid');
        $data = M('teacher')->where(['id'=>$id])->find();
        $this->assign('data',$data);
        $this->display();
    }

    public function edit()
    {
    	if(IS_AJAX){
            $data = I('post.');
            $data['update_time'] = time();
            // dump($data);die;
            $res = M('teacher')->where(['id'=>$data['id']])->save($data);
            // echo M()->_sql();die;
            if($res){
                $this->ajaxReturn(['code'=>1,'msg'=>'修改成功！']);
            }else{
                $this->ajaxReturn(['code'=>2,'msg'=>'修改失败！']);
            }
    	}else{
    		$id = session('tid');
            $data = M('teacher')->where(['id'=>$id])->find();
            $this->assign('data',$data);
    		$this->display();
    	}
    }
    public function myclass()
    {
        $tid = session('tid');
        $data = M('course')
                ->alias('e')
                ->join('__CHECKCLASS__ c on c.class_id = e.id','left')
                ->where(['c.teach_id'=>$tid])
                ->field('e.*')
                ->select();
        $data = M('course')->where(['teach_id'=>$tid])->select();
        foreach ($data as $k => $v) {
            $data[$k]['nums'] = M('checkclass')->where(['class_id'=>$v['id'],'status'=>1])->count('class_id');
            $data[$k]['tol_nums'] = $v['tol_nums'] - $data[$k]['nums'];
        }
        $this->assign('data',$data);
        $this->display();
    } 
}