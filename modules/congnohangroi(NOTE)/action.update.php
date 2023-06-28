<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'id_khachhang' => htmlspecialchars(trim($_REQUEST['khachhang_select'])),
        'so_tien' => htmlspecialchars(trim($_REQUEST['so_tien'])),


    );

    $oClass->update("php_congnohangroi", $data, "id=" . $data['id']);


    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Update thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
exit;
