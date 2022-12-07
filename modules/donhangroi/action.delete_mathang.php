<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_mathang_donhang", "`id`=" . $id . " LIMIT 1");
    $total = $result->num_rows();
    $rs = $result->fetch();
    if ($total == 1) {

        $oClass->delete("php_mathang_donhang", "id = '" . $id . "' ");

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

        'status' => '2',
        'msg' => 'Xóa thất bại'
    )
));
