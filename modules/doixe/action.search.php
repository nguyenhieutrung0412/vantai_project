<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/doixe/?';

    if ($_POST['name_xe'] != '') {
       
        $link .= 'loaixe=' . $_POST['name_xe'];
    }
    if ($_POST['biensoxe'] != '') {
       
        $link .= 'biensoxe=' . $_POST['biensoxe'];
    }
   


    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
