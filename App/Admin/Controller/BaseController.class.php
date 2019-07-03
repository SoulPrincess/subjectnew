<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller {
    public function _initialize()
    {
        // 获取当前用户ID
        define('US_ID',is_login());

        // 还没登录 跳转到登录页面
        if(!US_ID){
            $this->redirect('login/login');
        }
        else{
            $T=3600;
            if(time()-session('userInfo.admin_time')>=$T){
                session_unset();
                session_destroy();
                $this->display('login/login');
            }else{
                session('userInfo.admin_time',time());
            }
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
        }
        else{
            if(IS_AJAX){
                return true;
            }else{
                $auth = new \Think\Auth();
                if(!$auth->check(CONTROLLER_NAME.'/'.ACTION_NAME,US_ID)){
                    $this->error('您没有访问的权限!',"/Admin/index/home");
                }

            }
        }
    }
    //定义空方法时跳转到404错误页面
    public function _empty($e)
    {
        $this->display( C('TMPL_EXCEPTION_FILE'));
    }
}