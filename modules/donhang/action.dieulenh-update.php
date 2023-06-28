<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_donhang = $oClass->id_decode($_REQUEST['id_donhang']);

    if ($_POST['name_phutrach'] == 'taixe') {
        $taixe = $oContent->view_table("php_taixe", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_taixe = $taixe->fetch();
       
            $data = array(

                'id_taixe' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangdon' => 1,
            );
            $oClass->update("php_donhangtrongoi", $data, "id= " . $id_donhang);
            $oClass->update("php_taixe", $data2, "id= " . $_POST['id_phutrach']);
        
    } elseif ($_POST['name_phutrach'] == 'phuxe') {

        $nhansu = $oContent->view_table("php_nhansu", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_nhansu = $nhansu->fetch();
       
            $data = array(

                'id_nhansu' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangdon' => 1,
            );
            $oClass->update("php_donhangtrongoi", $data, "id= " . $id_donhang);
            $oClass->update("php_nhansu", $data2, "id= " . $_POST['id_phutrach']);
       
    } elseif ($_POST['name_phutrach'] == 'doixe') {
        $doixe = $oContent->view_table("php_doixe", "id = " . $_REQUEST['id_phutrach'] . " LIMIT 1");
        $rs_doixe = $doixe->fetch();
       
            $data = array(
                'id_doixe' => trim($_REQUEST['id_phutrach'])
            );
            $data2 = array(
                'tinhtrangxe' => 1,
            );

            if ($rs_doixe['id_taixe'] != 0) {
                $data_donhang = array(

                    'id_taixe' => trim($rs_doixe['id_taixe'])
                );
                $data_taixe = array(
                    'tinhtrangdon' => 1,
                );
                $oClass->update("php_donhangtrongoi", $data_donhang, "id= " . $id_donhang);
                $oClass->update("php_taixe", $data_taixe, "id= " . $rs_doixe['id_taixe']);
            }
            $oClass->update("php_donhangtrongoi", $data, "id= " . $id_donhang);
            $oClass->update("php_doixe", $data2, "id= " . $_POST['id_phutrach']);
       
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
