<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/25
 * Time: 9:20
 */
class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->helper('cookie');
        $cookie = get_cookie('admin');
       // var_dump($cookie);
        $this->load->library('encryption');
       // $this->load->model('Model_User');
        $user_info = $this->encryption->decrypt($cookie);
        $user_info = unserialize($user_info);//var_dump($user_info['power']);
        //var_dump($user_info['power']);exit;
        if ( $user_info['power'] == 1 ) {
            $data['base_url'] = $this->config->item('base_url');
            $this->load->helper(array('form', 'url'));
            $this->load->view('admin', $data);
            //$this->input->set_cookie("username","",0);
        } else {
            $this->login();
        }
    }

    public function login()
{
    //var_dump(md5(10086));
    $this->load->helper('cookie');
    $cookie = get_cookie('admin');
    // var_dump($cookie);
    $this->load->library('encryption');
    // $this->load->model('Model_User');
    $user_info = $this->encryption->decrypt($cookie);
    $user_info = unserialize($user_info);//var_dump($user_info['power']);
    //var_dump($user_info['power']);exit;
    if ( $user_info['power'] != 1 ) {
        //var_dump(123);
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', '用户名', 'required|callback_username_check', array('required' => ' %s不能为空', 'username_check' => '用户名不存在'));
        $this->form_validation->set_rules('password', '密码', 'required|callback_check', array('required' => ' %s不能为空', 'check' => '您输入的密码不正确'));;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin_login', $data);
            // echo 123;
        } else {
            //var_dump($_POST);
            // echo 456;
            $username = $_POST['username'];
            $data['username'] = $username;
            $password = md5($_POST['password']);
            // $this->load->Model('Model_pub');
            $this->load->model('Model_Admin');
            $rs = $this->Model_Admin->check_user($username, $password);
            $this->load->library('encryption');      //var_dump(serialize($rs));
            $key = $this->encryption->create_key(16);
            $rs = $this->encryption->encrypt(serialize($rs));
            //var_dump($rs);
            $this->load->helper('cookie');
            set_cookie('admin', $rs, 24 * 3600 * 7);
            $this->load->view('admin', $data);
        }
    } else{
        //echo 123;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('admin', $data);
    }
}
    public function top(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('top',$data);
    }
    public function cateadd(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name', '分类名称', 'required', array('required' => ' %s不能为空'));
       // var_dump($_POST['cat_name']);
        //var_dump(@$_POST['cat_name']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('cateadd',$data);
        }else{
        $this->load->model('Model_admin');
        $this->Model_admin->insert_cate($_POST['cat_name']);
            $this->load->view('catelist',$data);
            echo '<h1 style="color:red; text-align: center">商品添加成功</h1>';
        }

}
    public function catelist(){
    $this->load->helper(array('form', 'url'));
    $data['base_url'] = $this->config->item('base_url');
    //$data['catelist'] =
        $this->load->model('Model_admin');
        //$data['cate_list']=;
    $list=$this->Model_admin->catelist();
      $data['cate_list'] =$list;
       // var_dump( $data['cate_list']);
        $list=$this->Model_admin->catelist_id();
        $data['cate_list_id'] =$list;
        $this->load->view('catelist',$data);
}
    public function main(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('main',$data);
    }
    public function drag(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('drag',$data);
    }
    public function goodsadd(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        //var_dump($_POST);
        $this->load->model('Model_admin');
        $list=$this->Model_admin->catelist();
        $data['cate_list'] =$list;
        //var_dump($list);
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;
        $config['file_name']        =rand(1,1000).time() ;
        $this->load->library('upload', $config);
       // $data = array('upload_data' => $this->upload->data());
        if( !$this->upload->do_upload('goods_img')){
    echo $this->upload->display_errors();
            //$this->load->view('goodsadd', $error);
        }else{
          // echo'上传成功';
            $this->load->helper(array('form', 'url'));
            $img_name = $this->config->item('base_url').'uploads/'.$this->upload->data('file_name');
            //var_dump($img_name);

        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('goods_name', '商品名', 'required', array('required' => ' %s不能为空'));
        $this->form_validation->set_rules('shop_price', '售价', 'required|callback_int',array('required' => ' %s不能为空','int'=>' %s只能为数字'));
        $this->form_validation->set_rules('goods_id', '数量', 'required|callback_int',array('required' => ' %s不能为空','int'=>' %s只能为数字'));
        //var_dump($_POST['goods_img']);exit;
        if ($this->form_validation->run() == FALSE){
        }else{
            if($this->Model_admin->goods_list($_POST['goods_name'],$_POST['cat_id'],$_POST['shop_price'],$_POST['goods_id'],$_POST['goods_desc'],$img_name)){
                echo'<h1 style="text-align: center; color:red;">上传成功</h1>';//var_dump($img_name);
            }else{
                echo'上传失败';
            }
        } $this->load->view('goodsadd',$data);
    }
    public function int($str){
        if(is_numeric($str)){
            return true;
        }else{
            return false;
        }

}
    //商品列表
    public function goodslist(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');

        $this->load->model('Model_admin');
        $list=$this->Model_admin->goodslist();
        $data['goods_list'] =$list;
       // var_dump($list);
        $this->load->view('goodslist',$data);
    }
    public function left(){
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('left',$data);
    }
        public function username_check($str){
            $this->load->model('Model_admin');
            $rs = $this->Model_admin->select($str);
            return $rs;
//            var_dump($rs) ;
        }
    public function check($password){
        $username = $_POST['username'];
        //$password = md5($_POST['password']);
        //var_dump(md5($password));
        $this->load->model('Model_admin');
        return $this->Model_admin->check_login($username,$password);
    }
    public function  delete($value){
        $this->load->database();
        //var_dump($value);exit;
     if(   $this->db->delete('goodslist',array('id' => $value))){
         echo'<h1 style="color: red;text-align: center;"> 删除成功</h1>';
     }
    }
    public function delete_cookie($value){
        $this->load->helper('cookie');
        delete_cookie($value);
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->view('admin_login',$data);
        //$this->load->view('admin_login', $data);
    }
   /* public function update($value){

        $query = $this->db->query("update`goodslist` where `goodsname` ='{$value}';");
    }*/
    public function update($id){
        $this->load->model('Model_admin');
        $list=$this->Model_admin->catelist();
        $data['cate_list'] =$list;
        $data['id']        =$id;
        $this->load->helper('cookie');
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_home');
        $data['goods']= $this->Model_home->goods($id);
        $this->load->view('goodsupdate',$data);

}
    public function update_goods( )
    {
        $this->load->database();//var_dump($_POST['cat_id'] );exit;
        $query = $this->db->get_where('catelist', array('catelistname' => $_POST['cate_id']));
        $list=array();//var_dump($query->result_array() );
        foreach( $query->result_array() as $key=>$value){
                $list=$value;
        }//var_dump($list);
        $this->load->model('Model_home');
        $_POST['cate_id']=$list['id'];
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_admin');
        $this->Model_admin->update('goodslist',$_POST['id'],$_POST);
        $cate_id = $_POST['cate_id'];
        echo '<h1 style="text-align: center;color:red;">修改成功</h1>';
        $this->update($_POST['id']);
    }
}