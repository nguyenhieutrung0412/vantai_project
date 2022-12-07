<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_donhangroi", "`id`= " . $id . " LIMIT 1");
    $rs = $result->fetch();

    if ($rs['active'] == 1) {
        if ($rs['sanluong'] == 0) {
            if ($rs['id_taixe'] != 0) {
                $sanluong = $model->db->query("SELECT * FROM php_luongtaixe WHERE user_id = " . $rs['id_taixe'] . " AND thang=" . $rs['thang_hoanthanh'] . " AND nam=" . $rs['nam_hoanthanh']);
                $rs_sanluong = $sanluong->fetch();
                $tongsanluong = $rs_sanluong['sanluong_hoanthanh'] + $rs['tong_phivanchuyen'];

                $taixe = $model->db->query("UPDATE php_luongtaixe SET sanluong_hoanthanh = " . $tongsanluong . " WHERE user_id = " . $rs['id_taixe'] . " AND thang=" . $rs['thang_hoanthanh'] . " AND nam=" . $rs['nam_hoanthanh']);
                $model->db->query("UPDATE php_donhangroi  SET `sanluong` = 1 WHERE `id`= " . $id . " AND active = 1");
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
    } else {
        die(json_encode(
            array(

                'status' => '1',
                'msg' => 'Đơn hàng chưa hoàn thành'
            )
        ));
    }


    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Thành công'
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
