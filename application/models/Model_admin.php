<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/25
 * Time: 10:06
 */
class Model_admin extends CI_model{
    public function select($username){
        $this->load->database();
        $query = $this->db->get_where('admin', array('username' => $username));
        $rs = $query->result();
        if ( $rs ) {
            return true;
            //echo 123;
        } else {
            return false;
        }
    }
    public function check_login($username,$password){
        $this->load->database();
        $query = $this->db->get_where('admin', array('username' => $username));
        $rs = $query->result_array();
        $list='';
        foreach($rs as $value){
            $list = $value['password'];
           // var_dump($list);
            //var_dump($password);
        }
        if( $list != md5($password)){
            return false;
        }else{
            return true;
        }
        }
    public function insert_cate($cate_name){
        date_default_timezone_set('Asia/Shanghai');
        $time = date('Y-m-d H:i:s',time());
        $insert="insert into `catelist` value('','{$cate_name}','{$time}');";
        $this->load->database();
        $this->db->query($insert);

    }
    public function catelist()
    {
        $this->load->database();
        $query = $this->db->query("SELECT `catelistname` FROM catelist;");
        $list[] = '';

        foreach ($query->result_array() as $key => $value) {
           foreach($value as $row){
               $list[] = $row;
           }
        }   return $list;
    }
    public function catelist_id()
    {
        $this->load->database();
        $query = $this->db->query("SELECT `id` FROM catelist;");
        $list[] = '';
        foreach ($query->result_array() as $key => $value) {
            foreach($value as $row){
                $list[] = $row;
            }
        }   return $list;
    }
    public function goods_list($name,$cate_name,$price,$number,$des,$img){
        $this->load->database();
        $query = $this->db->query("SELECT `id` FROM catelist where `catelistname`='{$cate_name}';");
        $id = '';
        foreach($query->result_array() as $value){
            $id =implode($value);
        }
        //var_dump($id);
        $data = array(
           'id'             => '',
           'cate_id'        => $id,
           'goodsname'      => $name,
           'gooodsmoney'    => $price,
           'gcount'         => $number,
           'ginfo'          => $des,
           'datetime'       => date("Y-m-d H:i:s", time()),
           'gway'           => 0,
           'imange'         => $img,
           'glicks'         => 0,
           'gvotecoun'      => 0
        );
        $rs = $this->db->insert('goodslist', $data);
        return $rs;
    }

public function goodslist()
{
    $this->load->database();
    $query = $this->db->query("SELECT `goodsname`,`id` FROM goodslist;");
    $list[] = '';
    foreach ($query->result_array() as $key => $value) {

            $list[] = $value;
    }   return $list;
}
    public function check_user($username,$password)
    {
        $this->load->database();
        $data =  array(
            'username' => $username,
            'password' => $password,
        );
        $query = $this->db->get_where('admin', $data);

        foreach($query->result_array()as$value){
           return $value;
        }
    }
    public function use_user($username,$password)
    {
        $this->load->database();
        $data =  array(
            'username' => $username,
            'password' => $password,
        );
        $query = $this->db->get_where('user', $data);

        foreach($query->result_array()as$value){
            return $value;
        }
    }
    public function update($table_name,$id,$data){
        $this->load->database();
        $this->db->update($table_name, $data, array('id' => $id));

    }
}