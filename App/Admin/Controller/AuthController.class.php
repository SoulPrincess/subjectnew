<?php
namespace Admin\Controller;

use Admin\Model\GcsysAuthGroupModel;
use Admin\Model\GcsysAuthRuleModel;
use Think\Controller;
use Think\Exception;

class AuthController extends Controller {
    public function _initialize()
    {
        // 获取当前用户ID
        define('US_ID',is_login());

        // 还没登录 跳转到登录页面
        if(!US_ID){
            $this->redirect('login/login');
        }

        //用户信息session赋值变量
        $this->assign('userInfo', session('userInfo'));

        //权限部分
        $ctl = CONTROLLER_NAME;
        $act = ACTION_NAME;
        // 无需验证的操作
        $not_check = C('NOT_NEED_VERIFY');

        if(in_array($ctl.'/'.$act,$not_check) || session('userInfo.admin_username') == C('ADMIN_NAME')){
            //白名单控制器无需验证,超级管理员无需验证
            return true;
        }else{
            $auth = new \Think\Auth();
            if(!$auth->check(CONTROLLER_NAME.'/'.ACTION_NAME,US_ID)){
                $this->error('您没有访问的权限!',"/Admin/index/home");
            }
        }
    }
    //*****************添加角色***********************
    public function addadmins(){
        if(IS_AJAX){
            try {
                $froup_model = new GcsysAuthGroupModel();
                $title = I('post.role');
                $froup_title = $froup_model->groupunique($title);
                if ($froup_title) {
                    $data = [
                        'title' => $title,
                        'status' => I('post.status')
                    ];
                    if (M('gcsys_auth_group')->add($data)) {
                        $info = array(
                            'status' => 1,
                            'info' => '添加成功'
                        );
                    } else {
                        throw new \Exception("添加失败!");
                    }
                } else {
                    throw new \Exception("该角色已存在!");
                }
                $this->ajaxReturn($info, 'JSON');
            }catch(\Exception $e){
                $info['info'] = '角色添加失败！';
                $info['status'] = 0;
                saveLog('角色添加错误', $e->getMessage(), 'addadmins');
                $this->ajaxReturn($info,'JSON');
            }
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }
    //*****************角色列表***********************
    function listadmins(){
        if(IS_AJAX){
            $role=I('get.rolename');
            if($role!=''){
                $data['id'] =$role;
            }else{
                $data=[];
            }
            $count=M('gcsys_auth_group')->where($data)->count();
            //获取每页显示的条数
            $limit= I('get.limit');
            //获取当前页数
            $page= I('get.page');
            //计算出从那条开始查询
            $tol=($page-1)*$limit;
            $adminGroup=M('gcsys_auth_group')->where($data)-> limit($tol,$limit)->order('id desc')->select();
            $data=array(
                "status"=>0,
                "message"=>'',
                "total"=>$count,
                "data"=>$adminGroup,
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $role=M('gcsys_auth_group')->field(['id','title'])->select();
            $this->assign('roles',$role);
            $this->display();
        }

    }
    //*************角色编辑*******************
    function modifygroup(){
        try{
            $group_id=I("get.id");
            $model=M("gcsys_auth_group");
            if(IS_POST){
                $title=I('post.role');
                $id=I('post.id');
                $group=M('gcsys_auth_group');
                $group->title=$title;
                $group->status=I('post.status');
                if($group->where("id=$id")->save()!==false){
                    $info=array(
                        'status'=>1,
                        'info'=>'修改成功'
                    );
                }else{
                    $info=array(
                        'status'=>0,
                        'info'=>'修改失败'
                    );
                }
                $this->ajaxReturn($info,'JSON');
            }else{
                $group_info=$model->find($group_id);
                $this->assign("group_info",$group_info);
                $this->display();
            }
        }catch(\Exception $e){
            $info['info'] = '角色编辑失败';
            $info['status'] = 0;
            saveLog('角色编辑错误', $e->getMessage(), 'modifygroup');
            $this->ajaxReturn($info,'JSON');
        }

    }
    //***********角色删除***************
    function groupdel(){
        if (IS_AJAX) {
            $c = M('gcsys_auth_group');
            $ids = I('post.arr');

            //接收删除id
            $ini['id'] = array('in', $ids);
            $Type_Id['Type_Id'] = array('in', $ids);
            $group_id['group_id'] = array('in', $ids);

            $n = $c->where($ini)->delete();
            $auth = M('gcsys_auth_group_access')->where($group_id) -> delete();
            if ($n) {
                $db=M('admin');
                $db->where($Type_Id)->save(['Type_Id'=>'']);
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
    //***************************角色状态*********************
    public function statusgroup(){
        if (IS_AJAX) {
            $Rule = M('gcsys_auth_group');
            $data = array(
                'id'      => I('id'),
                'status'  => I('status')? I('status') : 0,
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
    //*****************角色分配权限***********************
    function rolegroup(){
        if (IS_AJAX) {
            $Group = M('gcsys_auth_group');
            $data['id']    = I('id');
            $data['rules'] = implode(',', I('rules'));
            $res = $Group->save($data);
            if ($res!== false) {
                $info['info'] = '设置成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            //获取角色权限
            $where['id'] = I('id');
            $Group = M('gcsys_auth_group')->field('id,title,rules')->where($where)->find();
            $Group['rules'] = explode(',', $Group['rules']);

            //获取权限规则
            $Rule = M('gcsys_auth_rule');
            $data = $Rule->field('id,title')->where('pid = 0')->order('id asc')->select();

            //循环获取子级
            foreach ($data as $k => $v){
                $ret = $this->getRule($v['id']);
                if ($ret) {
                    $data[$k]['rule'] = $ret;
                }
            }
            $this->assign('group',$Group);
            $this->assign('data',$data);
            $this->display();
        }
    }

    //*******************获取角色子节点****@return [$data] [多维数组][子节点]*************

    public function getRule($pid='0'){
        $Rule = M('gcsys_auth_rule');
        $data = $Rule->field('id,title')->where('pid =' .$pid)->order('id asc')->select();

        foreach ($data as $k => $v){
            $ret = $this->getRule($v['id']);
            if ($ret) { $data[$k]['rule'] =$ret;}
        }
        return $data;
    }
    //*****************权限列表***********************
    function listrule(){
        if (IS_AJAX) {
            //搜索条件
            $keyword  = I('keyword');
            //搜索
            if ($keyword) {
                $sql_where['id|title'] = array('EXP', "LIKE BINARY '%{$keyword}%'");
            }
            $rule=M('gcsys_auth_rule')->where($sql_where)->order('sort asc')->select();
            $data=array(
                "status"=>0,
                "message"=>'',
                "data"=>$rule,
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }

    }
    //*******************添加权限************************
    function addrule(){
        if(IS_AJAX){
            try{
            $Rule = M('gcsys_auth_rule');
            $data = $Rule->create();
            $rulesname=new GcsysAuthRuleModel();
            if(!$rulesname->ruleunique($data['title'])){
                $info=array(
                    'status'=>0,
                    'info'=>'该名称已存在！'
                );
                $this->ajaxReturn($info,'JSON');
            }
            //添加时默认值
            $data['type']   = '1';
            $data['status'] = '1';

            //如果PID字段等于假,卸载PID字段
            if (!$data['pid']) { unset($data['pid']);}

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
        }catch(\Exception $e){
            $info['info'] = '权限节点已存在';
            $info['status'] = 0;
            saveLog('权限添加错误', $info, 'addrule');
            $this->ajaxReturn($info,'JSON');
        }
        }else{
            $this->display();
        }
    }
    //*****************************删除权限**************
    public function delrule(){
        if (IS_AJAX) {
            $Rule = M('gcsys_auth_rule');
            $data = I('id');
            //如果这个权限下面有关联的权限，必须先删除所有子权限
            $sub = M('gcsys_auth_rule')->where('pid='.$data)->select();
            if ($sub) {
                $info['info'] = '删除失败，请先删除所有子权限！';
                $info['status'] = 0;
                $this->ajaxReturn($info,'JSON');
            }else{
                //删除权限
                $res  = $Rule -> delete($data);
                if ($res) {
                    $info['info'] = '删除成功';
                    $info['status'] = 1;
                }else{
                    $info['info'] = '删除失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info,'JSON');
            }

        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }
    //*************************编辑权限**********************
    public function editrule(){
        if (IS_AJAX) {
            $Rule = M('gcsys_auth_rule');
            $data = $Rule->create();

            $res = $Rule -> data($data)->save();
            if ($res !== false) {
                $info['info'] = '编辑成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '编辑失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            $Rule = M('gcsys_auth_rule');
            $where['id'] = I('id');
            $res = $Rule->where($where)->find();
            $this->assign('info',$res);
            $this->display();
        }
    }
//***************************编辑状态*********************
    public function statusrule(){
        if (IS_AJAX) {
            $Rule = M('gcsys_auth_rule');
            $data = array(
                'id'      => I('id'),
                'status'  => I('status')? I('status') : 0,
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