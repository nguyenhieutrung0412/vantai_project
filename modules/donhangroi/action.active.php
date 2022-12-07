<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $data = array(
        'date_hoanthanh' => date("d/m/Y"),

    );
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_donhangroi", "`id`= " . $id . " LIMIT 1");
    $rs = $result->fetch();
    if ($rs['tinhtrangdon'] == 4) {
        if ($rs['active'] == 0) {
            $oClass->update("php_donhangroi", $data, "id=" . $id);
            $oClass->updateActive("php_donhangroi", 1, "`php_donhangroi`.`id` = " . $id);
        } else if ($rs['active'] == 1) {
            $update = $oClass->updateActive("php_donhangroi", 0, "`id` = " . $id);
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
