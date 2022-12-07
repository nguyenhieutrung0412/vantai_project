<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . " LIMIT 1");
    $total = $result->num_rows();
    $rs = $result->fetch();
    if ($total == 1) {

        //xử lý cộng dồn phí vận chuyển đơn hàng tổng
        $result_donhang = $oContent->view_table("php_donhangroi", "id=" . $rs['id_donhangroi']);
        $rs_donhang = $result_donhang->fetch();
        $data2['tong_phivanchuyen'] = $rs_donhang['tong_phivanchuyen'] - $rs['phivanchuyen'];

        $oClass->update("php_donhangroi", $data2, "id =" . $rs['id_donhangroi']);

        $oClass->delete("php_donhangroi_s", "`id`=" . $id);
        $result2 = $oContent->view_table("php_images", "`type_id`=" . $id);
        while ($rs2 = $result2->fetch()) {
            unlink('data/upload/images/' . $rs2['file_name']);
            $oClass->delete("php_images", "type_id = '" . $id . "' AND type = 'php_donhangroi_s' ");
        }

        die(json_encode(
            array(

                'status' => '1',
                'msg' => 'Xóa thành công'
            )
        ));
    } else {
        die(json_encode(
            array(

                'status' => '0',
                'msg' => 'Không tìm thấy id'
            )
        ));
    }
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Xóa thất bại'
    )
));
