<?php
namespace Admin\Model;
use Think\Model;
use Think\Verify;
class ProducttypesModel extends Model{
    //查询所有分类
    public function lg(){
       $result =M("producttypes")->field("Id as id,Id as c_id,TypeName as Name,Describe,Lock",false)->select();
       foreach($result as $k=>$v){
           $result[$k]['pid']=0;
       }
       return  $result;

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

}