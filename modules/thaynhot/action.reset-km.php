<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_thaynhot", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    if($rs['reset'] == 0){
        $model->db->query("UPDATE php_thaynhot SET `reset` = 1 WHERE id = ".$rs['id']);
        $model->db->query("UPDATE php_theodoithaylop SET `km_tukhithaynhot` = 0 WHERE id_doixe = ".$rs['id_doixe']);
        
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