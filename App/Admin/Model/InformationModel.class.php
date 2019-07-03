<?php
namespace Admin\Model;
use Think\Model;

class InformationModel extends Model{
    //查询文章一条信息
    public function Infomone($id){
        $result =M("information m")
            ->join(" LEFT JOIN userinfoes u  ON m.User_Id=u.Id")
            ->join(" LEFT JOIN smclasses s  ON m.Sm_Id=s.Id")
            ->field("m.*,u.LoginName as user_name,s.SmName",false)
            ->where('m.Id='.$id)->find();
        return $result;
    }

    //查询所有文章的内容
    public function Infoall(){
        $result =M("information")->field("Id,Describe",false)->select();
        return $result;
    }


    //查询文章表中的全部信息
    public function Infom(array $arr){

        $where=$this->setWhere($arr);
        $count =M("information m")
            ->join(" LEFT JOIN userinfoes u  ON m.User_Id=u.Id")
            ->join(" LEFT JOIN smclasses s  ON m.Sm_Id=s.Id")
            ->field("m.*,u.LoginName as user_name,s.SmName",false)
            ->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M("information m")
           ->join(" LEFT JOIN userinfoes u  ON m.User_Id=u.Id")
           ->join(" LEFT JOIN smclasses s  ON m.Sm_Id=s.Id")
           ->field("m.*,u.LoginName as user_name,s.SmName",false)
           ->where($where)
           ->order('m.Id desc')
           -> limit($tol,$limit)->select();
        $data=[
         'result'=>   $result,
         'count'=>$count
        ];
     return $data;
    }

    //getwhere拼接条件
    function setWhere($request){
        $where=[];

        if($request['consult_id']){
            $where['m.Id']=$request['consult_id'];
        }
        if($request['consult_sm']){
            $where['s.Id']=$request['consult_sm'];
        }
        if($request['consult_author']){
            array_push($where," LoginName like '%".$request['consult_author']."%'");

        }
        if($request['consult_title']) {
            array_push($where," m.Title like '%".$request['consult_title']."%'");
        }
    return $where;
    }

}