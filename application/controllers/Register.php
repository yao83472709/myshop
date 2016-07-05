<?php
class Register extends CI_Controller {
    public $username   ='';
    public $password   ='';
    public $pass       ='';
    public $src     ='';
    public function index()

    {  // $this->load->model('code');

        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->form_validation->set_rules('username', '用户名', 'required|callback_username_check', array('required' => ' %s不能为空','username_check' => '用户名重复或不符合规定'));
        $this->form_validation->set_rules('password', '密码', 'required|min_length[6]|max_length[25]',array('required' => ' %s不能为空','min_length'=>'密码必须在6~25位之间','max_length' =>'密码必须在6~25位之间'));
        $this->form_validation->set_rules('pass', '密码', 'callback_pass_again',array('pass_again' =>'两次输入密码不一致'));
        $this->form_validation->set_rules('check_number', '验证码', 'required|callback_session_check',array('required' => ' %s不能为空','session_check' =>'您输入的验证码不正确'));
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register',$data);
         // var_dump(false);
//            $q=$this->username_check();
        }
        else
        {
            $valid_email  = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            $valid_mobile = "/^1[34578]\d{9}$/";
            $this->username=$_POST['username'];
            $this->password=$_POST['password'];
            $this->src   = "http://localhost/check?username='.$this->username.'&password='. $this->password)";
            if(preg_match( $valid_email, $this->username )) {
                $this->load->model('Model_email');
                //var_dump($this->src);
                $body = '亲爱的会员您正在自助开通账户，请点击以下链接激活您的账号：<b style="color:#4CB1CA"><a href='.$this->src.'>确认</a></b>以完成操作。<br>
                注意：此操作可能会修改您的密码、登录邮箱或绑定手机。<br>如非本人操作，请勿点击
                <br>此为系统邮件，请勿回复
                请保管好您的邮箱，避免账号被他人盗用';
                $ok = $this->Model_email->send('13350854538@163.com', '19951217lei', $this->username, $body);
                // var_dump($ok);var_dump($this->username);
                if ($ok == true) {
                    $this->password = $_POST['password'];
                    $this->load->model('Model_User');
                    $this->Model_User->insert($this->username, $this->password);
                    $this->load->Model('Model_pub');
                    $this->Model_pub->jump('注册成功');
                    $this->load->view('login', $data);
                } else if (preg_match($valid_mobile, $this->username)) {

                }
            }

        }

    }
   public function username_check($username){
        $this->load->model('Model_User');
        $re  =$this->Model_User->check($username);
           return $re;
    }
    public function pass_again(){
       //var_dump($pass);
        //var_dump($password);
        $this->password=$_POST['password'];
        $this->pass=$_POST['pass'];
        if( $this->pass == $this->password){
            return true;
        }else{
            return false;
        }
    }
    public function session_check($str){
       //session_start();
        $this->load->library('session');
        $this->session->userdata('code');
        if( $_SESSION['code']== $str){
            return true;
        }else{
              //var_dump($this->session->userdata('code'));
           // var_dump($str);
            return false;
       }
    }

    public function Active($key)
    {
        $this->load->library('encryption');
        $this->encrypt->encode($key);
        //$decode = $this->encryption->decrypt($encode);
        //var_dump($encode,$decode);exit;
        //@todo 验证成功后进行激活 更新数据库
    }

}