<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/nhan-su/?';

    if ($_POST['name'] != '') {
       
        $link .= 'name=' . $_POST['name'];
    }
    if ($_POST['phone'] != 0) {
        $link .= '&phone=' . htmlentities($_POST['phone']);
    }
    if ($_POST['chucvu'] != 0) {
        $link .= '&chucvu=' . htmlentities($_POST['chucvu']);
    }


    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
