<?php
namespace Home\Controller;

use Admin\Model\TallydataModel;
use Think\Controller;

class TallyTotalController extends Controller {
    public function _initialize()
    {
        $service = C('CPU_PATH')."total_site.txt";
        if(file_exists($service)){
            $servicetype=file_get_contents($service);
            $ser=unserialize($servicetype);
            C('total',$ser);//访问统计参数设置
            switch(C('total.total_time')) {
                case 0:break;//从不
                case 1:;
                 $date=date('Y-m-d',time());  //当天之前
                    TallydataModel::deltype($date);
                    break;
                case 3:;
                $date= date('Y-m-d', strtotime('-7 days'));  //7天之前
                    TallydataModel::deltype($date);
                    break;
                case 4:;
                $date= date('Y-m-d', strtotime('-1 year'));  //一年之前
                    TallydataModel::deltype($date);
                    break;
            }
        }
    }
    public function index(){
        if(C('total.switch')=='on'){
            $total=  new TallydataModel();
            $totalpv=$total->dayinfo();
            //每日不能超出设定的最大pv值
            if($totalpv['pv']<C('total.total_maxpv')){
                if($_SERVER['SERVER_NAME']!='sfengrz.com'&& $_SERVER['SERVER_NAME']!='www.sfengrz.com') exit;
                $add['ip']=get_client_ip();
                //设置cookie
                if(!cookie('gcweb')){
                    $value=md5(microtime().$add['ip'].rand());
                    $overTime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-time();
                    cookie('gcweb',$value,time()+$overTime);
                }
                $bower=browser($_SERVER['HTTP_USER_AGENT']);
                $add['browser']=isset($bower)?$bower:"其他";//浏览器
                $host=parse_url($_SERVER['HTTP_ORIGIN']);//来路的域名
                $add['ydns']=isset($host['host'])?$host['host']:'直接输入网址或书签';
                $add['sdns']=$_SERVER['SERVER_NAME'];//受访的域名
                $add['cookie']=cookie('gcweb');
                $add['date']=date('Y-m-d');
                $add['time']=time();
                $add['uri']=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                if(isset($_SERVER['HTTP_REFERER'])){
                    $add['referer']=$_SERVER['HTTP_REFERER'];
                   $data= switchkey($_SERVER['HTTP_REFERER']);
                   $add['keyword']=$data['keyword']!=''?$data['keyword']:'其他';
                   $add['se']=$data['urlname']==$host['host']?'其他':$data['urlname'];
                }else{
                    $add['referer']='直接输入网址或书签';
                    $add['keyword']='其他';
                    $add['se']='其他';
                }
                $tallydata_=D('Tallydata');
				
                $tallydata_->create($add);
                $tallydata_->add();
            }
        }
    }
}