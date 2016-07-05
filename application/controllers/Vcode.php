<?php
class Vcode extends CI_Controller
{
public function Index()
{

    $this->load->model('Model_Vcode');
    $this->Model_Vcode->generate();
    //$this->session->set_userdata('some_name', 'some_value');
}
}