<?php
namespace Admin\Controller;

use Admin\Model\UserinfoesModel;
use Think\Controller;
use Think\Image;
use Think\Upload;

class UserController extends BaseController
{
    //*************用户基本资料*************
    public function information(){
        $db=D('userinfoes');
        $user=$db->where(array('Id'=>session("userInfo.admin_uid")))->find();
        if(!IS_POST){
            $this->assign('userinfo',$user);
            $this->display();
        }else{
            if(!I('post.sex')){
                $info=array(
                    'status'=>0,
                    'msg'=>'请填写您的性别',
                );
                $this->ajaxReturn($info,'JSON');
            }else{
                $db=D('userinfoes');
                $data=array(
                    'UserRealName'=>I('post.nickname'),
                    'UserSex'=>I('post.sex'),
                    'UserPortrait'=>I('post.avatar'),
                    'Type_Id'=>I('post.role'),
                    'UserPhone'=>I('post.cellphone'),
                    'UserEmail'=>I('post.email'),
                    'UserAddress'=>I('post.address'),
                    'UpdateTime'=>date('Y-m-d H:i:s',time())
                );
                if($db->where('ID='.$user['id'])->save($data)!==false){
                    session('userInfo.admin_pic',I('post.avatar'));
                    $info=array(
                        'status'=>1,
                        'msg'=>'修改成功',
                    );
                }else{
                    $info=array(
                        'status'=>0,
                        'msg'=>'修改失败',
                    );
                }
                $this->ajaxReturn($info,'JSON');
            }
        }
    }
        //*************获取所有的角色***************
    public function usertype(){
        if (IS_AJAX) {
            $juese=M('gcsys_auth_group')->field(['title','id'])->where(['status'=>1])->select();
            $this->ajaxReturn($juese,'JSON');
        }else{
            $this->ajaxReturn([],'JSON');
        }
    }

