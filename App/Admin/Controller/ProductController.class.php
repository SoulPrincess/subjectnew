<?php
namespace Admin\Controller;


use Admin\Model\LgclassesModel;
use Admin\Model\ProductinfoesModel;
use Admin\Model\ProducttypesModel;
use Think\Controller;
class ProductController extends BaseController
{
    //*******************内容系统-产品列表***************
    public function productlist(){
        if (IS_AJAX) {
         $infodata=   new ProductinfoesModel();
         $datas=$infodata->Infom($_GET);

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

    //*******************内容系统-产品添加***************
    public function productadd(){
        if (IS_AJAX) {
            $db=D('userinfoes');
            $user=$db->where(array('LoginName'=>I('post.User')))->field(['Id'])->find();
            $productinfoes=M('productinfoes');
            $data=$productinfoes->create();
            $data['Type_Id']=I('post.product_type');
            $data['ProductName']=I('post.productname');
            $data['ProductEnName']=I('post.productenname');
            $data['Pv']=I('post.productpv');
            $data['Status']=I('post.status');
            $data['ProductDate']=I('post.ReleaseDate');
            $data['User_Id']=$user['id'];
            $data['CoverImg']=I('post.src');
            $data['Attribute']=I('post.attribute');
            $data['Lock']=1;
            //提交
            $res = $productinfoes->add($data);
            if($res){
                //图片展示存入产品图片表
                $productimgs=M('productimgs');
                foreach(I('post.img') as $k=>$v){
                    $imgs=array('Img'=>$v,'Product_Id'=>$res,'Lock'=>1,'Type'=>$k);
                    $productimgs->add($imgs);
                }
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
    //*******************内容系统-产品分类***************
    public function productlg(){
        if (IS_AJAX) {
            $ptypedata=M('producttypes')->field(['Id','TypeName','Pid'])->where(['Lock'=>1])->select();
            $data=producttype($ptypedata,0);
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }

    //*********************************产品编辑************************
    function productupdate(){
        if (IS_AJAX) {
            $productinfoes=M('productinfoes');
            $data=$productinfoes->create();
            $data['Type_Id']=I('post.product_type');
            $data['Id']=I('post.productid');
            $data['ProductName']=I('post.productname');
            $data['ProductEnName']=I('post.productenname');
            $data['Pv']=I('post.productpv');
            $data['Status']=I('post.status');
            $data['ProductDate']=I('post.ReleaseDate');
            $data['CoverImg']=I('post.src');
            $data['Attribute']=I('post.attribute');
            //提交
            $productimgs=M('productimgs');
            if(!$productimgs->where(['Product_Id'=>I('post.productid')])->select()){
                foreach(I('post.img') as $k=>$v){
                    $imgs=array('Img'=>$v,'Type'=>$k,'Product_Id'=>I('post.productid'),'Lock'=>1);
                    $productimgs->add($imgs);
                }
            }else{
                foreach(I('post.img') as $k=>$v){
                    $imgs=array('Img'=>$v);
                    $productimgs->where(['Product_Id'=>I('post.productid'),'Type'=>$k])->save($imgs);
                }
            }
            $res = $productinfoes->save($data);
            if($res!==false){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
           $infomodel= new ProductinfoesModel();
           $data=$infomodel->Infomone(I('get.id'));
           $this->assign('datainfo',$data);
           $this->display();
        }
    }
    //***********产品删除***************
    function productdel(){
        if (IS_AJAX) {
            $c = M('productinfoes');
            $im = M('productimgs');
            $ids = I('post.arr');
            //接收删除id
            $ini['Id'] = array('in', $ids);
            $img['Product_Id'] = array('in', $ids);
            $imges = $im->where($img)->delete();
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

    //***************************编辑产品状态*********************
    public function productstatus(){
        if (IS_AJAX) {
            $Rule = M('productinfoes');
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


    //*******************内容系统-产品分类管理***************
    public function productmanagement(){
        if (IS_AJAX) {
            $pro_type=M('producttypes');
            $info=$pro_type->field("Id as id,Id as c_id,TypeName as Name,Describe,Lock,Pid as pid",false)->select();
            $data=array(
                "status"=>0,
                "message"=>'',
                "data"=>$info,
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //*******************内容系统-产品分类管理-添加分类***************
    public function addmanagement(){
        if (IS_AJAX) {
            $Rule = M('producttypes');
            $data = $Rule->create();
            $data['TypeName']=I('post.LgName');
            $data['Lock']='1';
            if(!$_POST['pid']){
                $data['Pid']=0;
            }else{
                $data['Pid']=I('post.pid');
            }
            $res = $Rule->add($data);
            if ($res) {
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
    //*******************内容系统-产品分类管理-修改分类***************
    public function updatemanagement()
    {
        try{
            if (IS_AJAX) {
                $Rule = M('producttypes');
                $data = $Rule->create();
                $data['TypeName']=I('post.Name');
                //修改
                $res = $Rule->where(['Id=' . I('post.p_id')])->save($data);
                if ($res) {
                    $info['info'] = '修改成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '没有做任何修改';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            } else {
                $info['info'] = '这是个意外！';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }catch(\Exception $e){
            saveLog('产品分类修改：', $e->getMessage(), 'updatemanagement');
        }
    }
    //*******************内容系统-产品分类管理-删除分类***************
    public function delmanagement()
    {
        if (IS_AJAX) {
            $res=M('producttypes')->where('Id='.I('post.p_id'))->delete();
            if ($res) {
                $info['info'] = '删除成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }
    //*******************内容系统-产品分类管理-修改分类状态***************
    public function statusmanagement()
    {
        if (IS_AJAX) {
            $type=M('producttypes');
            $data=array('Id'=>I('post.p_id'),'Lock'=>I('post.off')==1?0:1);
            $res=$type->save($data);
            if ($res) {
                $info['info'] = '设置成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }
}