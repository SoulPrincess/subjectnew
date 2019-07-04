<?php
namespace Admin\Model;
use Think\Model;

class TallydataModel extends Model{

    //查询当天的pv值
    function dayinfo(){
        $now=M('tallydata')->field(['count(distinct tdid) as pv'])->where(['date'=>date('Y-m-d',time())])->find();
      return $now;
    }

    //查询统计概况
    function info(){
        $tallydata_=M('tallydata');
        $today=date('Y-m-d',time());
        $yesterday=date("Y-m-d",strtotime("-1 day"));
        $map['date'] =array('lt',$yesterday);

        $now=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,date,Round(count(distinct tdid)/count(distinct cookie),2) as avg'])->where(['date'=>$today])->select();
        if($now[0]['date']==NULL){
            $now[0]['date']=date("Y-m-d",time());
            $now[0]['avg']=0;
        }
        $yest=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,date,Round(count(distinct tdid)/count(distinct cookie),2) as avg'])->where(['date'=>$yesterday])->select();

        if($yest[0]['date']==NULL){
            $yest[0]['date']=date("Y-m-d",strtotime("-1 day"));
            $yest[0]['avg']=0;
        }
        $hebing=array_merge($now,$yest);

        $history=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,Round(count(distinct tdid)/count(distinct cookie),2) as avg'])->where($map)->select();
        $data=array_merge($hebing,$history);

        foreach($data as $k=>$v){
            if($v['date']==date('Y-m-d',time())){
                $data[$k]['date']='今日';
            }elseif($v['date']==date("Y-m-d",strtotime("-1 day"))){
                $data[$k]['date']='昨日';
            }else{
                $data[$k]['date']='历史累计';
            }
        }
        $result=[
            'result'=>   $data,
        ];
        return $result;
    }

    //获取受访分析
    public function page(array $arr){
        $tallydata_=M('tallydata');
        $data=$arr['type']==0?'uri':'sdns';
        $count=$tallydata_->field(['count(tdid)'])->group($data)->select();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $now=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,date,Round(count(distinct tdid)/count(distinct cookie),2) as avg,'.$data.' as referer'])
            ->group($data)
            ->limit($tol,$limit)
            ->select();
        $result=[
            'result'=>$now,
            'count'=>count($count)
        ];
        return $result;
    }

    //获取来路分析
    public function referrer(array $arr){
        $tallydata_=M('tallydata');

        $data=$arr['type']==0?'referer':'ydns';
        $count=$tallydata_->field(['count(tdid)'])->group($data)->select();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $now=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,date,Round(count(distinct tdid)/count(distinct cookie),2) as avg,'.$data.' as referer'])
            ->group($data)
            ->limit($tol,$limit)
			->order('time desc')
            ->select();
        $result=[
            'result'=>$now,
            'count'=>count($count)
        ];
        return $result;
    }

    //获取访问分析
    public function call(array $arr){
        $tallydata_=M('tallydata');
        $count=$tallydata_->count();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $now=$tallydata_->field(["ip,FROM_UNIXTIME(time,'%Y-%m-%d %H:%i:%s') as time,browser,referer,uri"])
            ->limit($tol,$limit)
			->order('time desc')
            ->select();
        $result=[
            'result'=>$now,
            'count'=>$count
        ];
        return $result;
    }
    //获取搜索引擎
    public function switchkey(array $arr){
        $tallydata_=M('tallydata');
        $data=$arr['type']==0?'keyword':'se';
        $count=$tallydata_->field(['count(tdid)'])->group($data)->select();
        //获取每页显示的条数
        $limit= $arr['limit'];
        //获取当前页数
        $page= $arr['page'];
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $now=$tallydata_->field(['count(distinct ip) as ip,count(distinct tdid) as pv,count(distinct cookie) as uv,date,Round(count(distinct tdid)/count(distinct cookie),2) as avg,'.$data.' as referer'])
            ->group($data)
            ->limit($tol,$limit)
            ->select();
        $result=[
            'result'=>$now,
            'count'=>count($count)
        ];
        return $result;
    }

//     保留数据
//    $date=date('Y-m-d',time());  //当天之前
//    $date= date('Y-m-d', strtotime('-7 days'));  //7天之前
//    $date= date('Y-m-d', strtotime('-1 year'));  //一年之前
    function deltype($date){
        $where['date']=array('lt',$date);
        $c = M('tallydata');
        $count=$c->where($where)->delete();
        saveLog('访问统计记录删除条数'.$date.":  ", $count, 'tallydata');
    }
}