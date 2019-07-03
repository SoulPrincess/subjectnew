<?php
namespace Admin\Controller;
use Admin\Model\GcsysAuthRuleModel;
use Admin\Model\UserinfoesModel;
use Think\Controller;
class LoginController extends Controller {

    /*
    * 登录页面
    */
    public function login()
    {

        //判断是否永久登录
        $this->checkLong();
        //已经登录则跳转至个人中心

        if(session('?userInfo.admin_username')){
            $this->redirect("index/home");
        }else{
            //判断是否存在cookie
            $admin_name=cookie('admin_username');
            if(isset($admin_name)){
                $this->assign('username',$admin_name);
            }
            //显示登录
            $this->display();
        }
    }


    /*
     * 注册
    */
    public function register()
    {
        if (IS_POST) {
            try{
                $user = D('userinfoes');
                //数据处理
                $data['LoginName']=I('post.loginname');
                $data['UserPhone']=I('post.cellphone');
                $data['LoginPwd']=I('post.password','','md5');
                $data['UserRealName']=I('post.nickname');
                $data['Lock']=1;
                $data['Type_Id']=2;
                $data['UserRegistrTime']=date('Y-m-d H:i:s',time());
                //插入数据库
                if ($id = $user->add($data)) {
//                    $user=$user->where(array('Id'=>$id))->find();
                    session_unset();
                    session_destroy();
                    cookie('auth',null,time()-1);
                    cookie('admin_username',$data['LoginName'],time()+3600*24);
                    //修改所属组
                    $Access = M('gcsys_auth_group_access');
                    //查询角色关联是否存在此用户

                    $where['uid'] =$id;
                    $res = $Access->where($where)->find();
                    //数据对象
                    $Access->create();
                    //如果不存在则添加角色关联
                    if(empty($res)){
                        $data['group_id'] = 2;
                        $data['uid'] = $id;
                        //添加角色关联
                        $Access->data($data)->add();
                    }else {
                        //更新角色关联
                        $data['group_id'] = 2;
                        $Access->where($where)->data($data)->save();
                    }
                    $datas=array(
                        "status"=>1,
                        "info"=>'注册成功,请去登录...',
                    );
                } else {
                    throw new \Exception("注册失败!");
                }
                $this->ajaxReturn($datas,'JSON');
            }catch(\Exception $e){
                $info['info'] = "该登录名已存在!";
                $info['status'] = 0;
                saveLog('注册错误',$e->getMessage(), 'register');
                $this->ajaxReturn($info,'JSON');
            }

        }else {
            $this->display();
        }
    }

    /*
    * 退出操作
    */

    public function logout(){

        session_unset();
        session_destroy();
        cookie('auth',null,time()-1);
        $this->display('Login/login');
    }

    /*
     * 验证码
     */
    public function verify(){

        $Verify = new \Think\Verify();

        $Verify->length = 4;//验证码个数

        $Verify->entry(1);

    }
    /*
     * 判断验证码是否正确
     */
    public function check(){
        $verify = new\Think\Verify();
        $code=I('post.vercode');
        if(!$verify->check($code, 1)){
            $this->error('验证码错误！');
        }
        $userinfo=new UserinfoesModel();
        $username=trim(I('post.username'));
        $user=$userinfo->where(array('loginname'=>$username))->find();
        if($user){
            if($user['loginpwd']!=I('post.password','','md5')){
                $this->error('账号或密码错误！');
            }
            if($user['lock']!=1){
                $this->error('该用户被禁用！');
            }
        }else{
            $this->error('该用户不存在！');
        }
        //更新最后登录时间
        $data=array(
            'LastLoginTime'=>date('Y-m-d H:i:s',time()),
        );
        if($userinfo->where('Id='.$user['id'])->save($data)){
            $userinfo->where('Id='.$user['id'])->setInc('LoginCount');
            //存入session
            $data=[
                'admin_uid'=>$user['id'],
                'admin_username'=>$user['loginname'],
                'admin_pic'=>$user['userportrait'],
                'admin_time'=>time(),
            ];
            session('userInfo', $data);
            if(I("post.remember")){
                $salt = $this->random_str(16);
                //第二身份标识
                $identifier = md5($salt . md5($username . $salt));
                //永久登录标识
                $token = md5(uniqid(rand(), true));
                //永久登录超时时间(1周)
                $timeout = date('Y-m-d H:i:s',time()+3600*24*7);
                //存入cookie
                cookie('auth',"$identifier:$token",$timeout);
//                setcookie('auth',"$identifier:$token",$timeout);
                $userinfo->saveRemember($user['id'],$identifier,$token,$timeout);
            }
            //把用户名存入cookie，退出登录后在表单保存用户名信息
            cookie('admin_username',$username,time()+3600*24);
//            setcookie('admin_username',$username,time()+3600*24);
            $this->success('登录成功！','Index/home',1);
        }else{
            $this->error('登录失败！');
        }
    }

    //生成随机数,用于生成salt
    public function random_str($length){
        //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }

    //判断是否持久登录
    public function checkLong(){
        $check = new UserinfoesModel();
        $is_long = $check->checkRemember();
        if($is_long === false){
            session_unset();
            session_destroy();
            unset($_COOKIE['auth']);
        }else{
            //存入session
            $data=[
                'admin_uid'=>$is_long['id'],
                'admin_username'=>$is_long['loginname'],
                'admin_pic'=>$is_long['userportrait'],
            ];
            session('userInfo', $data);
        }
    }
}