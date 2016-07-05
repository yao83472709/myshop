<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/7/2
 * Time: 11:02
 */
class Model_car extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function select($array,$tablename){
        $query=$this->db->get_where($tablename,$array);
        return $query->result_array();
    }
    public function  add($tablename,$data){
        $this->db->insert($tablename, $data);
    }
    public function update($value,$goodsname){
        $data = array(
            'gcount' => $value,
        );
        $this->db->update('car', $data, array('goodsname'=>$goodsname));

    }
    public function delete($tablename,$id){
        $this->load->database();
        $this->db->delete($tablename, array('id' => $id));
    }
}