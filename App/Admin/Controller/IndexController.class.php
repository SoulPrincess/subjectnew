<?php
namespace Admin\Controller;

use Admin\Model\UserinfoesModel;
use Think\Controller;


class IndexController extends BaseController
{
    /*
     * 后台首页
     */
    public function home()
    {
        $info = new PublicController();
        $cpu = $info->getCpuUsage();
        $memory = $info->getMemoryUsage();
        $data=array('cpu'=>$cpu,'memory'=>$memory['usage']);
        $this->assign('datacpu',$data);
        $this->display();
    }
    //***************获取浏览器饼图展示*************
    public function bower()
    {
        $tallydata=M('tallydata');
        $now=$tallydata->field(["browser as name,count(tdid) as value"])->group('browser')
            ->select();
        $data=array(
            "status"=>1,
            "data"=>$now,
        );
        $this->ajaxReturn($data,'JSON');

    }

    //****************最近一周的访客******************
    public function caller()
    {
    //        $time['start_time'] =date('Y-m-d', strtotime('-1 week last monday')); //获取上周周一
    //        $time['end_time'] =date('Y-m-d', strtotime('-1 week sunday'));        //获取上周周日

        $time['start_time'] =date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600));  //获取本周周一
        $time['end_time'] =date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600)); //获取本周周日
        $time_sc = Yoko_time($time);
        foreach ($time_sc as $key => $value) {
            /* 时间条件 */
            $map =array();
            $map["time"]=array(array('egt',strtotime($value." 00:00:00")),array('ELT',strtotime($value." 23:59:59")));
            /* 资讯本周每天记录数 */
            $tallydata=M("tallydata")->where( array('time'=>$map["time"]))->count();
            $tallydata_count[] = $tallydata;
           
        }
        $weektime=array(
            '周一','周二','周三','周四','周五','周六','周日'
        );
        $data=array(
            "status"=>1,
            "time_sc"=>$weektime,
            "data"=>$tallydata_count,
        );
        $this->ajaxReturn($data,'JSON');
    }
    //****************每个时间段的pv值******************
    public function eachpv()
    {
        $datehour=array(
                '00:00','2:00','4:00','6:00','8:00','10:00','12:00','14:00','16:00','18:00','20:00','22:00'
            );
        $time['start_time']=strtotime(date('Y-m-d',time()-7*24*60*60));
        $time['end_time']=strtotime(date('Y-m-d',time()-7*24*60*60))+86400;

        foreach ($datehour as $key => $value) {
            if($datehour[$key+1]){
                /* 时间条件 */
                $map =array();
                $map["time"]=array(array('egt',strtotime($value)),array('ELT',strtotime($datehour[$key+1])));
                $map["weektime"]=array(array('egt',strtotime($value)-7*24*60*60),array('ELT',strtotime($datehour[$key+1])-7*24*60*60));
                /* 资讯本周每天记录数 */
                $tallydata=M("tallydata")->where( array('time'=>$map["time"]))->count();
                $weekdata=M("tallydata")->where( array('time'=>$map["weektime"]))->count();
                $tallydata_count[] = $tallydata;
                $weekdata_count[] = $weekdata;
            }
        }
       $data=array(
           "status"=>1,
           "data"=>$tallydata_count,
           "weekdata"=>$weekdata_count,
           'hours'=>$datehour
       );
       $this->ajaxReturn($data,'JSON');
    }
    //****************今日热搜******************
    public function hotsearch()
    {
         if(IS_AJAX){
             $time['date']=date('Y-m-d',time());
             $count=M("tallydata")->field(['keyword as name,count(distinct tdid) as number,count(distinct cookie) as usernumber'])->where($time)->group('keyword')->select();
             //获取每页显示的条数
             $limit= $_GET['limit'];
             //获取当前页数
             $page= $_GET['page'];
             //计算出从那条开始查询
             $tol=($page-1)*$limit;
             $tallydata=M("tallydata")->field(['keyword as name,count(distinct tdid) as number,count(distinct cookie) as usernumber'])->where($time)->group('keyword')->limit($tol,$limit)->select();

             $data=array(
                 "code"=>0,
                 "message"=>'',
                 "data"=>$tallydata,
                 "count"=>count($count),
             );
             $this->ajaxReturn($data,'JSON');
         }
    }
    //****************网站流量******************
    public function traffic()
    {
        //总共网站流量
//        $tallydata=M("tallydata")->field(['Round((count(distinct ip)/count(distinct tdid)),2) as avg'])->select();
//        $datainfo=array_column($tallydata,'avg');
        //当天网站流量
        $time['date']=date('Y-m-d',time());
        $tally=M("tallydata")->field(['Round((count(distinct ip)/count(distinct tdid))*100,0) as avg'])->where($time)->select();

        $dayinfo=array_column($tally,'avg');

        $data=array(
            "status"=>1,
            "data"=>$dayinfo,
        );
        $this->ajaxReturn($data,'JSON');
    }
}