<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $count_insert = count($_REQUEST['data']);
    if ($count_insert > 0) {
        foreach ($_REQUEST['data'] as $key => $list) {
            $id_khachhang = $_REQUEST['id_khachhang'];
            $ten_tuyen = $list['ten_tuyen'];
            $km = $oClass->DoiSoTien($list['km']);
            $don_gia = $oClass->DoiSoTien($list['don_gia']);
            $luong_chuyen = $oClass->DoiSoTien($list['luong_chuyen']);
            //echo "INSERT INTO php_mathang_donhang  (`id_donhang`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES ('".$id_donhang."','".$name."','".$dvt."','".$soluong."','".$ghichu."')"."<br>";
            $model->db->query("INSERT INTO php_banggia_hopdong  (`id_khachhang`, `ten_tuyen`, `km`, `don_gia`, `luong_chuyen`, `active`) VALUES ('" . $id_khachhang . "','" . $ten_tuyen . "','" . $km . "','" . $don_gia . "','" . $luong_chuyen . "',1)");
        }
    }
    $count_update = count($_REQUEST['update']);
    if ($count_update > 0) {
        foreach ($_REQUEST['update'] as $key => $list) {
            $id = $list['id'];
            $id_khachhang = $_REQUEST['id_khachhang'];
            $ten_tuyen = $list['ten_tuyen'];
            $km = $oClass->DoiSoTien($list['km']);
            $don_gia = $oClass->DoiSoTien($list['don_gia']);
            $luong_chuyen = $oClass->DoiSoTien($list['luong_chuyen']);
            //echo "UPDATE `php_mathang_donhang` SET `ten`='".$name."',`dvt`='".$dvt."',`soluong`='".$soluong."',`ghichu`='".$ghichu."' WHERE id ='".$id."'<br>";
            $model->db->query("UPDATE `php_banggia_hopdong` SET `id_khachhang`='" . $id_khachhang . "',`ten_tuyen`='" . $ten_tuyen . "',`km`='" . $km . "',`don_gia`='" . $don_gia . "',`luong_chuyen`='" . $luong_chuyen . "' WHERE id ='" . $id . "'");
        }
    }

   



    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}

exit;
