<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $count_insert = count($_REQUEST['id']);

    if ($count_insert > 0) {
        for($i = 0;$i <= $count_insert;$i++)
        {
            $result = $oContent->view_table("php_donhangroi_s", "`id`= " .$_REQUEST['id'][$i] . " LIMIT 1");
            $rs = $result->fetch();
            $result2 = $oContent->view_table("php_donhangroi", "`id`= " .$_REQUEST['id_donhangroi'] . " LIMIT 1");
            $rs2 = $result2->fetch();
            $model->db->query("UPDATE `php_donhangroi` SET `tong_phivanchuyen`='" . $rs2['tong_phivanchuyen'] + $rs['phivanchuyen'] . "' WHERE id ='" . $_REQUEST['id_donhangroi'] . "'");
            $model->db->query("UPDATE `php_donhangroi_s` SET `id_donhangroi`='" . $_REQUEST['id_donhangroi'] . "' WHERE id ='" . $_REQUEST['id'][$i] . "'");
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
