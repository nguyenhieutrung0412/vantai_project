<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $data = array(
        'km_chuyenhang' => $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['km_chuyenhang']))),
        'date_hoanthanh' => date("d/m/Y"),

    );
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_donhangroi", "`id`= " . $id . " LIMIT 1");
    $rs = $result->fetch();
    //xử lý cộng dồn km cho xe
    $xe = $oContent->view_table("php_theodoithaylop", "`id_doixe`= " . $rs['id_doixe'] . " LIMIT 1");
    $rs_xe = $xe->fetch();

    $data2['km_tukhithaynhot'] = $rs_xe['km_tukhithaynhot'] + $data['km_chuyenhang'];
    $data2['1p1'] = $rs_xe['1p1'] + $data['km_chuyenhang'];
    $data2['1t1'] = $rs_xe['1t1'] + $data['km_chuyenhang'];
    $data2['2p1'] = $rs_xe['2p1'] + $data['km_chuyenhang'];
    $data2['2t1'] = $rs_xe['2t1'] + $data['km_chuyenhang'];
    $data2['3p1'] = $rs_xe['3p1'] + $data['km_chuyenhang'];
    
    $data2['3p2'] = $rs_xe['3p2'] + $data['km_chuyenhang'];
    $data2['3t1'] = $rs_xe['3t1'] + $data['km_chuyenhang'];
    $data2['3t2'] = $rs_xe['3t2'] + $data['km_chuyenhang'];
    $data2['4p1'] = $rs_xe['4p1'] + $data['km_chuyenhang'];
    $data2['4p2'] = $rs_xe['4p2'] + $data['km_chuyenhang'];
    $data2['4t1'] = $rs_xe['4t1'] + $data['km_chuyenhang'];
    $data2['4t2'] = $rs_xe['4t2'] + $data['km_chuyenhang'];

    //end

    if ($rs['tinhtrangdon'] == 2) {
        if ($rs['active'] == 0) {
            $oClass->update("php_theodoithaylop", $data2, "id_doixe=" . $rs['id_doixe']);
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
