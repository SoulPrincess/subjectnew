<?php
namespace Admin\Controller;

use Admin\Model\AdeverinfoesModel;
use Admin\Model\AdvertypesModel;
use Think\Controller;
use yii\web\Cookie;

class TallyTotalController extends Controller {
    public function index(){
        if($_SERVER['SERVER_NAME']!='subject.com'&& $_SERVER['SERVER_NAME']!='www.subject.com') exit;
        $add['ip']=ip2long(get_client_ip());
        //设置cookie
        if(!cookie('gcweb')){
            $value=md5(microtime().$add['ip'].rand());

            $overTime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-time();
            cookie('gcweb',$value,time()+$overTime);
        }
        $gcweb=cookie('gcweb');
        $add['cookie']=$gcweb;
        $add['date']=date('Y-m-d');
        $add['time']=time();
        $add['uri']=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $add['referer']=$_SERVER['HTTP_REFERER'];
        $tallydata_=D('Tallydata');
        $tallydata_->create($add);
        $tallydata_->add();
    }

//    public function saveData()
//    {
//        $tally_=D('Tally');
//        $tallydata_=D('Tallydata');
//        $nowDate=date('Y-m-d',time()-3600*24);
//
//        $now['date']=$nowDate;
//        $now['iptotal']=gototal($nowDate,'ip');
//        $now['pvtotal']=$tallydata_->count(array('date'=>$nowDate),'tdid');
//        $now['dltotal']=gototal($nowDate,'cookie');
//
//        if($tally=$tally_->find(array('date'=>$nowDate))){
//            $tally_->save(array('iptotal'=>$now['iptotal'],'pvtotal'=>$now['pvtotal'],'dltotal'=>$now['dltotal']),array('date'=>$nowDate));
//        }else{
//            $tally_->create($now);
//            $tally_->add();
//        }
//        $timeDel=time()-3600*24*50;
//        $tallydata_->query("delete from `tallydate` where `time`< $timeDel");
//        echo 'Success'+date('Y-m-d H:i:s');
//    }


}