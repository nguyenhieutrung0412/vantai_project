<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),

        'tong_phivanchuyen' => htmlspecialchars(trim($_REQUEST['tong_phivanchuyen'])),

    );

    $oClass->update("php_donhangroi", $data, "id=" . $data['id']);

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
