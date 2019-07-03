<?php
namespace Home\Controller;

use Think\Controller;
use Admin\Model\ProgramasModel;
use Admin\Model\LgclassesModel;

class BaseController extends Controller
{
    public function _initialize()
    {
        $websys = C('CPU_PATH')."static_pseudo.txt";
        if(file_exists($websys)){
            $content=file_get_contents($websys);
            $switch=unserialize($content);
            C('PSEUDO',$switch['switch']);//是否开启伪静态
        }
        $service = C('CPU_PATH')."total_site.txt";
        if(file_exists($service)){
            $servicetype=file_get_contents($service);
            $ser=unserialize($servicetype);
            C('total',$ser['switch']);
        }
        //网站基本信息
        $websys = C('CPU_PATH')."websys.txt";
        if(file_exists($websys)){
            $content=file_get_contents($websys);
            $wehsysdata=unserialize($content);
            C('wehsys',$wehsysdata);
        }
        //第三方代码
        $websyscode = C('CPU_PATH') . "websyscode.txt";
        if (file_exists($websyscode)) {
            $code = file_get_contents($websyscode);
            $datainfo =unserialize($code);
            C('websyscode',$datainfo);
        }
      /*导航栏展示*/
        $class=new ProgramasModel();
        $navigationdata=$class->parentpro();
        $this->assign('navigation',$navigationdata);
        /*我们的客户*/
        $type=M('smclasses')->where(['SmName'=>'我们的客户','Lock'=>1])->find();
        $data=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate asc','Lock desc'])->limit(4)->select();
        foreach($data as $k=>$v){
            $type['info'][$k]=$v;
        }
        $this->assign('our_customers',$type);
    }
}