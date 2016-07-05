<?php
/**
 * 验证码类
 * Author: wenlong
 * Date: 16/6/22
 * Time: 21:41
 */
class Model_Vcode extends CI_Model
{
    public function Generate (){
        //加载session类库
        $this->load->library('session');
//        session_start();
        //生成验证码图片
        header("Content-type: image/png");
        // 全数字
        $str = "1,2,3,4,5,6,7,8,9,a,b,c,d,f,g";      //要显示的字符，可自己进行增删
        $list = explode(",", $str);
        $cmax = count($list) - 1;
        $verifyCode = '';
        for ( $i=0; $i < 5; $i++ ){
            $randnum = mt_rand(0, $cmax);
            $verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
        }
        //写入session
        $this->load->library('session');
        $this->session->set_userdata('code',$verifyCode );
//        $_SESSION['code'] = $verifyCode;        //将字符放入SESSION中

        $im = imagecreate(100,28);    //生成图片
        $color = imagecolorallocate($im,rand(1,1000),rand(1,1000),rand(1,1000));
        imagerectangle($im,5,0,99,27,$color);
        $black = imagecolorallocate($im, rand(1,1000),rand(1,1000),rand(1,1000));     //此条及以下三条为设置的颜色
        $white = imagecolorallocate($im, rand(1,1000),rand(1,1000),rand(1,1000));
        $gray = imagecolorallocate($im, 200,200,200);
        $red = imagecolorallocate($im, 255, 0, 0);
        imagefill($im,5,0,$white);     //给图片填充颜色
        //将验证码绘入图片
        imagestring($im, 5, 10, 8, $verifyCode, $black);    //将验证码写入到图片中

        for($i=0;$i<500;$i++)  //加入干扰象素
        {
            imagesetpixel($im, rand(1,1000), rand(1,1000) , $black);    //加入点状干扰素
            imagesetpixel($im, rand(1,1000) , rand(1,1000) , $red);
            imagesetpixel($im, rand(1,1000) , rand(1,1000) , $gray);
        }
        for($i=0 ; $i<4 ; $i++){
            $c = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
            imageline($im,rand(0,99),rand(0,28),rand(0,99),rand(0,28),$c);
        }
        imagepng($im);
        imagedestroy($im);
    }
}