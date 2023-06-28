<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['checkbox_active']) && $_POST['checkbox_active'] == '1') {
        $count = 1;
    } else {
        $count = 0;
    }
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),

        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'cmnd_nguoinhan' => htmlspecialchars(trim($_REQUEST['cmnd_nguoinhan'])),
        'km_chuyenhang' => $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['km_chuyenhang']))),
        'ngay_hoanthanh' => date("d"),
        'thang_hoanthanh' => date("m"),
        'nam_hoanthanh' => date("Y"),
        'date_hoanthanh' => Date("Y-m-d h:i:s"),
        'active' => $count,

    );
    

    $result = $oContent->view_table("php_donhangtrongoi", "`id`= " . $data['id'] . " LIMIT 1");
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
    $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
    $cauhinh = $chatluong_hinhupload->fetch();
    if ($rs['tinhtrangdon'] == 4) {

        $oClass->update("php_donhangtrongoi", $data, "id=" . $data['id']);
        $oClass->update("php_theodoithaylop", $data2, "id_doixe=" . $rs['id_doixe']);
        $oClass->upload_images('php_donhangtrongoi', $data['id'], $cauhinh['chatluong_hinhupload']);
        die(json_encode(
            array(
                'id' => $update,
                'status' => '1',
                'msg' => 'Update thành công'
            )
        ));
    }
    else {
        die(json_encode(
            array(

                'status' => '0',
                'msg' => 'Tình trạng đơn chưa hoàn thành'
            )
        ));
    }
   
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Update thất bại'
    )
));
exit;
