<?php
class Login extends CI_Controller {


    public function index()
    {
        //var_dump(md5(10086));
        $this->load->helper('cookie');
        $cookie = get_cookie('yokoso');
         //var_dump($cookie);
        $this->load->library('encryption');
        // $this->load->model('Model_User');
        $user_info = $this->encryption->decrypt($cookie);//var_dump($user_info);
        $user_info = unserialize($user_info);//var_dump($user_info);
        //var_dump($user_info['power']);exit;
        if ( $user_info['power'] != 1 ) {
            //var_dump(123);
            $data['base_url'] = $this->config->item('base_url');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', '用户名', 'required|callback_username_check', array('required' => ' %s不能为空','username_check' => '用户名不存在'));
            $this->form_validation->set_rules('password', '密码', 'required|callback_check',array('required' => ' %s不能为空','check'=>'您输入的密码不正确'));
            $this->form_validation->set_rules('check_number', '验证码', 'required|callback_session_check',array('required' => ' %s不能为空','session_check' =>'您输入的验证码不正确'));
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login', $data);
                // echo 123;
            } else {
                //var_dump($_POST);
                // echo 456;
                $username = $_POST['username'];
                $data['username'] = $username;
                $password = md5($_POST['password']);
                // $this->load->Model('Model_pub');
                $this->load->model('Model_Admin');
                $rs = $this->Model_Admin->use_user($username, $password);
                $this->load->library('encryption');     // var_dump($rs);
                $key = $this->encryption->create_key(16);
                $rs = $this->encryption->encrypt(serialize($rs));
                //var_dump($rs);
                $this->load->helper('cookie');
                set_cookie('yokoso', $rs, 24 * 3600 * 7);
                $this->load->view('home', $data);
            }
        } else{
            //echo 123;
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('admin', $data);
        } }

    public function username_check($username){
        $this->load->model('Model_User');
        $re  =$this->Model_User->select($username);
        return $re;
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
   public function check($password){
    $username =$_POST['username'];
       //var_dump($username);
       $this->load->model('Model_User');
       $this->Model_User->check_login($username,md5($password)) ;
        }
    public function cookie(){
        $this->load->helper('cookie');
        delete_cookie('yokoso');
    }
}