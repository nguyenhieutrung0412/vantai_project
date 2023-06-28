<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/donhangroi/?';

    if ($_POST['madonhang'] != '') {
        $id = $oClass->id_encode(htmlentities($_POST['madonhang']));
        $link .= 'code=' . $id;
    }
    if($_POST['idtaixe_search'] != 0)
    {
        $link .= '&taixe='.htmlentities($_POST['idtaixe_search']);
    }
    if($_POST['idxe_search'] != 0)
    {
        $link .= '&xe='.htmlentities($_POST['idxe_search']);
    }
    if($_POST['from_ngay'] != 0)
    {
        $link .= '&from='.htmlentities($_POST['from_ngay']);
    }
    if($_POST['to_ngay'] != 0)
    {
        $link .= '&to='.htmlentities($_POST['to_ngay']);
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
