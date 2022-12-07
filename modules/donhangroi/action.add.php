<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = array(
        'thoigian_giaohang' => htmlspecialchars(trim($_REQUEST['thoigian_giaohang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'tuyenduong_giaohang' => htmlspecialchars(trim($_REQUEST['tuyenduong_giaohang'])),
        'tong_phivanchuyen' => 0,
        'ngay' => date('d'),
        'thang' => date('m'),
        'nam' => date('Y'),

        'tinhtrangdon' => 0,
        'active' => 0,
    );
    $oClass->insert('php_donhangroi', $data);
    die(json_encode(array(
        'status' => '1',
        'msg' => 'Thêm thành công'
    )));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
