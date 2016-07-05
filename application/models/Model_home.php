<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/30
 * Time: 14:20
 */
class Model_home extends CI_Model{
    public function cate_list(){
        $this->load->database();
        $query = $this->db->query("SELECT `catelistname`,`id` FROM catelist;");
        $list[] = '';
        foreach ($query->result_array() as $key => $value) {

                $list[] = $value;

        }   return $list;
    }
    public function goods_list($id){
        $this->load->database();
        //var_dump($id);
        $query = $this->db->get_where('goodslist', array('cate_id' => $id));
        return $query->result_array();

    }
    public function goods($id){
        $this->load->database();
        //var_dump($id);
        $query = $this->db->get_where('goodslist', array('id' => $id));
        return $query->result_array();

    }
}