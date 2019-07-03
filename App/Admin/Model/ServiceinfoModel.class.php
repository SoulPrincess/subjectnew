<?php
namespace Admin\Model;
use Think\Model;

class ServiceinfoModel extends Model{
    //查询客服一条信息
    public function Infomone($id){
        $result =M("serviceinfo")
            ->field("id,ServiceName as name,ServiceQQ as qq,ServiceMSN as msn,ServiceTW as taow,ServicealiW as aliw,ServiceSkype as skype,Sort,Lock",false)
            ->where('id='.$id)->find();
        return $result;
    }


    //查询客服表中的全部信息
    public function Infom(array $arr){

        $count =M("serviceinfo")
            ->field("id,ServiceName as name,ServiceQQ as qq,ServiceMSN as msn,ServiceTW as taow,ServicealiW as aliw,ServiceSkype as skype,Sort,Lock",false)
         ->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M("serviceinfo")
            ->field("id,ServiceName as name,ServiceQQ as qq,ServiceMSN as msn,ServiceTW as taow,ServicealiW as aliw,ServiceSkype as skype,Sort,Lock",false)
           ->order('Sort desc')
           -> limit($tol,$limit)->select();
        $data=[
         'result'=>   $result,
         'count'=>$count
        ];
     return $data;
    }

}