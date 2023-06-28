<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_thaylop", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
     $vitri = strtolower($rs['vitri_lop']);
    if($rs['reset'] == 0){
        $model->db->query("UPDATE php_thaylop SET `reset` = 1 WHERE id = ".$rs['id']);

        $model->db->query("UPDATE php_theodoithaylop SET `".$vitri."` = 0 WHERE id_doixe = ".$rs['id_doixe']);
        
    }
   
    die(json_encode(
        array(
           
            'status'=> '1',
            'msg' => 'Reset thành công'
        )
       ));
}
die(json_encode(
    array(
        
        'status'=> '0',
        'msg' => 'Reset thất bại'
    )
   ));
exit;