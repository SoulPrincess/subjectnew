<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;

class GcsysAuthRuleModel extends Model{
    public function ruleunique($name){
        $model_group=M('gcsys_auth_rule');
        $group=$model_group->where(['title'=>$name])->find();
        if($group){
            return false;
        }else{
            return true;
        }
    }
}