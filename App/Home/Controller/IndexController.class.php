<?php
namespace Home\Controller;

use Admin\Model\LgclassesModel;

use Think\Controller;

class IndexController extends BaseController
{
    

    /*首页*/
    public function index()
    {
        $type=M('smclasses')->where(['SmName'=>'首页-f1','Lock'=>1])->find();
        $data=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data as $k=>$v){
            $type['info'][$k]=$v;
        }
        $type2=M('smclasses')->where(['SmName'=>'首页-f2','Lock'=>1])->find();
        $data2=M('information')->where(['Lock'=>1,'Sm_Id'=>$type2['id']])->order(['ReleaseDate desc','Lock desc'])->limit(4)->select();
        foreach($data2 as $k=>$v){
            $type2['info'][$k]=$v;
        }
        $type3=M('smclasses')->where(['SmName'=>'我们的优势','Lock'=>1])->find();
        $data3=M('information')->where(['Lock'=>1,'Sm_Id'=>$type3['id']])->order(['ReleaseDate desc','Lock desc'])->limit(3)->select();
        foreach($data3 as $k=>$v){
            preg_match(' /<img.*?src="?(.*?)"?\s.*?>/i',$v['describe'],$match);
            $type3['info'][$k]=$v;
            $type3['info'][$k]['futupian']=$match[1];
            $type3['info'][$k]['miaoshu']=preg_replace(' /<img.*?src="?(.*?)"?\s.*?>/i','',$v['describe']);
        }
        $this->assign('index1',$type);
        $this->assign('index2',$type2);
        $this->assign('index3',$type3);
        $this->buildHtml('index', HTML_PATH . '/','Home@index:index', 'utf8');
        $this->display();

    }
    /*数字营销*/
    public function digital_marketing()
    {
        $type=M('smclasses')->where(['SmName'=>'数字营销-f1','Lock'=>1])->find();
        $data=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data as $k=>$v){
            $type['info'][$k]=$v;
        }
        $type2=M('smclasses')->where(['SmName'=>'数字营销-f2','Lock'=>1])->find();
        $data2=M('information')->where(['Lock'=>1,'Sm_Id'=>$type2['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data2 as $k=>$v){
            $type2['info'][$k]=$v;
        }
        $type3=M('smclasses')->where(['SmName'=>'数字营销-f3','Lock'=>1])->find();
        $data3=M('information')->where(['Lock'=>1,'Sm_Id'=>$type3['id']])->order(['ReleaseDate desc','Lock desc'])->limit(2)->select();
        foreach($data3 as $k=>$v){
            $type3['info'][$k]=$v;
        }
        $type4=M('smclasses')->where(['SmName'=>'数字营销-f4','Lock'=>1])->find();
        $data4=M('information')->where(['Lock'=>1,'Sm_Id'=>$type4['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data4 as $k=>$v){
            $type4['info'][$k]=$v;
        }
        $this->assign('marketing',$type);
        $this->assign('marketing2',$type2);
        $this->assign('marketing3',$type3);
        $this->assign('marketing4',$type4);
        $this->buildHtml('digital_marketing', HTML_PATH . '/','Home@index:digital_marketing', 'utf8');

        $this->display();

    }
    /*品牌防伪*/
    public function brand_anti()
    {
        $type=M('smclasses')->where(['SmName'=>'品牌防伪-f1','Lock'=>1])->find();
        $data=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data as $k=>$v){
            $type['info'][$k]=$v;
        }
        $type1=M('smclasses')->where(['SmName'=>'品牌防伪-f2','Lock'=>1])->find();
        $data1=M('information')->where(['Lock'=>1,'Sm_Id'=>$type1['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data1 as $k=>$v){
            $type1['info'][$k]=$v;
        }
        $type2=M('smclasses')->where(['SmName'=>'品牌防伪-f3','Lock'=>1])->find();
        $data2=M('information')->where(['Lock'=>1,'Sm_Id'=>$type2['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data2 as $k=>$v){
            $type2['info'][$k]=$v;
        }
        $type3=M('smclasses')->where(['SmName'=>'品牌防伪-f4','Lock'=>1])->find();
        $data3=M('information')->where(['Lock'=>1,'Sm_Id'=>$type3['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data3 as $k=>$v){
            $type3['info'][$k]=$v;
        }
        $type4=M('smclasses')->where(['SmName'=>'品牌防伪-f5','Lock'=>1])->find();
        $data4=M('information')->where(['Lock'=>1,'Sm_Id'=>$type4['id']])->order(['ReleaseDate asc','Lock desc'])->limit(6)->select();
        foreach($data4 as $k=>$v){
            $type4['info'][$k]=$v;
        }
        $this->assign('brand',$type);
        $this->assign('brand1',$type1);
        $this->assign('brand2',$type2);
        $this->assign('brand3',$type3);
        $this->assign('brand4',$type4);
        $this->buildHtml('brand_anti', HTML_PATH . '/','Home@index:brand_anti', 'utf8');

        $this->display();

    }
    /*新闻资讯*/
    public function news_information()
    {
        if(IS_AJAX){
            $type=M('smclasses')->where(['SmName'=>'新闻中心','Lock'=>1])->find();
            $count=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->count();
            //获取每页显示的条数
            $limit= $_POST['limit'];
            //获取当前页数
            $page= $_POST['page'];
            //计算出从那条开始查询
            $tol=($page-1)*$limit;
            $data1=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->limit($tol,5)->select();
            foreach($data1 as $k=>$v){
                $type['info'][$k]=$v;
            }
            $datas=array( 'info'=>$type,'count'=>$count);
            $this->ajaxReturn($datas,'JSON');
        }ELSE{
            $this->buildHtml('news_information', HTML_PATH . '/','Home@index:news_information', 'utf8');
            $this->display();
        }
    }
    /*产品溯源*/
    public function product_traceability()
    {
        $data1=M('productinfoes p')->field("p.*,s.typename",false)->join(" LEFT JOIN producttypes s ON s.Id=p.Type_Id")->where(['p.Lock'=>1,'s.typename'=>'产品溯源-f1'])->order(['p.ProductDate desc','p.Lock desc'])->find();

        $data2=M('productinfoes p')->field("p.*,s.typename",false)->join(" LEFT JOIN producttypes s ON s.Id=p.Type_Id")->where(['p.Lock'=>1,'s.typename'=>'产品溯源-f2'])->order(['p.ProductDate desc','p.Lock desc'])->find();

        $type=M('producttypes')->where(['typename'=>'溯源设备'])->find();
        $data3=M('productinfoes')->where(['Lock'=>1,'type_id'=>$type['id']])->order(['ProductDate desc','Lock desc'])->limit(8)->select();
        foreach($data3 as $k=>$v){
            $type['pro'][$k]=$v;
        }
        $this->assign('productf1',$data1);
        $this->assign('productf2',$data2);
        $this->assign('productf3',$type);
        $this->buildHtml('product_traceability', HTML_PATH . '/','Home@index:product_traceability', 'utf8');
        $this->display();

    }
    /*产品防窜*/
    public function products_running()
    {
        $data1=M('productinfoes p')->field("p.*,s.typename",false)->join(" LEFT JOIN producttypes s ON s.Id=p.Type_Id")->where(['p.Lock'=>1,'s.typename'=>'产品防窜-f1'])->order(['p.ProductDate desc','p.Lock desc'])->find();
        $type=M('producttypes')->where(['Lock'=>1,'typename'=>'防窜货系统功能模块'])->find();
        $data2=M('productinfoes')->where(['Lock'=>1,'type_id'=>$type['id']])->order(['ProductDate desc','Lock desc'])->limit(8)->select();
        foreach($data2 as $k=>$v){
            $type['pro'][$k]=$v;
        }

        $this->assign('productf1',$data1);
        $this->assign('productf2',$type);
        $this->buildHtml('products_running', HTML_PATH . '/','Home@index:products_running', 'utf8');

        $this->display();

    }
    /*关于我们*/
    public function about_us()
    {
        $type=M('smclasses')->where(['SmName'=>'关于我们-f1','Lock'=>1])->find();
        $data=M('information')->where(['Lock'=>1,'Sm_Id'=>$type['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data as $k=>$v){
            $type['info'][$k]=$v;
        }
        $type1=M('smclasses')->where(['SmName'=>'关于我们-f2','Lock'=>1])->find();
        $data1=M('information')->where(['Lock'=>1,'Sm_Id'=>$type1['id']])->order(['ReleaseDate desc','Lock desc'])->limit(2)->select();
        foreach($data1 as $k=>$v){
            $type1['info'][$k]=$v;
        }
        $type2=M('smclasses')->where(['SmName'=>'关于我们-f3','Lock'=>1])->find();
        $data2=M('information')->where(['Lock'=>1,'Sm_Id'=>$type2['id']])->order(['ReleaseDate desc','Lock desc'])->find();
        foreach($data2 as $k=>$v){
            $type2['info'][$k]=$v;
        }
        $type3=M('smclasses')->where(['SmName'=>'关于我们-f4','Lock'=>1])->find();
        $data3=M('information')->where(['Lock'=>1,'Sm_Id'=>$type3['id']])->order(['ReleaseDate desc','Lock desc'])->limit(4)->select();
        foreach($data3 as $k=>$v){
            $type3['info'][$k]=$v;
        }
//        print_r($type1);die;
        $this->assign('aboutf1',$type);
        $this->assign('aboutf0',$type1);
        $this->assign('aboutf2',$type2);
        $this->assign('aboutf3',$type3);
        $this->buildHtml('about_us', HTML_PATH . '/','Home@index:about_us', 'utf8');

        $this->display();

    }
    /*新闻详情*/
    public function news_detail()
    {
        $result =M("information")->where(['Id='.I('get.id')])->find();
        $this->assign('result',$result);
        $this->buildHtml('news_detail', HTML_PATH . '/','Home@index:news_detail', 'utf8');
        $this->display();

    }
}