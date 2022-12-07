<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_donhang = $oClass->id_decode($_REQUEST['id_donhang']);
    $donhang = $oContent->view_table("php_donhangroi", "id = " . $id_donhang . " LIMIT 1");
    $rs_donhang = $donhang->fetch();

    if ($_POST['name_phutrach'] == 'taixe') {
        $model->db->query("UPDATE php_taixe SET `tinhtrangdon` = 0 WHERE id = " . $rs_donhang['id_taixe']);
        $taixe = $oContent->view_table("php_taixe", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_taixe = $taixe->fetch();
        if ($rs_taixe['tinhtrangdon'] == 0) {
            $data = array(

                'id_taixe' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangdon' => 1,
            );
            $oClass->update("php_donhangroi", $data, "id= " . $id_donhang);
            $oClass->update("php_taixe", $data2, "id= " . $_POST['id_phutrach']);
        } else {
            die(json_encode(
                array(

                    'status' => '0',
                    'msg' => 'Tài xế đang bận'
                )
            ));
            exit;
        }
    } elseif ($_POST['name_phutrach'] == 'phuxe') {
        $model->db->query("UPDATE php_nhansu SET `tinhtrangdon` = 0 WHERE id = " . $rs_donhang['id_nhansu']);


        $nhansu = $oContent->view_table("php_nhansu", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_nhansu = $nhansu->fetch();
        if ($rs_nhansu['tinhtrangdon'] == 0) {
            $data = array(

                'id_nhansu' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangdon' => 1,
            );
            $oClass->update("php_donhangroi", $data, "id= " . $id_donhang);
            $oClass->update("php_nhansu", $data2, "id= " . $_POST['id_phutrach']);

            die(json_encode(
                array(

                    'status' => '1',
                    'msg' => 'Update thành công'
                )
            ));
            exit;
        } else {
            die(json_encode(
                array(

                    'status' => '0',
                    'msg' => 'Phụ xe đang bận'
                )
            ));
            exit;
        }
    } elseif ($_POST['name_phutrach'] == 'doixe') {
        $model->db->query("UPDATE php_doixe SET `tinhtrangxe` = 0 WHERE id = " . $rs_donhang['id_doixe']);
        $doixe = $oContent->view_table("php_doixe", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_doixe = $doixe->fetch();
        if ($rs_doixe['tinhtrangxe'] == 0) {
            $data = array(
                'id_doixe' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangxe' => 1,
            );

            if ($rs_doixe['id_taixe'] != 0) {
                $model->db->query("UPDATE php_taixe SET `tinhtrangdon` = 0 WHERE id = " . $rs_donhang['id_taixe']);
                $data_donhang = array(

                    'id_taixe' => trim($rs_doixe['id_taixe'])
                );
                $data_taixe = array(
                    'tinhtrangdon' => 1,
                );
                $oClass->update("php_donhangroi", $data_donhang, "id= " . $id_donhang);
                $oClass->update("php_taixe", $data_taixe, "id= " . $rs_doixe['id_taixe']);
            }
            $oClass->update("php_donhangroi", $data, "id= " . $id_donhang);
            $oClass->update("php_doixe", $data2, "id= " . $_POST['id_phutrach']);
        } else {
            die(json_encode(
                array(

                    'status' => '0',
                    'msg' => 'Xe đang có chuyến'
                )
            ));
            exit;
        }
    } else {
        die(json_encode(
            array(

                'status' => '2',
                'msg' => '(2).Xảy ra lỗi khi điều lệnh'
            )
        ));
    }

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Update thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
