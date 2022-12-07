<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['checkbox_active']) && $_POST['checkbox_active'] == '1') {
        $count = 1;
    } else {
        $count = 0;
    }
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),

        'ten_nguoinhan_thuc' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan_thuc'])),
        'phone_nguoinhan_thuc' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan_thuc'])),
        'cmnd_nguoinhan_thuc' => htmlspecialchars(trim($_REQUEST['cmnd_nguoinhan_thuc'])),
        'date_hoanthanh' => Date("Y-m-d h:i:s"),
        'tinhtrangdon' => $count,

    );


    $result = $oContent->view_table("php_donhangroi_s", "`id`= " . $data['id'] . " LIMIT 1");
    $rs = $result->fetch();
    $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
    $cauhinh = $chatluong_hinhupload->fetch();


    $oClass->update("php_donhangroi_s", $data, "id=" . $data['id']);
    $oClass->upload_images('php_donhangroi_s', $data['id'], $cauhinh['chatluong_hinhupload']);

    die(json_encode(
        array(
            'id' => $update,
            'status' => '1',
            'msg' => 'Update thành công'
        )
    ));
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Update thất bại'
    )
));
exit;
