<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/donhangroi/detail_v/?';

    if ($_POST['madonhang'] != '') {
        $id = $oClass->id_encode(htmlentities($_POST['madonhang']));
        $link .= 'code=' . $id;
    }
    if ($_POST['madonhang_con'] != '') {
        $id =htmlentities($_POST['madonhang_con']);
        $link .= '&code_in=' . $id;
    } 
    if ($_POST['sdt_search'] != '') {
        $link .= '&sdt_search='.$_POST['sdt_search'];
     
      
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
