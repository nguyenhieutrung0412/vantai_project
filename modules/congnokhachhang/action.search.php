<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/congnokhachhang/?';
    if ($_POST['ma_bangluong'] != '') {
        $id = $oClass->id_encode(htmlentities($_POST['ma_bangluong']));
        $link .= 'code=' . $id;
    }
    if ($_POST['thang_search'] != 0) {
        $link .= '&thang=' . htmlentities($_POST['thang_search']);
    }
    if ($_POST['nam_search'] != 0) {
        $link .= '&nam=' . htmlentities($_POST['nam_search']);
    }


    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
