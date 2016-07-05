<?php
/**
 * 邮件发送
 * Author: wenlong
 * Date: 16/6/22
 * Time: 23:06
 */
class Model_email extends CI_Model
{
    //@todo 实现邮件发送封装并发送邮件
    public function send($from,$pass,$to,$body){
        //引入第三方sdk
        if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        header('Content-Type:text/html;Charset=utf-8');
        require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // 设置邮件使用SMTP
        $mail->Host = 'smtp.163.com';                         // 邮件服务器地址
        $mail->SMTPAuth = true;
      // $mail->SMTPDebug = 1;
        // 启用SMTP身份验证
        $mail->CharSet = "UTF-8";                             // 设置邮件编码
        $mail->setLanguage('zh_cn');                          // 设置错误中文提示
        $mail->Username = $from;              // SMTP 用户名，即个人的邮箱地址
        $mail->Password = $pass;                        // SMTP 密码，即个人的邮箱密码
        $mail->SMTPSecure = 'tls';                            // 设置启用加密，注意：必须打开 php_openssl 模块
        $mail->Priority = 3;                                  // 设置邮件优先级 1：高, 3：正常（默认）, 5：低
        $mail->From = $from;                 // 发件人邮箱地址
        $mail->FromName = '樱花购物庄';                           // 发件人名称
        $mail->addAddress($to);               // 添加多个接受者
        $mail->addReplyTo($from, 'Information'); // 添加回复者
        //$mail->addCC('mail2@sina.com');                // 添加抄送人
        //$mail->addCC('mail3@qq.com');                     // 添加多个抄送人
        //$mail->ConfirmReadingTo = '18658430592@163.com';     // 添加发送回执邮件地址，即当收件人打开邮件后，会询问是否发生回执
        //$mail->addBCC('18658430592@163.com');                    // 添加密送者，Mail Header不会显示密送者信息
        $mail->WordWrap = 50;                                 // 设置自动换行50个字符
        //$mail->addAttachment('./1.jpg');                      // 添加附件
        //$mail->addAttachment('/tmp/image.jpg', 'one pic');    // 添加多个附件
        $mail->isHTML(true);                                  // 设置邮件格式为HTML
        $mail->Subject = 'myshop 会员注册';
        $base_url = $this->config->item('base_url');
        //引入加密类库
        $this->load->library('encryption');
        $activeUrl = $base_url."register/active/$to";
        $mail->Body    = $body;
        $mail->AltBody = 'This is the 主体 in plain text for non-HTML mail clients';
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}