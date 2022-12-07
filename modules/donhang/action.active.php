<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $data = array(
        'ngay_hoanthanh' => date("d"),
        'thang_hoanthanh' => date("m"),
        'nam_hoanthanh' => date("Y"),
    );
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_donhangtrongoi", "`id`= " . $id . " LIMIT 1");
    $rs = $result->fetch();
    if ($rs['tinhtrangdon'] == 4) {
        if ($rs['active'] == 0) {
            $oClass->update("php_donhangtrongoi", $data, "id=" . $id);
            $oClass->updateActive("php_donhangtrongoi", 1, "`php_donhangtrongoi`.`id` = " . $id);
        } else if ($rs['active'] == 1) {
            $update = $oClass->updateActive("php_donhangtrongoi", 0, "`id` = " . $id);
        }
    } else {
        die(json_encode(
            array(

                'status' => '1',
                'msg' => 'Tình trạng đơn chưa hoàn thành'
            )
        ));
    }

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

        'status' => '1',
        'msg' => 'Update thất bại'
    )
));
exit;
