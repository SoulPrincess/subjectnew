<?php
namespace Admin\Model;
use Think\Model;

class MessageinfoesModel extends Model{
    //查询留言一条信息
    public function Infomone($id){
        $result =M("messageinfoes")->where('Id='.$id)->find();
        return $result;
    }
    //查询留言全部信息
    public function message(array $arr){
        $where=$this->setWhere($arr);
        $count=M('messageinfoes a')
            ->join(" LEFT JOIN messagetypes t  ON a.Type_Id=t.Id")
            ->field("a.*,t.TypeName",false)
            ->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M('messageinfoes a')
            ->join(" LEFT JOIN messagetypes t  ON a.Type_Id=t.Id")
            ->field("a.*,t.TypeName",false)
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
        if($request['message_dispose']!=''){
            $where['a.Dispose']=$request['message_dispose'];
        }
        if($request['message_type']){
            $where['a.Type_Id']=$request['message_type'];
        }
        return $where;
    }
}