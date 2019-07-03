<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;

class UserinfoesModel extends Model{
//*************************当用户勾选"记住我"*******************************
    public function saveRemember($uid,$identifier,$token,$timeout){
        $admin = M("userinfoes");
        $data['Identifier'] = $identifier;
        $data['Token'] = $token;
        $data['Outtime'] = $timeout;
        $where = " Id = ".$uid;
        $res = $admin->data($data)->where($where)->save();
        return $res;
    }
//***************************验证用户是否永久登录（记住我）***********************
    public function checkRemember(){
        $arr = array();
        $now = time();
        list($identifier,$token) = explode(':',cookie('auth'));
        if (ctype_alnum($identifier) && ctype_alnum($token)){
            $arr['identifier'] = $identifier;
            $arr['token'] = $token;
        }else{
            return false;
        }
        $info =$this->getByidentifier($arr['identifier']);
        if($info != null){
            if($arr['token'] != $info['token']){
                return false;
            }else if($now > strtotime($info['outtime'])){
                return false;
            }else{
                return $info;
            }
        }else{
            return false;
        }
    }

    private function getByidentifier($identifier){
        $admin = M("userinfoes")->where(array('Identifier'=>$identifier))->find();
        if($admin){
            return $admin;
        }else{
            return false;
        }

    }

    //查询登录名是否重复
    /*
     * $name =用户登录名
     * return false=已存在；true=不存在
     * */
    public function loginname($name){
        $LoginName=M('userinfoes');
        $group=$LoginName->where(['LoginName'=>$name])->find();
        if($group){
            return false;
        }else{
            return true;
        }
    }
}