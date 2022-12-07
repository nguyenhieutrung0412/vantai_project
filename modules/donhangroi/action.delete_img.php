<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_images", "`id`=" . $id . " LIMIT 1");
    $total = $result->num_rows();
    $rs = $result->fetch();
    if ($total == 1) {
        unlink('data/upload/images/' . $rs['file_name']);
        $oClass->delete("php_images", "id = '" . $id . "' AND type = 'php_donhangroi_s' ");

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
