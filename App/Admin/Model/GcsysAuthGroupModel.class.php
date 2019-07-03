<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;

class GcsysAuthGroupModel extends Model{

    public function groupunique($title){
        $model_group=M('gcsys_auth_group');
        $group=$model_group->where(['title'=>$title])->find();
        if($group){
            return false;
        }else{
            return true;
        }
    }
}