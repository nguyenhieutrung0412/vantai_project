<?php


    
    $xe = $oContent->view_table("php_doixe");
    
    while($rs = $xe->fetch())
    {
        $theodoilop = $model->db->query("SELECT * FROM php_theodoithaylop WHERE id_doixe =" .$rs['id'] ." LIMIT 1");
        $rs_theodoilop = $theodoilop->fetch();
        if($rs['id'] == $rs_theodoilop['id_doixe'])
        {
            unset($rs['id']);
        }
        else{
            $model->db->query("INSERT INTO `php_theodoithaylop` (`id_doixe`, `km_tukhithaynhot`, `1p1`, `1t1`, `2p1`, `2t1`, `3p1`, `3p2`, `3t1`, `3t2`, `4p1`, `4p2`, `4t1`, `4t2`) VALUES (".$rs['id'].",0,0,0,0,0,0,0,0,0,0,0,0)");
        }
      
    }
    
    die(json_encode(
        array(
            'status'=> '1',
            'msg' => 'Tạo thành công'
        )
       ));

 exit;