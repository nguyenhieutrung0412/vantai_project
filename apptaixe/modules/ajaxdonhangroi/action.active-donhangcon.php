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
      
        'date_hoanthanh' => Date("Y-m-d h:i:s"),
        'tinhtrangdon' => $count,

    );
  
    $thang = date('m');
    $nam = date('Y');

    $result = $oContent->view_table("php_donhangroi_s", "`id`= " . $data['id'] . " LIMIT 1");
    $rs = $result->fetch();
    $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
    $cauhinh = $chatluong_hinhupload->fetch();


    $oClass->update("php_donhangroi_s", $data, "id=" . $data['id']);
    $oClass->upload_images('php_donhangroi_s', $data['id'], $cauhinh['chatluong_hinhupload']);
    $donhang_roi = $oContent->view_table("php_donhangroi", "`id`= " . $rs['id_donhangroi'] . " LIMIT 1");
    $rs_donhang_roi = $donhang_roi->fetch();
    //đẩy sản lượng cho tài xế
    // $sanluong = $model->db->query("SELECT * FROM php_luongtaixe WHERE user_id = " . $rs_donhang_roi['id_taixe'] . " AND thang= " .$thang. " AND nam=" .$nam);
    // $rs_sanluong = $sanluong->fetch();
    // $tongsanluong = $rs_sanluong['sanluong_hoanthanh'] + $rs_donhang_roi['phivanchuyen'];

    //$taixe = $model->db->query("UPDATE php_luongtaixe SET sanluong_hoanthanh = " . $tongsanluong . " WHERE user_id = " . $rs_donhang_roi['id_taixe'] . " AND thang=" .$thang." AND nam=".$nam);
    //end
    $result_2 = $oContent->view_table("php_donhangroi_s", "`id_donhangroi`= " . $rs['id_donhangroi'] );
    $flag = 0;
    while($rs_2 = $result_2->fetch()){
        if($rs_2['tinhtrangdon'] == 0)
        {
            $flag = 1;
            break;
        }
        
    };
    if($flag == 0)
    {
        $data2 = array(
             'id' => $rs['id_donhangroi'],
             'tinhtrangdon' => 2,
             'date_hoanthanh' => date('d-m-Y'),
             'active' => 1,
             
             

        );
        if ($rs_donhang_roi['sanluong'] == 0) {
            if ($rs_donhang_roi['id_taixe'] != 0) {
               // $sanluong = $model->db->query("SELECT * FROM php_luongtaixe WHERE user_id = " . $rs_donhang_roi['id_taixe'] . " AND thang=" . $rs_donhang_roi['thang_hoanthanh'] . " AND nam=" . $rs['nam_hoanthanh']);
                //$rs_sanluong = $sanluong->fetch();
                //$tongsanluong = $rs_sanluong['sanluong_hoanthanh'] + $rs_donhang_roi['tong_phivanchuyen'];

                //$taixe = $model->db->query("UPDATE php_luongtaixe SET sanluong_hoanthanh = " . $tongsanluong . " WHERE user_id = " . $rs_donhang_roi['id_taixe'] . " AND thang=" . $rs_donhang_roi['thang_hoanthanh'] . " AND nam=" . $rs_donhang_roi['nam_hoanthanh']);
                $model->db->query("UPDATE php_donhangroi  SET `sanluong` = 1 WHERE `id`= " . $rs_donhang_roi['id'] . " AND active = 1");
            } else {
                die(json_encode(
                    array(

                        'status' => '1',
                        'msg' => 'Không có tài xế phụ trách cho đơn'
                    )
                ));
            }
        } else {
            die(json_encode(
                array(

                    'status' => '1',
                    'msg' => 'Đã cấp sản lượng này cho tài xế'
                )
            ));
        }

        $oClass->update("php_donhangroi", $data2, "id=" . $data2['id']);

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

        'status' => '0',
        'msg' => 'Update thất bại'
    )
));
exit;
