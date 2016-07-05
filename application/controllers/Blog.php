<?php
class Blog extends CI_Controller {
    public function index()
    {
        /*$this->load->helper('cookie');
       $cookie = get_cookie('yokoso');
       // var_dump($cookie);
       $this->load->library('encryption');
       // $this->load->model('Model_User');
       $user_info = $this->encryption->decrypt($cookie);
       $user_info = unserialize($user_info);//var_dump($user_info['power']);
       //var_dump($user_info['power']);exit;
       /*if ( er_info['power'] == 1 ) {
           $data['base_url'] = $this->config->item('base_url');
           $this->load->helper(array('form', 'url'));
           $this->load->view('home', $data);
           //$this->input->set_cookie("username","",0);
       } else {
           $data['base_url'] = $this->config->item('base_url');
           $this->load->helper(array('form', 'url'));
           $this->load->view('login', $data);
       }*/
        $this->load->model('Model_home');
        $data['catelist']=$this->Model_home->cate_list();
       // var_dump($data['catelist']);

        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->view('home', $data);
    }
    public function women(){
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->view('women', $data);
    }
    public function catelist($value){
      // var_dump($value);
        $this->load->model('Model_home');
        $list=$this->Model_home->goods_list($value);
        $data['list']=$list;
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('women',$data);
    }
    public function cate($value){
        $this->load->model('Model_home');
        $list=$this->Model_home->goods($value);
        $data['list']=$list;
       // var_dump($list);
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('goods',$data);
    }
    public function car(){
        //var_dump($_POST);
        $this->load->helper('cookie');
        $cookie = get_cookie('yokoso');
        //var_dump($cookie);
        $this->load->library('encryption');
        $user_info = $this->encryption->decrypt($cookie);
        $user_info = unserialize($user_info);
       //var_dump($user_info);
        $this->load->model('Model_car');
        $array=array(
            'username'=>$user_info['username'],
            'goodsname'=>$_POST['goodsname']
        );
        $array1=array(
            'goodsname'=>$_POST['goodsname']
        );
        $goodslist=$this->Model_car->select($array1,'goodslist');
        $list[]=array();
        foreach($goodslist as $value){
         $list=$value;
        }//var_dump($list['imange']);
        //var_dump( $this->Model_car->select($array,'car')[0]['goodsname']);
        $goodsname []='';
        foreach($this->Model_car->select($array,'car') as $value){
            $goodsname=$value;
        }
        if( isset($goodsname['goodsname'])){

            $car []='';
            foreach($this->Model_car->select($array,'car') as $value){
                $car[]=$value;
            };
            //var_dump();
            $up=$_POST['gcount']+$car[1]['gcount'];
            //var_dump($car['gcount']);
            $this->Model_car->update($up,$_POST['goodsname']);
            echo '<h1 style="color: red;text-align: center">添加成功</h1>';

        }else{
            $data=array(
                'username'=>$user_info['username'],
                'goodsname'=>$_POST['goodsname'],
                'gcount'=>$_POST['gcount'],
                'imange'=>$list['imange'],
                'gooodsmoney'=>$list['gooodsmoney'],
                'goodsid'=>$list['id']
            );
            $this->Model_car->add('car',$data);
            echo '添加成功';

        }
        $this->cate($list['id']);
    }
    public function car_list(){
        $this->load->helper('cookie');
        $cookie= get_cookie('yokoso');
        $this->load->library('encryption');
        $user_info = $this->encryption->decrypt($cookie);
        $user_info = unserialize($user_info);
       // var_dump($user_info['username']);
        $this->load->model('Model_car');
        $array = array('username'=>$user_info['username']);
        $query = $this->Model_car->select($array,'car');
       // var_dump($query);
        $data['query']=$query;
        $this->load->helper(array('form', 'url'));
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('car',$data);
    }
    public function delete($id){
        $this->load->model('Model_car');
        $this->Model_car->delete('car',$id);
        echo '<h1 style="color: red"> 删除成功</h1>';
        $this->car_list();
    }
    public function post(){
     //var_dump($_POST);
        $this->load->database();
        $list=array();
        foreach($_POST as $value){
            $query = $this->db->get_where('car',array('id'=>$value));
            $list[]=$query->result_array();
        }
        foreach($list as $value){
            foreach($value as $row){
                $goodsname[]=$row['goodsname'];
                $goodsid[]=$row['id'];
                $goodsmoney[]=$row['gooodsmoney'];
                $gcount[]=$row['gcount'];
                $all_money[]=$row['allmoney'];
            }
        }
        var_dump($goodsmoney*$gcount);
       // var_dump($list);
        $this->load->helper('cookie');
        $cookie = get_cookie('yokoso');
        var_dump($cookie);
        $this->load->library('encryption');
        $user_info = $this->encryption->decrypt($cookie);
        $user_info = unserialize($user_info);
        var_dump($user_info);
    }
}