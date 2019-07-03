<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;
class LgclassesModel extends Model{
    //查询所有分类
    public function lg(){

       $result =M("lgclasses")->field("Id as id,Id as c_id,LgName as Name,Describe,Sort,Lock,Sign",false)->select();
       foreach($result as $k=>$v){
           $result[$k]['pid']=0;
       }
       $cid=array_column($result,'c_id');
       $where['Lg_Id'] = array('in',$cid);//cid在这个数组中
       $results =M("smclasses")->field("Id as c_id,SmName as Name,Describe,Sort,Lock,Sign,Lg_Id as pid",false)->where($where)->select();
       if($results){
           foreach($results as $k=>$v) {
               $results[$k]['id']=-1;
               $result[] = $v;
           }
           return  $result;
       }else{
           return  $result;
       }
    }

    //修改分类状态
    public function status($table,$id){
        $status =M($table)->where(['Id='.$id])->field("Lock",false)->find();
        if($status['lock']==1){
            $data=[
                'Id'=>$id,
                'Lock'=>0
            ];
            $res=M($table)->save($data);
        }else{
            $data=[
                'Id'=>$id,
                'Lock'=>1
            ];
            $res=M($table)->save($data);
        }
        if($res){
            return true;
        }else{
            return false;
        }
    }
    //查询所有分类
    public function fuji(){
        $result =M("lgclasses")->field("Id as id,Id as c_id,LgName as Name,Describe,Sort,Lock,Sign",false)->select();
        return  $result;

    }
}