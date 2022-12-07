<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
    $trongluonghang = str_replace(",", "", htmlspecialchars(trim($_REQUEST['trongluong_hanghoa'])));
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'loaihang' => htmlspecialchars(trim($_REQUEST['loaihang'])),
        'soluong_hanghoa' => htmlspecialchars(trim($_REQUEST['soluong_hanghoa'])),
        'trongluong_hanghoa' => $trongluonghang,
        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),

        'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
        'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_nhanhang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_nhanhang'])),
        'thoigian_giaohang' => htmlspecialchars(trim($_REQUEST['thoigian_giaohang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),

        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'phivanchuyen' => htmlspecialchars(trim($_REQUEST['phivanchuyen'])),

    );

    $oClass->update("php_donhangroi_s", $data, "id=" . $data['id']);

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
