<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
        'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])),
        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
        'cmnd_nguoinhan' => htmlspecialchars(trim($_REQUEST['cmnd_nguoinhan'])),
        'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),
        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'phivanchuyen' => $phivanchuyen,

    );

    $oClass->update("php_donhangtrongoi", $data, "id=" . $data['id']);

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Thêm thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
