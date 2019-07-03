<?php
namespace Admin\Model;
use Think\Model;

class AnchortextModel extends Model{
    //查询锚文本一条信息
    public function Infomone($id){
        $result =M("anchortext")->where('id='.$id)->find();
        return $result;
    }
    //查询锚文本全部信息
    public function adever(array $arr){
        $count=M('anchortext')->field("id,Original as old,Newtext as new,Titile as title,Chained as linkurl,ReplaceCount as count,Lock",false)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M('anchortext')
            ->field("id,Original as old,Newtext as new,Titile as title,Chained as linkurl,ReplaceCount as count,Lock",false)
            ->order('id desc')
            -> limit($tol,$limit)->select();
        $data=[
            'result'=>   $result,
            'count'=>$count
        ];
        return $data;
    }

}