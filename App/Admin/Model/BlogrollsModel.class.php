<?php
namespace Admin\Model;
use Think\Model;

class BlogrollsModel extends Model{
    //查询链接一条信息
    public function Infomone($id){
        $result =M("blogrolls")->where('Id='.$id)->find();
        return $result;
    }
    //查询链接全部信息
    public function linkinfo(array $arr){
        $where=$this->setWhere($arr);
        $count=M('blogrolls a')
            ->join(" LEFT JOIN userinfoes u  ON a.User_Id=u.Id")
            ->field("a.Id,a.Lock,a.BlogrollName as link_name,a.Link as link_url,a.ReleaseDate as release_date,u.LoginName as user_name",false)
            ->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M('blogrolls a')
            ->join(" LEFT JOIN userinfoes u  ON a.User_Id=u.Id")
            ->field("a.Id,a.Lock,a.Sort,a.BlogrollName as link_name,a.Link as link_url,a.ReleaseDate as release_date,u.LoginName as user_name",false)
            ->where($where)
            ->order('a.Sort desc')
            -> limit($tol,$limit)->select();

        $data=[
            'result'=>   $result,
            'count'=>$count
        ];
        return $data;
    }

    //getwhere拼接条件
    function setWhere($request){
        //搜索条件
        $keyword  = $request['link_content'];
        //搜索
        if ($keyword) {
            $where['BlogrollName|Link'] = array('EXP', "LIKE BINARY '%{$keyword}%'");
        }
        return $where;
    }
}