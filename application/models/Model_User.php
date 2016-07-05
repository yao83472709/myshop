<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/23
 * Time: 10:43
 */
class Model_User extends CI_Model{
    public function check($username){
        $valid_email  = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        $valid_mobile = "/^1[34578]\d{9}$/";
//        var_dump($username);exit;
        if ( !preg_match( $valid_email, $username ) && !preg_match( $valid_mobile, $username ) ) {
            return 1;
        }
        else
        {
            $this->load->database();
            $query = $this->db->get_where('user', array('username' => $username));
            $rs = $query->result();
            //var_dump($rs);exit;
            if ( $rs ) {
                return false;
            } else {
                return true;
            }

        }
    }
    public function select($username){
            $this->load->database();
            $query = $this->db->get_where('user', array('username' => $username));
            $rs = $query->result();
            //var_dump($rs);exit;
            if ( $rs ) {
                return true;
            } else {
                return false;
            }

        }

    public function insert($username,$password){
        $this->load->database();
        $data = array(
            'id'          => '',
            'userName'    => $username,
            'password'    => md5($password),
            'create_time' => date("Y-m-d H:i:s", time()),
            'create_ip'   => $this->input->server('REMOTE_ADDR'),
            'login_time'  => date("Y-m-d H:i:s", time()),
            'login_ip'    => $this->input->server('REMOTE_ADDR'),
            'status'      => '0',
            'power'       => '1'
        );
        $rs = $this->db->insert('user', $data);
        return $rs;

    }
    public function check_login($username,$password){
        $this->load->database();
        $query = $this->db->get_where('user', array('username' => $username));
        //$rs = $query->result_array();
        $list='';
        foreach ($query->result_array() as $row)
        {
            $list=$row['password'];
        }
        if($list == $password){
            return true;
        }else{
            return false;
            //var_dump($list);

    } }
    public function update($username){
        $this->load->database();
        $time = date('Y-m-d H:i:s', time());
        $ip   =$this->input->server('REMOTE_ADDR');
        $update = "update `user` set  `login_time`='{$time}','login_ip`='{$ip}' ";
        $ok=mysql_query($update);
        if($ok){
            return true;
        }
    }

}