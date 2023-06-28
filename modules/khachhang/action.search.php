<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/khachhang/?';

    if ($_POST['name_kh'] != '') {
       
        $link .= 'name=' . $_POST['name_kh'];
    }
    if ($_POST['sdt_kh'] != 0) {
        $link .= '&phone=' . htmlentities($_POST['sdt_kh']);
    }
   

    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
