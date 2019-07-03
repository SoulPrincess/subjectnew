<?php
namespace Admin\Controller;

use Admin\Model\AnchortextModel;
use Admin\Model\InformationModel;
use Admin\Model\ServiceinfoModel;
use Admin\Model\TallydataModel;
use Think\Exception;


class MarketingController extends BaseController {
    /*
     * 网站营销
     */
    //*****************访问统计*******************
    public function totalsite()
    {
        if (IS_POST) {
            if (false !== fopen(C('CPU_PATH') . "total_site.txt", 'w+')) {
                $total = file_put_contents(C('CPU_PATH') . "total_site.txt", serialize($_POST));
                if ($total) {
                    $info['info'] = '保存成功';
                    $info['status'] = 1;

                } else {
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
            $service = C('CPU_PATH')."total_site.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $info['info'] = $ser;
                $info['status'] = 1;
                $this->ajaxReturn($info, 'JSON');
            }else {
                $info['info'] = '';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }
    }
    //********************统计概况*****************************
    public function marketinfo(){
        if(IS_AJAX){
            $tally= new  TallydataModel();
            $tallyinfo=$tally->info();
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$tallyinfo['result'],
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //********************受访分析*****************************
    public function pageinfo(){
        if(IS_AJAX){
            $tally= new  TallydataModel();
            $tallyinfo=$tally->page($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$tallyinfo['result'],
                'count'=>$tallyinfo['count']
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //********************来路分析*****************************
    public function referrerinfo(){
        if(IS_AJAX){
            $tally= new  TallydataModel();
            $tallyinfo=$tally->referrer($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$tallyinfo['result'],
                'count'=>$tallyinfo['count']
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //********************访问分析*****************************
    public function callinfo(){
        if(IS_AJAX){
            $tally= new  TallydataModel();
            $tallyinfo=$tally->call($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$tallyinfo['result'],
                'count'=>$tallyinfo['count']
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }
    //********************搜索引擎*****************************
    public function switchinfo(){
        if(IS_AJAX){
            $tally= new TallydataModel();
            $tallyinfo=$tally->switchkey($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "data"=>$tallyinfo['result'],
                'count'=>$tallyinfo['count']
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }
    }

    //*****************删除今天之前的统计**********************
    public function totaldel(){
        if(IS_AJAX){
            $where['date']=array('lt',date('Y-m-d',time()));
            $c = M('tallydata');
            $n = $c->where($where)->delete();
            if ($n) {
                $info['info'] = '删除成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $info['info'] = '请求错误';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }


    //*******************seo参数设置********************
    public function seoinfo(){
        if(IS_AJAX) {
            $websys = C('CPU_PATH')."websys.txt";
            if(file_exists($websys)){
                $content=unserialize(file_get_contents($websys));
                $webname=$content['web']['name'];
                $webkeywords=$content['web']['keywords'];
                if(I('home_title')==''){
                    $_POST['home_title']=$webkeywords.$webname;
                }
                switch (I('page_title')){
                    case'0':
                        $page_name=$_POST['home_title'];
                        break;
                    case'1':
                        $page_name=$_POST['home_title'].$webkeywords;
                        break;
                    case'2':
                        $page_name=$_POST['home_title'].$webname;
                        break;
                    case'3':
                        $page_name=$_POST['home_title'].$webkeywords.$webname;
                        break;
                }
                $_POST['page_name']=$page_name;
                if (false !== fopen(C('CPU_PATH') . "seo_canshu.txt", 'w+')) {
                    $total = file_put_contents(C('CPU_PATH') . "seo_canshu.txt", serialize($_POST));
                    if ($total) {
                        $info['info'] = '保存成功';
                        $info['status'] = 1;

                    } else {
                        $info['info'] = '保存失败';
                        $info['status'] = 0;
                    }
                }else{
                    $info['info'] = '文件打开失败！';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }else{
                $info['info'] = '先设置网站设置';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');

            } else {
            $service = C('CPU_PATH')."seo_canshu.txt";
                if(file_exists($service)){
                    $servicetype=file_get_contents($service);
                    $ser=unserialize($servicetype);
                    $this->assign('seo_canshu',$ser);
                }else {
                    $this->assign('seo_canshu',[]);
                }
            $service = C('CPU_PATH')."seo_sitemap.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $this->assign('seo_sitemap',$ser);
            }else {
                $this->assign('seo_sitemap',[]);
            }
            $this->display();
            }
    }

    //***************************站内锚文本*************
    public function anchor(){
        if(IS_AJAX){
            $infodata=   new AnchortextModel();
            $datas=$infodata->adever($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "count"=>$datas['count'],
                "data"=>$datas['result'],
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $this->display();
        }

    }
//***************************站内锚文本添加*************
    public function anchoradd(){
        if(IS_AJAX){
            $Rule = M('anchortext');
            $data = $Rule->create();
            //添加时默认值
            $data['Original']  = I('post.oldtext');
            $data['Newtext'] =I('post.newtext');
            $data['Titile']=I('post.title');
            $data['Chained']=I('post.Chained');
            $data['ReplaceCount']=1;
            $data['Lock'] =1;
            //提交
            $res = $Rule->add($data);
            if($res){

               $this->maocontent($res);
               $info['info'] = '添加成功';
               $info['status'] = 1;
            }else{
                $info['info'] = '添加失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        }else{
            $this->display();
        }
    }

    //修改文章锚文本
    public function maocontent($id){
            $mao=M('anchortext')->where(['id'=>$id])->select();
            $Information= new InformationModel();
            $content=$Information->Infoall();
            $arr=array_column($content,'describe','id');
            foreach($arr as $k=>$v){
                //修改文章内容
                $v=setAnchors($v,$mao);
                M('information')->where(['Id'=>$k])->save(['Describe'=>$v]);
            }
    }
//***************************站内锚文本修改*************
    public function anchorupdate(){
        if(IS_AJAX){
            $Rule = M('anchortext');
            $data = $Rule->create();
            //添加时默认值
            $data['Original']  = I('post.oldtext');
            $data['Newtext'] =I('post.newtext');
            $data['Titile']=I('post.title');
            $data['Chained']=I('post.Chained');
            $data['id'] =I('post.id');
            //提交
           $Rule->where(['id'=>$data['id']])->setInc('ReplaceCount', 1);
            $res = $Rule->save($data);
            if($res){
                $this->maocontent($data['id']);
                $info['info'] = '修改成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');

        }else{
            $infomodel= new AnchortextModel();
            $data=$infomodel->Infomone(I('get.id'));
            $this->assign('datainfo',$data);
            $this->display();
        }
    }

    //***********站内锚文本删除***************
    function anchordel(){
        if (IS_AJAX) {
            $c = M('anchortext');
            $ids = I('post.arr');

            //接受删除id
            $ini['Id'] = array('in', $ids);

            $n = $c->where($ini)->delete();
            if ($n) {
                $info['info'] = '删除成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }

    }
    //***********站内锚文本状态***************
    public function anchorstatus(){
        if (IS_AJAX) {
            $Rule = M('anchortext');
            $data = array(
                'id'      => I('post.id'),
                'Lock'  => I('post.off')==1?0:1,
            );
            $res = $Rule->save($data);
            if ($res) {
                $info['info'] = '设置成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');

        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }
    //客服列表
    public function customer(){
        if(IS_AJAX){
            $service= new  ServiceinfoModel();
            $datas=$service->Infom($_GET);
            $data=array(
                "code"=>0,
                "message"=>'',
                "count"=>$datas['count'],
                "data"=>$datas['result'],
            );
            $this->ajaxReturn($data,'JSON');
        }else{
            $service = C('CPU_PATH')."service.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $ser['typejs']=htmlspecialchars_decode($ser['typejs']);

                $this->assign('service',$ser);
            }else {
                $this->assign('service',[]);
            }
            $this->display();
        }

    }

    //***************************添加客服*************
    public function serviceadd(){
        if(IS_AJAX){
            $Rule = M('serviceinfo');
            $data = $Rule->create();
            //添加时默认值
            $data['ServiceName']  = I('post.name');
            $data['ServiceQQ'] =I('post.qq');
            $data['ServiceMSN']=I('post.msn');
            $data['ServiceTW']=I('post.taow');
            $data['ServicealiW']=I('post.aliw');
            $data['ServiceSkype']=I('post.skype');
            $data['ReleaseDate']=date('Y-m-d H:i:s',time());
            $data['Lock'] =1;
            //提交
            $res = $Rule->add($data);

            if($res){
                $info['info'] = '添加成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '添加失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');

        }else{
            $this->display();
        }
    }
    //*******************修改客服***************
    public function serviceupdate()
    {
        if (IS_AJAX) {
            $Rule = M('serviceinfo');
            $data['ServiceName']  = I('post.name');
            $data['ServiceQQ'] =I('post.qq');
            $data['ServiceMSN']=I('post.msn');
            $data['ServiceTW']=I('post.taow');
            $data['ServicealiW']=I('post.aliw');
            $data['ServiceSkype']=I('post.skype');
            $data=array(
                'ServiceName' => I('post.name'),
                'Sort' => I('post.sort'),
                'ServiceQQ' => I('post.qq'),
                'ServiceMSN' => I('post.msn'),
                'ServiceTW' => I('post.taow'),
                'ServicealiW' => I('post.aliw'),
                'ServiceSkype' => I('post.skype'),
            );
            //修改
            $res = $Rule->where(['id=' . I('post.id')])->save($data);
            if ($res) {
                $info['info'] = '修改成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '修改失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }

    //*******************修改客服状态***************
    public function servicestatus()
    {
        if (IS_AJAX) {
            $Rule = M('serviceinfo');
            $data = array(
                'id'      => I('post.id'),
                'Lock'  => I('post.off')==1?0:1,
            );
            $res = $Rule->save($data);
            if ($res) {
                $info['info'] = '设置成功';
                $info['status'] = 1;
            }else{
                $info['info'] = '设置失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info,'JSON');
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }
    }

    //***********客服删除***************
    function servicedel(){
        if (IS_AJAX) {
            $c = M('serviceinfo');
            $ids = I('post.arr');

            //接受删除id
            $ini['Id'] = array('in', $ids);

            $n = $c->where($ini)->delete();
            if ($n) {
                $info['info'] = '删除成功';
                $info['status'] = 1;
            } else {
                $info['info'] = '删除失败';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }

    }


    //***********客服样式设置***************
    function servictype(){
        if (IS_AJAX) {
            $str="";
            if(I('post.type')){
                $id="$('#defined_type')";
                switch (I('post.type')){
                    case "fixedleft":
                        $fixed="'left'";
                        break;
                    case "fixedright":
                        $fixed="'right'";
                        break;
                    case "scrollleft":
                        $scroll="'left'";
                        break;
                    case "scrollright":
                        $scroll="'right'";
                        break;
                    case "colse":
                        break;

                }
                if($fixed){
                    $str= htmlspecialchars("<script type='text/javascript'> ".$id.".css({'width':'50px','height':'100px','border':'1px solid','position':'fixed','z-index':'999'});if(![1,] &&!new XMLHttpRequest()){".$id.".css({".$fixed.":5,'top': ($(window).height() - ".$id.".outerHeight())/2});
                //窗口改变事件
                $(window).on('resize scroll',function(){
                    ".$id.".css({
                        ".$fixed.": 5,
                        'top' :($(window).height() - ".$id.".outerHeight())/2+ $(window).scrollTop()
                    });
                });
            }else{
                ".$id.".css({
                    ".$fixed.":5,
                    'top': ($(window).height() - ".$id.".outerHeight())/2
                });
                //窗口改变事件
                $(window).on('resize scroll',function(){
                    ".$id.".css({
                        ".$fixed.": 5,
                        'top' :($(window).height() - ".$id.".outerHeight())/2
                    });});}</script>");
                }else if($scroll){
                    $str=htmlspecialchars("<script> ".$id.".css({'width':'50px','height':'100px','border':'1px solid','position':'absolute','top':'100px',".$scroll.":'5px','z-index':'999'});
var menuYloc = $('#defined_type_right_src').offset().top;
        $(window).scroll(function () {
            var offsetTop = menuYloc + $(window).scrollTop() + 'px';
            ".$id.".animate({ top: offsetTop }, { duration: 100, queue: false });
        });
</script>");
                }else{
                    $str=htmlspecialchars("<script>".$id.".remove();</script>");
                }
            }
            $_POST['typejs']=$str;
            if(false!==fopen(C('CPU_PATH')."service.txt",'w+')){
                $total= file_put_contents(C('CPU_PATH')."service.txt", serialize($_POST));
                if($total){
                    $info['info'] = '保存成功';
                    $info['status'] = 1;

                }else{
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info,'JSON');
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info,'JSON');
            }
        }else{
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }

    }


    //伪静态规则
    public function pseudostatic(){
        $this->display();
    }

    //************SiteMap网站地图**********************
    function sitemap(){
        if(IS_AJAX){
            $site = new Sitemap();
            $cate = M('information')->field(array('Id'))->select();
            foreach ($cate as $v)
            {
                $site->AddItem($_SERVER['SERVER_NAME'].'/contentinfo.html?id='.$v['id'], 1);
            }
            if($_POST['site_map']==0){
                $str='sitemap.xml';
            }else{
                $str='sitemap.txt';
            }
            $site->SaveToFile($str);
            if (false !== fopen(C('CPU_PATH') ."seo_sitemap.txt", 'w+')) {
                $total = file_put_contents(C('CPU_PATH') . "seo_sitemap.txt", serialize($_POST), FILE_APPEND|LOCK_EX);
                if ($total) {
                    $info['info'] = '保存成功';
                    $info['status'] = 1;

                } else {
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
            }
            $this->ajaxReturn($info, 'JSON');
        }else{
            $service = C('CPU_PATH')."seo_sitemap.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $this->assign('seo_sitemap',$ser);
            }else {
                $this->assign('seo_sitemap',[]);
            }
            $this->display();
        }

    }

    //*****************静态页面设置******************
    public function static_site(){
        if(IS_POST){
            if (false !== fopen(C('CPU_PATH') ."seo_static.txt", 'w+')) {
                $total = file_put_contents(C('CPU_PATH') . "seo_static.txt", serialize($_POST));
                if ($total) {
                    $info['info'] = '保存成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }else{
            $service = C('CPU_PATH')."seo_static.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $info['info'] = $ser;
                $info['status'] = 1;
                $this->ajaxReturn($info, 'JSON');
            }else {
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }
    }
    //*****************伪静态设置******************
    public function static_save(){
        if(IS_POST){
            if (false !== fopen(C('CPU_PATH') ."static_pseudo.txt", 'w+')) {
                $total = file_put_contents(C('CPU_PATH') . "static_pseudo.txt", serialize($_POST));
                if ($total) {
                    $info['info'] = '保存成功';
                    $info['status'] = 1;
                } else {
                    $info['info'] = '保存失败';
                    $info['status'] = 0;
                }
                $this->ajaxReturn($info, 'JSON');
            }else{
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }else{
            $service = C('CPU_PATH')."static_pseudo.txt";
            if(file_exists($service)){
                $servicetype=file_get_contents($service);
                $ser=unserialize($servicetype);
                $info['info'] = $ser;
                $info['status'] = 1;
                $this->ajaxReturn($info, 'JSON');
            }else {
                $info['info'] = '文件打开失败！';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }
    }
    //*********************一键生成前台静态页面****************************
    public function sethtmlall(){
        if(IS_AJAX){
            $arr=initperm();
            if($arr){
                $i=0;
                $j=0;
                foreach($arr as $k=>$v){
                    if(R($v['url'])===false){
                        $j++;
                        saveLog('生成静态文件失败：',$v['url'], 'sethtmlall');
                    }else{
                        saveLog('生成静态文件成功：',$v['url'], 'sethtmlall');
                        $i++;
                    }
                }
                $info['info'] = '生成'.$i."静态页面,失败".$j."个";
                $info['status'] = 1;
                $this->ajaxReturn($info, 'JSON');
            }else{
                $info['info'] = '没有可生成的静态页面';
                $info['status'] = 0;
                $this->ajaxReturn($info, 'JSON');
            }
        }else{
            $info['info'] = '请求错误！';
            $info['status'] = 0;
            $this->ajaxReturn($info, 'JSON');
        }

    }
    //***************下载所有的静态页面*************************
    public function download_static(){
        // 不限制执行时间
        ini_set('max_execution_time',0);
        // 不限制内存使用
        ini_set('memory_limit',-1);

        //PHP压缩文件夹为zip压缩文件
        if(zipFolder(HTML_PATH,'/statichtml.zip')){
            $info['info'] = '下载成功！';
            $info['status'] = 1;
        }else{
            $info['info'] = '下载失败！';
            $info['status'] = 0;
        }
        $this->ajaxReturn($info, 'JSON');
        ob_end_clean();
        header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename='.basename("/statichtml.zip"));
        header('Content-Length: '.filesize("/statichtml.zip"));
        error_reporting(0);
        @readfile("/statichtml.zip");
        flush();
        ob_flush();
        exit;
    }
}