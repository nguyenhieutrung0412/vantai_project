<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/tai-xe/?';

    if ($_POST['name_taixe'] != '') {
       
        $link .= 'name=' . $_POST['name_taixe'];
    }
    if ($_POST['sdt_taixe'] != 0) {
        $link .= '&phone=' . htmlentities($_POST['sdt_taixe']);
    }
    


    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
