<?php
namespace Admin\Controller;

use Admin\Model\MessageinfoesModel;
use Think\Controller;


class MessageController extends BaseController
{
    //*************************留言信息***************
    public function messageinfo()
    {
        if (IS_AJAX) {
            $infodata = new MessageinfoesModel();
            $datas = $infodata->message($_GET);

            $data = array(
                "code" => 0,
                "message" => '',
                "count" => $datas['count'],
                "data" => $datas['result'],
            );
            $this->ajaxReturn($data, 'JSON');
        } else {
            $this->display();
        }
    }

    //*******************留言分类***************
    public function messagetype(){
        if (IS_AJAX) {
            $advertypes=M('messagetypes')->field(['Id','TypeName'])->where(['Lock'=>1])->select();
            $this->ajaxReturn($advertypes,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }
    //*****************设置留言的状态*************
    public function messagestatus(){
        if (IS_AJAX) {
            $Rule = M('messageinfoes');
            if(I('post.off')!=''){
                $data = array(
                    'Id'      => I('id'),
                    'Lock'  => I('post.off')==1?0:1,
                );
            }else{
                $data = array(
                    'Id'      => I('id'),
                    'Dispose'  => I('status')? I('status') : 0,
                );
            }
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
    //***********留言删除***************
    function messagedel(){
        if (IS_AJAX) {
            $c = M('messageinfoes');
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

    //*****************查询未回复留言*************
    public function messagenoanswer(){
        if (IS_AJAX) {
            $Rule = M('messageinfoes');
            $count=$Rule->where(['Dispose'=>0])->count();
            $info['info'] = $count;
            $info['status'] = 1;
            $this->ajaxReturn($info,'JSON');
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }

    //*****************留言系统设置*************
    public function messagesys(){
        if (IS_POST) {
            if(false!==fopen(C('CPU_PATH')."messagesys.txt",'w+')){
                $total= file_put_contents(C('CPU_PATH')."messagesys.txt", serialize($_POST));
                if($total){
                    $info['info'] = '保存成功';
                    $info['status'] = 1;

                }else{
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info,'JSON');
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info,'JSON');
            }
        }else{
            $service = C('CPU_PATH')."messagesys.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $info['info'] = $ser;
                $info['status'] = 1;
                $this->ajaxReturn($info, 'JSON');
            }else {
                $info['info'] = '';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }
    }

    //*****************留言表单设置*************
    public function messageform(){
        if (IS_AJAX) {
            $Rule = M('messageform');
            $count=$Rule->count();
            //获取每页显示的条数
            $limit= $_GET['limit'];
            //获取当前页数
            $page= $_GET['page'];
            //计算出从那条开始查询
            $tol=($page-1)*$limit;
            $datas=$Rule->limit($tol,$limit)->select();
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$datas,
                "count"=>$count,
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }

    //***************************留言表单添加*************
    public function messageformadd(){
        if(IS_AJAX){
            $Rule = M('messageform');
            $data = $Rule->create();
            $data['name']='';
            $data['describe']='';
            $data['fieldtype']='text';
            $data['optiontype']=1;
            $data['sort']=0;
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

    //*********************************留言表单编辑************************
    function messageformupdate(){
        if (IS_AJAX) {
            $Rule = M('messageform');
            $data = $Rule->create();
//            $data['optiontype']=I('post.optiontype')=="true"?1:0;

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
            $this->display();
        }
    }

    //*****************留言表单的状态*************
    public function messageformstatus(){
        if (IS_AJAX) {
            $Rule = M('messageform');
                $data = array(
                    'id'      => I('id'),
                    'lock'  => I('post.off')==1?0:1,
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
    //***********留言表单字段删除***************
    function messageformdel(){
        if (IS_AJAX) {
            $c = M('messageform');
            $ids = I('post.arr');

            //接受删除id
            $ini['id'] = array('in', $ids);

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


    //*****************留言表单的是否必填*************
    public function messageformfield(){
        if (IS_AJAX) {
            $Rule = M('messageform');
            $data = array(
                'id'      => I('post.id'),
                'optiontype'  => I('post.status'),
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

    //*****************留言添加*************
    public function messageadd(){
        if (IS_AJAX) {
            $Rule = M('messageinfoes');
            $data['ContactName']=I('post.name');
            $data['ContactTel']=I('post.phone');
            $data['Describe']=I('post.message');
            $data['Lock']=1;
            $data['MessageDate']=date('Y-m-d H:i:s',time());
            $res=$Rule->add($data);
            if ($res) {
                $info['info'] = '留言成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '留言失败';
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