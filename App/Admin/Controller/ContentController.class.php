<?php
namespace Admin\Controller;


use Admin\Model\InformationModel;
use Admin\Model\LgclassesModel;
use Think\Controller;
class ContentController extends BaseController
{
    //*******************内容系统-文章列表***************
    public function articlelist(){
        if (IS_AJAX) {
         $infodata=   new InformationModel();
         $datas=$infodata->Infom($_POST);

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

    //*******************内容系统-文章添加***************
    public function articleadd(){
        if (IS_AJAX) {
            $db=D('userinfoes');
            $user=$db->where(array('LoginName'=>I('post.User')))->field(['Id'])->find();
            $infomation=M('information');
            $data=$infomation->create();
            if(I('post.Describe')!=''){
                $data['Describe']=$this->replacemao(I('post.Describe'));
            }
            $data['Sm_Id']=I('post.consult_sm');
            $data['Lm_Id']=I('post.consult_lm');
            $data['User_Id']=$user['id'];
            $data['Recommend_Id']=I('post.Recommend');
            $data['RmationImg']=I('post.src');
            $data['Lock']=1;
            //提交
            $res = $infomation->add($data);
            if($res){
               $this->automap($res);
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

    public function automap($id){
        $service = C('CPU_PATH')."seo_sitemap.txt";
        if(file_exists($service)){
            //自动更新网站地图
            $servicetype=file_get_contents($service);
            $ser=unserialize($servicetype);
            if($ser['auto']==0){
                $url = $_SERVER['SERVER_NAME'].'/contentadd.html?id='.$id;
                $priority = 0.6;
                $lastmod = date("Y-m-d H:i:s", time());
                $changefreq = 'daily';
                $file=$ser['site_map']==0?'sitemap.xml':'sitemap.txt';
                updata_sitemap($url, $priority, $lastmod, $changefreq,$file);
            }
        }
}
    //替换锚文本
    public function replacemao($str){
        $mao=M('anchortext')->where(['Lock'=>1])->select();
        $str=setAnchors($str,$mao);
        return $str;
    }


//    *******************内容系统-文章大类***************
    public function articlelg(){
        if (IS_AJAX) {
            $lgdata=M('lgclasses')->field(['Id','LgName'])->select();
            $this->ajaxReturn($lgdata,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }
    //*******************内容系统-文章小类***************
    public function articlesm(){
        if (IS_AJAX) {
            $data=[
                'Lg_Id'=>I('get.lg_Id')
            ];
            $lgdata=M('smclasses')->where($data)->field(['Id','SmName'])->select();
            $this->ajaxReturn($lgdata,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }
    //*********************************文章编辑************************
    function articleupdate(){
        if (IS_AJAX) {
            $infomation=M('information');
            $data=$infomation->create();
            if(I('post.Describe')!=''){
                $data['Describe']=$this->replacemao(I('post.Describe'));
            }
            $data['Sm_Id']=I('post.consult_sm');
            $data['Id']=I('post.id');
            $data['Recommend_Id']=I('post.Recommend');
            $data['RmationImg']=I('post.src');
            $data['UpdateDate']=date('Y-m-d H:i:s',time());
            //提交
            $res = $infomation->save($data);
            if($res){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
           $infomodel= new InformationModel();
           $data=$infomodel->Infomone(I('get.id'));
           $lgdata=M('smclasses')->where(['Id'=>$data['sm_id']])->field(['Lg_Id'])->find();
           $data['lg_id']=$lgdata['lg_id'];
           $this->assign('datainfo',$data);
           $this->display();
        }
    }
    //***********文章删除***************
    function articledel(){
        if (IS_AJAX) {
            $c = M('information');
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

    //***************************编辑文章状态*********************
    public function articlestatus(){
        if (IS_AJAX) {
            $Rule = M('information');
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



    //*******************内容系统-分类管理***************
    public function articlemanagement(){
        if (IS_AJAX) {
            $class=new LgclassesModel();
            $datas=$class->lg();
            $data=array(
                "status"=>0,
                "message"=>'',
                "data"=>$datas,
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //*******************内容系统-分类管理-添加分类***************
    public function addmanagement(){
        if (IS_AJAX) {
            if(!$_POST['pid']){
                $Rule = M('lgclasses');
                $data = $Rule->create();
            }else{
                $Rule = M('smclasses');
                $data = $Rule->create();
                $data['SmName']=I('post.LgName');
                $data['Lg_Id']=I('post.pid');
            }
            //添加时默认值
            $data['Sort']   = '99';
            $data['Lock'] = '1';

            //提交
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
    //*******************内容系统-分类管理-修改分类***************
    public function updatemanagement()
    {
        if (IS_AJAX) {
            if (I('post.f_id') == 0) {
                $Rule = M('lgclasses');
                $data = [
                    'LgName' => I('post.Name'),
                    'Sort' => I('post.Sort'),
                    'Sign' => I('post.Sign'),
                    'Describe' => I('post.Describe'),
                ];
            } else {
                $Rule = M('smclasses');
                $data = [
                    'SmName' => I('post.Name'),
                    'Sort' => I('post.Sort'),
                    'Sign' => I('post.Sign'),
                    'Describe' => I('post.Describe'),
                ];
            }
            //修改
            $res = $Rule->where(['Id=' . I('post.p_id')])->save($data);
            if ($res) {
                $info['info'] = '修改成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }
    //*******************内容系统-分类管理-删除分类***************
    public function delmanagement()
    {
        if (IS_AJAX) {
            if (I('post.f_id') == 0) {
                $sub = M('smclasses')->where('Lg_Id='.I('post.p_id'))->select();
                if($sub){
                    $info['info'] = '删除失败,请先删除它的子分类！';
                    $info['status'] = 0;
                    $this->ajaxReturn($info, 'JSON');
                }else{
                    $res=M('lgclasses')->where('Id='.I('post.p_id'))->delete();
                    if ($res) {
                        $info['info'] = '删除成功';
                        $info['status'] = 1;
                    } else {
                        $info['info'] = '删除失败';
                        $info['status'] = 0;
                    }
                    $this->ajaxReturn($info, 'JSON');
                }
            } else {
                $res=M('smclasses')->where('Id='.I('post.p_id'))->delete();
                if ($res) {
                    $info['info'] = '删除成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '删除失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }
    //*******************内容系统-分类管理-修改分类状态***************
    public function statusmanagement()
    {
        if (IS_AJAX) {
            if (I('post.f_id') == 0) {
//                $sub = M('smclasses')->where('Lg_Id='.I('post.p_id'))->select();
//                if($sub){
//                    $info['info'] = '设置失败,请先设置它的子分类！';
//                    $info['status'] = 0;
//                    $this->ajaxReturn($info, 'JSON');
//                }else{
                   $modellg= new LgclassesModel();
                   $res=$modellg->status('lgclasses',I('post.p_id'));
                    if ($res) {
                        $info['info'] = '设置成功';
                        $info['status'] = 1;
                    } else {
                        $info['info'] = '设置失败';
                        $info['status'] = 0;
                    }
                    $this->ajaxReturn($info, 'JSON');
//                }
            } else {
                $modellg= new LgclassesModel();
                $res=$modellg->status('smclasses',I('post.p_id'));

                if ($res) {
                    $info['info'] = '设置成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '设置失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }

    //*********************************修改文章的pv************************
    function articlepvupdate(){
        if (IS_AJAX) {
            $infomation=M('information');
            $infomation->where(['Id'=>I('post.id')])->setInc('PV',1);
        }
    }
}