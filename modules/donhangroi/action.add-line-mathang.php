<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $count_insert = count($_REQUEST['data']);
    if ($count_insert > 0) {
        foreach ($_REQUEST['data'] as $key => $list) {
            $id_donhangroi = $_REQUEST['id_donhangroi'];
            $name = $list['name'];
            $dvt = $list['dvt'];
            $soluong = $list['soluong'];
            $ghichu = $list['ghichu'];
            //echo "INSERT INTO php_mathang_donhang  (`id_donhang`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES ('".$id_donhang."','".$name."','".$dvt."','".$soluong."','".$ghichu."')"."<br>";
            $model->db->query("INSERT INTO php_mathang_donhangroi  (`id_donhangroi`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES ('" . $id_donhangroi . "','" . $name . "','" . $dvt . "','" . $soluong . "','" . $ghichu . "')");
        }
    }
    $count_update = count($_REQUEST['update']);
    if ($count_update > 0) {
        foreach ($_REQUEST['update'] as $key => $list) {
            $id = $list['id'];
            $name = $list['name'];
            $dvt = $list['dvt'];
            $soluong = $list['soluong'];
            $ghichu = $list['ghichu'];
            //echo "UPDATE `php_mathang_donhang` SET `ten`='".$name."',`dvt`='".$dvt."',`soluong`='".$soluong."',`ghichu`='".$ghichu."' WHERE id ='".$id."'<br>";
            $model->db->query("UPDATE `php_mathang_donhangroi` SET `ten`='" . $name . "',`dvt`='" . $dvt . "',`soluong`='" . $soluong . "',`ghichu`='" . $ghichu . "' WHERE id ='" . $id . "'");
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
