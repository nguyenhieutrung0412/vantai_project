<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = explode('/', htmlspecialchars(trim($_REQUEST['thoigian'])));



    $data = array(
        'id_khachhang' => htmlspecialchars(trim($_REQUEST['khachhang_select'])),
        'so_tien' => htmlspecialchars(trim($_REQUEST['so_tien'])),
        'thang' => $date[1],
        'nam' => $date[2],

        'active' => 0
    );
    $oClass->insert("php_congnokhachhang", $data);

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Thêm thành công'
        )
    ));
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Thất bại'
    )
));

exit;
