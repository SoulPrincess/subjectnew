<?php
namespace Admin\Controller;

use Admin\Model\ProgramasModel;
use Think\Controller;


class ProgramaController extends BaseController
{
    /*栏目管理*/
    //*********************栏目列表**************
    public function programainfo(){
        if (IS_AJAX) {
            $class=new ProgramasModel();
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

    //*******************添加栏目***************
    public function proadd(){
        if (IS_AJAX) {
            $db=D('userinfoes');
            $user=$db->where(array('LoginName'=>session('userInfo.admin_username')))->field(['Id'])->find();
            if(!$_POST['pid']){
                $Rule = M('programas');
                $data = $Rule->create();

            }else{
                $Rule = M('programas_sm');
                $data = $Rule->create();
                $data['Pid']=I('post.pid');
            }
            //添加时默认值
            $data['Title']=I('post.pro_name');
            $data['TitleUrl']=I('post.pro_url');
            $data['User_Id']=$user['id'];
            $data['ReleaseDate']=date('Y-m-d H:i:s',time());
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
    //*******************修改栏目***************
    public function proupdate()
    {
        if (IS_AJAX) {

            if (I('post.f_id') == 0) {
                $Rule = M('programas');
            } else {
                $Rule = M('programas_sm');
            }
            $data = [
                'Title' => I('post.Name'),
                'Sort' => I('post.Sort'),
                'Sign' => I('post.Sign'),
                'TitleUrl' => I('post.Url'),
                'Describe' => I('post.Describe'),
                'UpdateDate' => date('Y-m-d H:i:s',time())
            ];
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
//*******************移动子栏目***************
    public function promove()
    {
        if (IS_POST) {
            $Rule=M(programas_sm);
            $data=array(
                'Id'=>I('post.p_id'),
                'Pid'=>I('post.f_id'),
            );
            //修改
            $res = $Rule->save($data);
            if ($res) {
                $info['info'] = '修改成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
           $parentdata= ProgramasModel::parentpro();
            $this->ajaxReturn($parentdata, 'JSON');
        }
    }
    //*******************修改栏目状态***************
    public function prostatus()
    {
        if (IS_AJAX) {
            if (I('post.f_id') == 0) {
                $sub = M('programas_sm')->where('Pid='.I('post.p_id'))->select();
                if($sub){
                    $info['info'] = '设置失败,请先设置它的子分类！';
                    $info['status'] = 0;
                    $this->ajaxReturn($info, 'JSON');
                }else{
                    $modellg= new ProgramasModel();
                    $res=$modellg->status('programas',I('post.f_id'));
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
                $modellg= new ProgramasModel();
                $res=$modellg->status('programas_sm',I('post.p_id'));

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
    //*******************删除栏目***************
    public function prodel()
    {
        if (IS_AJAX) {
            if (I('post.f_id') == 0) {
                $sub = M('programas_sm')->where('Pid='.I('post.p_id'))->select();
                if($sub){
                    //先删除子类
                    $ids=array_column($sub, 'id');
                    $ini['Id'] = array('in', $ids);
                    $n = M('programas_sm')->where($ini)->delete();
                }
                $res=M('programas')->where('Id='.I('post.p_id'))->delete();
                if ($res) {
                    $info['info'] = '删除成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '删除失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            } else {
                $res=M('programas_sm')->where('Id='.I('post.p_id'))->delete();
                if ($res) {
                    $info['info'] = '子栏目删除成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '子栏目删除失败';
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
}