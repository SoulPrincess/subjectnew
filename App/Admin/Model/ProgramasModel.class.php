<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;
class ProgramasModel extends Model{
    //**********************查询所有分类*********************
    public function lg(){

       $result =M("programas")->field("Id as id,Id as c_id,Title as Name,TitleUrl as Url,Describe,Sort,Lock,Sign",false)->order(['Sort'=>'desc'])->select();
       foreach($result as $k=>$v){
           $result[$k]['pid']=0;
       }
       $cid=array_column($result,'c_id');
       if(!empty($cid)){
           $where['Pid'] = array('in',$cid);//cid在这个数组中
       }else{
         $where=[];
       }
       $results =M("programas_sm")->field("Id as c_id,Title as Name,Describe,TitleUrl as Url,Sort,Lock,Sign,Pid",false)->where($where)->order(['Sort'=>'desc'])->select();
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

    //***************************修改分类状态************************
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
    //********************查询所有的父级******************
    public function parentpro(){
        $result =M("programas")->field("Id as id,Id as c_id,Title as Name,Sort,TitleUrl",false)->where(['Lock'=>1])->order(['Sort'=>'desc'])->select();
        return $result;
    }
}