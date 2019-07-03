<?php
namespace Admin\Controller;

use Admin\Model\AdeverinfoesModel;
use Admin\Model\AdvertypesModel;
use Think\Controller;

class AdvertisingController extends BaseController {
 /*
  * 广告系统
  * */

 //***************************广告管理(列表)*************
    public function advertisinginfo(){
        if(IS_AJAX){
            $infodata=   new AdeverinfoesModel();
            $datas=$infodata->adever($_GET);

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
    //*******************广告分类***************
    public function advertype(){
        if (IS_AJAX) {
            $advertypes=M('advertypes')->field(['Id','TypeName'])->where(['Lock'=>1])->select();
            $this->ajaxReturn($advertypes,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }

    //***************************添加广告*************
    public function adveradd(){
        if(IS_AJAX){
            $db=D('userinfoes');
            $user=$db->where(array('LoginName'=>I('post.User')))->field(['Id'])->find();
            $Rule = M('adeverinfoes');
            $data = $Rule->create();
            //添加时默认值
            $data['Type_Id']  = I('post.adver_type');
            $data['AdeverName'] =I('post.adver_name');
            $data['Link']=I('post.adver_link');
            $data['AdeverImg']=I('post.adver_img');
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
    //*********************************广告编辑************************
    function adverupdate(){
        if (IS_AJAX) {
            $Rule = M('adeverinfoes');
            $data = $Rule->create();
            $data['Type_Id']  = I('post.adver_type');
            $data['Id']  = I('post.adver_id');
            $data['AdeverName'] =I('post.adver_name');
            $data['Link']=I('post.adver_link');
            $data['AdeverImg']=I('post.adver_img');
            $res = $Rule->save($data);
            if($res!==false){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            $infomodel= new AdeverinfoesModel();
            $data=$infomodel->Infomone(I('get.id'));
            $this->assign('datainfo',$data);
            $this->display();
        }
    }

    //***********广告删除***************
    function adverdel(){
        if (IS_AJAX) {
            $c = M('adeverinfoes');
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

    //***********广告状态***************
    public function adverstatus(){
        if (IS_AJAX) {
            $Rule = M('adeverinfoes');
            $data = array(
                'Id'      => I('post.id'),
                'Lock'  => I('post.off')==1?0:1,
            );
            $res = $Rule->save($data);
            if ($res!==false) {
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











    //***************************广告管理(位置)*************
    public function advertisingtype(){
        if(IS_AJAX){
            $infodata=   new AdvertypesModel();
            $datas=$infodata->adever($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "count"=>$datas['count'],
                "data"=>$datas['result'],
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display('advertisinginfo');
        }

    }

    //***************************添加广告位*************
    public function addtype(){
        if(IS_AJAX){
            $Rule = M('advertypes');
            $data = $Rule->create();
            $rulesname=new AdvertypesModel();
            if(!$rulesname->typeunique(I('post.typename'))){
                $info=array(
                    'status'=>0,
                    'info'=>'该广告位已存在！'
                );
                $this->ajaxReturn($info,'JSON');
            }
            //添加时默认值
            $data['Width']  = I('post.type_width');
            $data['Height'] =I('post.type_height');
            $data['TypeName']=I('post.typename');
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
    //*********************************广告位编辑************************
    function updatetype(){
        if (IS_AJAX) {
            $Rule = M('advertypes');
            $data = $Rule->create();
            $data['Width']  = I('post.type_width');
            $data['Id']  = I('post.typeid');
            $data['Height'] =I('post.type_height');
            $data['TypeName']=I('post.typename');
            $res = $Rule->save($data);
            if($res!==false){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            $infomodel= new AdvertypesModel();
            $data=$infomodel->Infomone(I('get.id'));
            $this->assign('datainfo',$data);
            $this->display();
        }
    }
    //***********广告位删除***************
    function deltype(){
        if (IS_AJAX) {
            $c = M('advertypes');
            $ids = I('post.arr');

            //接收删除id
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

    //***********广告位状态***************
    public function statustype(){
        if (IS_AJAX) {
            $Rule = M('advertypes');
            $data = array(
                'Id'      => I('post.id'),
                'Lock'  => I('post.off')==1?0:1,
            );
            $res = $Rule->save($data);
            if ($res!==false) {
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