    //****************************后台管理员****************************
    public function useradmin(){
        if(!IS_POST){
            //获取角色组
            $list = M('gcsys_auth_group')->field('id,title')->where('status=1')->select();
            $this->assign('list',$list);
            $this->display();
        }else{
            $username=new UserinfoesModel();
            if(!$username->loginname(I('post.username'))){
                $info=array(
                    'status'=>0,
                    'info'=>'该登录名已存在！'
                );
                $this->ajaxReturn($info,'JSON');
            }
            $data=array(
                'LoginName'=>I('post.username'),
                'LoginPwd'=>I('post.password','','MD5'),
                'UserPhone'=>I('post.cellphone'),
                'UserEmail'=>I('post.email'),
                'UserRegistrTime'=>date('Y-m-d H:i:s',time()),
                'UpdateTime'=>date('Y-m-d H:i:s',time())
            );
            $db=D('userinfoes');
            $user=$db->add($data);
            if($user){
                $info['info'] = '添加成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '添加失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }
    }
//****************************后台管理员列表***********
    public function useradmininfo(){
        $user_loginname=I('get.user_loginname');
        $user_telphone=I('get.user_telphone');
        $user_email=I('get.user_email');
        $user_role=I('get.user_role');
        $data=array();
		 if(session('userInfo.admin_username') != C('ADMIN_NAME')){
            $data['Id']=session('userInfo.admin_uid');
        }
        if($user_loginname!=''){
            $data['LoginName'] = array('like', "%$user_loginname%");
        }
        if($user_telphone!=''){
            $data['UserPhone'] =$user_telphone;
        }
        if($user_email!=''){
            $data['UserEmail'] = $user_email;
        }
        if($user_role!=''){
            $data['Type_Id'] =$user_role;
        }
        $count=M('userinfoes')->where($data)->count();
        //获取每页显示的条数
        $limit= I('get.limit');
        //获取当前页数
        $page= I('get.page');
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $user=M('userinfoes')->where($data)-> limit($tol,$limit)->order('Id desc')->select();
        //获取用户角色名称
        $auth = new \Think\Auth();
        foreach ($user as $k=>$v){
            $group = $auth->getGroups($v['id']);
            $user[$k]['group'] = $group[0]['title'];
        }
        $data=array(
           "status"=>0,
            "message"=>'',
            "total"=>$count,
            "data"=>$user,
        );
        $this->ajaxReturn($data,'JSON');
    }
//****************************修改后台管理员信息***********
    public function useradminedit(){
        if(!IS_POST){
            $user=M('userinfoes')->where(array('Id'=>I('get.id')))->find();
            $this->assign('user',$user);
            $this->display();
        }else{
            $user=M('userinfoes')->where(array('Id'=>I('post.id')))->find();
            $pwd=(I('post.password')==''?$user['loginpwd']:I('post.password','','MD5'));
            $data=array(
                'LoginName'=>I('post.username'),
                'LoginPwd'=>$pwd,
                'UserPhone'=>I('post.cellphone'),
                'UserEmail'=>I('post.email'),
                'UpdateTime'=>date('Y-m-d H:i:s',time())
            );
            $userinfo=M('userinfoes')->where(array('Id'=>I('post.id')))->save($data);
            if($userinfo!==false){
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败,未做任何修改';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }
    }
    //****************************批量删除后台管理员***********
    function useradmindel(){
        $c=M('userinfoes');
        $res=session("userInfo.admin_uid")?session("userInfo.admin_uid"):'';
        if(!empty($res)){
            $ids=I('post.arr');
            foreach($ids as $id){
                if($id==$res){
                    $info['info'] = '不能删除自己';
                    $info['status'] = 0;
                    $this->ajaxReturn($info,'JSON');
                }
            }
            //接受删除id
            $ini['Id']=array('in',$ids);
            $uid['uid']=array('in',$ids);

            $n=$c->where($ini)->delete();
            //删除关联表中的数据
           M('gcsys_auth_group_access')->where($uid) -> delete();
            if($n){
                $info['info'] = '删除成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }
    }


    //****************************修改后台管理员审核状态***********
    public function useradminstatus(){
        if (IS_AJAX) {
            $User = M('userinfoes');
            $data = array(
                'Id' => I('id'),
                'Lock' => I('status') ? I('status') : 0,
            );
            $res = $User->save($data);
            if ($res) {
                $info['info'] = '操作成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '操作失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $info['info'] = '这是个意外';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }

    //****************************用户设置角色****************************
    public function useradmingroup(){
        if (IS_AJAX) {
            //修改所属组
            $Access = M('gcsys_auth_group_access');
            //查询角色关联是否存在此用户
            $where['uid'] = I('uid');
            $res = $Access->where($where)->find();
            //数据对象
            $Access->create();
            //如果不存在则添加角色关联
            if(empty($res)){
                //添加角色关联
                $res = $Access->add();
            }else {
                //更新角色关联
                $data['group_id'] = I('group_id');
                $res = $Access->where($where)->data($data)->save();
            }
            //返回数据更新消息
            if ($res!== false) {
                $db=M('userinfoes');
                $db->where(array('Id'=>I('uid')))->save(['Type_Id'=>I('group_id')]);
                $info['info'] = '设置成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            //获取当前所属组
            $auth = new \Think\Auth();
            //获取用户帐号
            $where['Id'] = I('id');
            $res = M('userinfoes')->where($where)->field('Id,LoginName')->find();
            //根据用户ID获取关联的角色ID
            $info = $auth->getGroups($res['id']);
            //获取角色组
            $list = M('gcsys_auth_group')->field('id,title')->where('status=1')->select();
            //赋值
            $this->assign('info',$info);
            $this->assign('list',$list);
            $this->assign('user',$res);
            $this->display('useradmingroup');
        }
    }
    //修改密码

    public function userpwd(){
        if (IS_AJAX) {
            $User = M('userinfoes');
            $old_pwd = I('oldPassword');
            $new_pwd = I('password');

            //查询条件
            $map['Id'] =session("userInfo.admin_uid");
            $map['LoginPwd'] = md5($old_pwd);

            //查询旧密码是否正确
            $res = $User->where($map)->find();
            if ($res) {
                //更新密码
                $map['LoginPwd'] = md5($new_pwd);
                if ($User->save($map) !== false) {
                    $info['info'] = '修改密码成功，请重新登录!';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '修改失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }else{
                $info['info'] = '原始密码错误';
                $info['status'] = 0;
                $this->ajaxReturn($info,'JSON');
            }

        }else{
            $this->display();
        }
    }

        /*
    * 图片上传处理
    * @param [String] $name [保存文件名称前缀]
    * @param [String] $thumbWidth [缩略图宽度]
    * @param [String] $thumbHeight [缩略图高度]
    * @return [Array] [图片上传信息]
    */
    public function upload($name,$thumbWidth = '',$thumbHeight = ''){
        $img =$_FILES['file'];
        if($img==null){
            $info['message'] = "未上传图片";
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
        #图片存放路径
        if($name=='webico'){
            $directory =C('CPU_PATH').$name;
        }else{
            $directory =C('UPLOAD_PATH').$name;
        }
        #判断目录是否存在 不存在则创建
        if(!(is_dir($directory))){
            $this->directory($directory);
        }
        $upload=new Upload();
        $names=$name?$name:'';

        $savename=$names."_".time().'_'.(session("userInfo.admin_uid")+1);

        $upload->maxSize = C('UPLOAD_MAX_SIZE') ;// 设置附件上传大小
        $upload->savePath =$directory.'/'; // 设置附件上传目录
        $upload->rootPath='./';
        $upload->saveName=$savename;
        $info=$upload->uploadOne($img);
        if(!$info){
            $info['message'] = $upload->getError();
            $info['status'] = 1;
        }else{
            if($thumbWidth!= '' && $thumbHeight!= ''){
                //生成缩略图
                $image = new \Think\Image();
                $thumb_file = $info['savepath'] . $info['savename'];
                $save_path =   $info['savepath'] . 'mini_' . $info['savename'];
                //保存缩略图的规则
                $image->open( $thumb_file )->thumb($thumbWidth,$thumbHeight)->save($save_path);
                $res=array(
                    'status' => 0,
                    'message' => "上传成功",
                    'pic_path' => $info['savepath'].$info['savename'],
                    'mini_pic' => $info['savepath'] . 'mini_'.$info['savename']
                );
            }else{
                $res=array(
                    'status' => 0,
                    'message' => "上传成功",
                    'pic_path' => $info['savepath'].$info['savename'],
                    'mini_pic' =>''
                );
            }
        }
        $data=[
            'data'=>[
                'src'=>"/".$res['pic_path'],
                'mini_pic'=>"/".$res['mini_pic']
            ],
            'code'=>$res['status'],
            'msg'=>$res['message'],
        ];
        $this->ajaxReturn($data,'JSON');
    }

    //****************************创建文件夹****************************
    public function directory($dir){
        return is_dir ( $dir ) or directory(dirname( $dir )) and mkdir ( $dir , 0777);
    }

}