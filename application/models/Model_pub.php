<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/23
 * Time: 13:38
 */
class Model_pub extends CI_Model{
    public function jump($info = '') {
        $script = '';
        //当提示信息不为空时,添加提示代码
        if(!empty($info)) {
            $script .= "alert('{$info}');";
            echo "<script>{$script}</script>";
        }

    }

}