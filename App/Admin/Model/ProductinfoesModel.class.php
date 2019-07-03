<?php
namespace Admin\Model;
use Think\Model;

class ProductinfoesModel extends Model{
    //查询文章一条信息
    public function Infomone($id){

        $result =M("productinfoes p")
            ->join(" LEFT JOIN producttypes t  ON p.Type_Id=t.Id")
            ->join(" LEFT JOIN userinfoes u  ON p.User_Id=u.Id")
            ->field("p.*,u.LoginName as user_name,t.TypeName",false)
            ->where('p.Id='.$id)->find();
        $imges =M("productimgs")->where('Product_Id='.$id)->select();
        $img=array_column($imges,'img','type');
        $result['tupian']=$img;
        return $result;
    }


    //查询文章表中的全部信息
    public function Infom(array $arr){

        $where=$this->setWhere($arr);
        $count =M("productinfoes p")
            ->join(" LEFT JOIN producttypes t  ON p.Type_Id=t.Id")
            ->join(" LEFT JOIN userinfoes u  ON p.User_Id=u.Id")
            ->field("p.*,u.LoginName as user_name,t.TypeName",false)
            ->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M("productinfoes p")
            ->join(" LEFT JOIN producttypes t  ON p.Type_Id=t.Id")
            ->join(" LEFT JOIN userinfoes u  ON p.User_Id=u.Id")
            ->field("p.*,u.LoginName as user_name,t.TypeName",false)
           ->where($where)
           ->order('p.Id desc')
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

        if($request['product_id']){
            $where['p.Id']=$request['product_id'];
        }
        if($request['product_type']){
            $where['t.Id']=$request['product_type'];
        }
        if($request['product_name']){
            array_push($where," ProductName like '%".$request['product_name']."%'");

        }
    return $where;
    }
}