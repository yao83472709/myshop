<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/25
 * Time: 15:09
 */
class Cate_add extends CI_Controller{
    public function index()
    {
        $data['base_url'] = $this->config->item('base_url');
        $this->load->helper(array('form', 'url'));
        $this->load->view('cateadd',$data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name', '分类名称', 'required', array('required' => ' %s不能为空'));
    }
}