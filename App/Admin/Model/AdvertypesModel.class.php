<?php
namespace Admin\Model;
use Think\Model;

class AdvertypesModel extends Model{

//查询广告位名称是否重复
    public function typeunique($name){
        $advertypes=M('advertypes');
        $group=$advertypes->where(['TypeName'=>$name])->find();
        if($group){
            return false;
        }else{
            return true;
        }
    }

    //    //已有广告
    public function typecun(){
        $advertypes=M('advertypes t')->field(['Id'])->select();
        $type=array_column($advertypes,'id');
		if(count($advertypes)>0){
			$where['Type_Id']=array("in", $type);
		}else{
			$where=array();
		}
        $result =M('adeverinfoes')->where($where)->field(['count(Id) as total,Type_Id'])->group('Type_Id')->select();
        $data=array_column($result,'total','type_id');
        return $data;
    }

//查询广告位一条信息
    public function Infomone($id){
        $result =M("advertypes")->where('Id='.$id)->find();
        return $result;
    }

    public function adever(array $arr){
        $where=$this->setWhere($arr);
        $count=M('advertypes')->where($where)->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $result =M('advertypes')->where($where)->order('Id desc')-> limit($tol,$limit)->select();
        $data=$this->typecun();
        foreach($result as $k=>$v){
            if($data[$v['id']]){
                $result[$k]['total']=$data[$v['id']];
            }  else{
                $result[$k]['total']=0;
            }
        }
        $data=[
            'result'=>   $result,
            'count'=>$count
        ];
        return $data;
    }

    //getwhere拼接条件
    function setWhere($request){
        $where=[];

        if($request['type_name']){
            array_push($where," TypeName like '%".$request['type_name']."%'");

        }
        return $where;
    }
}