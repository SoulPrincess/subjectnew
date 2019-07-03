<?php
namespace Admin\Controller;

use Think\Controller;

class WebsysController extends BaseController {
 /*
  * 网站设置
  * */

 //***************************网站设置*************
    public function websysinfo(){
        if(IS_AJAX){
            switch (I('get.name')){
                case 'web':             //网站信息
                    if(false!==fopen(C('CPU_PATH')."websys.txt",'w+')){
                        $total= file_put_contents(C('CPU_PATH')."websys.txt", serialize($_POST));
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
                case 'send':         //邮件发送信息
                    if(false!==fopen(C('CPU_PATH')."emailsend.txt",'w+')){
                        $total= file_put_contents(C('CPU_PATH')."emailsend.txt", serialize($_POST));
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
                case 'code':        //第三方代码

                    $_POST['headercode']=htmlspecialchars($_POST['headercode']);
                    $_POST['footcode']=htmlspecialchars($_POST['footcode']);
                    if(false!==fopen(C('CPU_PATH')."websyscode.txt",'w+')){
                        $total= file_put_contents(C('CPU_PATH')."websyscode.txt", serialize($_POST));
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
                case 'test':            //发送邮件测试
                    $email=new Phpemail($_POST);
                    $send=$email->sendMail('287294212@qq.com', '上海谷程网络科技有限公司', '测试发送'.date('Y-m-d H:i:s',time()));
                    if($send){
                        $info['info'] = '发送成功！';
                        $info['status'] = 1;
                    }else{
                        $info['info'] = '发送失败！';
                        $info['status'] = 0;
                    }
                    $this->ajaxReturn($info,'JSON');
                case '':
                    $info['info'] = '请求错误！';
                    $info['status'] = 0;
                    $this->ajaxReturn($info,'JSON');
            }

        }else{
            $websys = C('CPU_PATH')."websys.txt";
            if(file_exists($websys)){
                $content=file_get_contents($websys);
                $this->assign('websys',unserialize($content));
            }else {
                $this->assign('websys',[]);
            }
            $emailsend = C('CPU_PATH')."emailsend.txt";
            if(file_exists($emailsend)){
                $email=file_get_contents($emailsend);
                $this->assign('emailsend',unserialize($email));
            }else {
                $this->assign('emailsend',[]);
            }
            $this->display();
        }
    }

   /*第三方代码ajax*/
    public function threecode()
    {
        if (IS_AJAX) {
            $websyscode = C('CPU_PATH') . "websyscode.txt";
            if (file_exists($websyscode)) {
                $code = file_get_contents($websyscode);
                $datainfo = unserialize($code);
                $this->ajaxReturn($datainfo, 'JSON');
            } else {
                $this->ajaxReturn([], 'JSON');
            }
        } else {
            $info['info'] = '这是个意外！';
            $info['status'] = 0;
            $this->ajaxReturn($info,'JSON');
        }
    }
}