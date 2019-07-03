<?php
namespace Admin\Controller;

use Admin\Model\BlogrollsModel;
use Think\Controller;

class LinkController extends BaseController {
    //*******************友情链接*****************
    public function linkinfo(){
        if(IS_AJAX){
            $infodata=   new BlogrollsModel();
            $datas=$infodata->linkinfo($_GET);

            $data=array(
                "code"=>0,
                "message"=>'',
                "count"=>$datas['count'],
                "data"=>$datas['result'],
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //***************************添加链接*************
    public function linkadd(){
        if(IS_AJAX){
            $db=D('userinfoes');
            $user=$db->where(array('LoginName'=>I('post.User')))->field(['Id'])->find();
            $Rule = M('blogrolls');
            $data = $Rule->create();
            //添加时默认值
            $data['BlogrollName']  = I('post.link_name');
            $data['Link'] =I('post.link_url');
            $data['User_Id']=$user['id'];
            $data['ReleaseDate']=date('Y-m-d H:i:s',time());
            $data['Lock'] =1;
            //提交
            $res = $Rule->add($data);

            if($res){
                $info['info'] = '添加成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '添加失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');

        }else{
            $this->display();
        }
    }
//*********************************链接编辑************************
    function linkupdate(){
        if (IS_AJAX) {
            $Rule = M('blogrolls');
            $data = $Rule->create();
            $data['BlogrollName']  = I('post.link_name');
            $data['Link'] =I('post.link_url');
            $data['Id'] =I('post.link_id');
            $res = $Rule->save($data);
            if($res){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            $infomodel= new BlogrollsModel();
            $data=$infomodel->Infomone(I('get.id'));
            $this->assign('datainfo',$data);
            $this->display();
        }
    }
    //***********链接删除***************
    function linkdel(){
        if (IS_AJAX) {
            $c = M('blogrolls');
            $ids = I('post.arr');

            //接受删除id
            $ini['Id'] = array('in', $ids);

            $n = $c->where($ini)->delete();
            if ($n) {
                $info['info'] = '删除成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }

    }

    //***********链接状态***************
    public function linkstatus(){
        if (IS_AJAX) {
            $Rule = M('blogrolls');
            $data = array(
                'Id'      => I('post.id'),
                'Lock'  => I('post.off')==1?0:1,
            );
            $res = $Rule->save($data);
            if ($res) {
                $info['info'] = '设置成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');

        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }
}