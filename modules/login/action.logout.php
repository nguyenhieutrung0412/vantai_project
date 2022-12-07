<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

    if(isset($_SESSION['user_id'])) session_destroy();
   
    die(json_encode(array(
        'status'=>1,
        'msg'=>'Đăng xuất thành công!',
        'link'=>$domain
    )));




?>