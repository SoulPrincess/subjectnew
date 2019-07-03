<?php
namespace Admin\Controller;

//邮箱信息
    class Phpemail extends BaseController{
        private $MAIL_HOST;             //smtp服务器的名称 smtp.163.com
        private $MAIL_SMTPAUTH=TRUE;         //启用smtp认证
        private $MAIL_USERNAME;         //你的邮箱名
        private $PASSWORD;              //邮箱密码
        private $FROM;                   //发件人地址（也就是你的邮箱地址）
        private $FROMNAME;              //发件人姓名
        private $MAIL_CHARSET='utf-8';  //设置邮件编码
        private $MAIL_ISHTML=TRUE;      //是否HTML格式邮件
        public function __construct(array $arr)
        {
            $this->FROM     =$arr['emailnumber'];
            $this->FROMNAME =$arr['emailname'];
            $this->PASSWORD =$arr['emailpwd'];
            $this->MAIL_HOST=$arr['emailsmtp'];
            $this->MAIL_USERNAME =$arr['emailnumber'];
        }
        /**
         * 邮件发送函数
         * $to  = 收件人
         * $title   = 邮件标题
         * $content = 邮件内容
         */
      public  function sendMail($to, $title, $content) {
          Vendor('PHPMailer.PHPMailerAutoload');
            $mail = new \PHPMailer(); //实例化
            $mail->IsSMTP(); // 启用SMTP
            $mail->Host=$this->MAIL_HOST;
            $mail->SMTPAuth =$this->MAIL_SMTPAUTH;
            $mail->Username =$this->MAIL_USERNAME;
            $mail->Password = $this->PASSWORD ;
            $mail->From = $this->FROM;
            $mail->FromName =$this->FROMNAME;
            $mail->AddAddress($to,"尊敬的客户");
            $mail->WordWrap = 50; //设置每行字符长度
            $mail->IsHTML($this->MAIL_ISHTML);
            $mail->CharSet=$this->MAIL_CHARSET;
            $mail->Subject =$title; //邮件主题
            $mail->Body = $content; //邮件内容
            $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
            return($mail->Send());
        }
    }