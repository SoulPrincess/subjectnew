<?php
namespace Admin\Model;
use Think\Model;

class AdeverinfoesModel extends Model{
    //查询广告一条信息
    public function Infomone($id){
        $result =M("adeverinfoes")->where('Id='.$id)->find();
        return $result;
    }
    //查询广告全部信息
    public function adever(array $arr){
        $where=$this->setWhere($arr);
        $count=M('adeverinfoes a')
            ->join(" LEFT JOIN advertypes t  ON a.Type_Id=t.Id")
            ->join(" LEFT JOIN userinfoes u  ON a.User_Id=u.Id")
            ->field("a.*,u.LoginName as user_name,t.TypeName",false)
            ->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M('adeverinfoes a')
            ->join(" LEFT JOIN advertypes t  ON a.Type_Id=t.Id")
            ->join(" LEFT JOIN userinfoes u  ON a.User_Id=u.Id")
            ->field("a.*,u.LoginName as user_name,t.TypeName",false)
            ->where($where)
            ->order('a.Id desc')
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
        if($request['adver_type']){
            $where['a.Type_Id']=$request['adver_type'];
        }
        if($request['adver_name']){
            array_push($where," AdeverName like '%".$request['adver_name']."%'");
        }
        return $where;
    }
}