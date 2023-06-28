<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_loaichi", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    if($rs['phi_van_tai'] == 0){
        $model->db->query("UPDATE php_loaichi SET `phi_van_tai` = 1 WHERE id =".$id);
    }
    else if($rs['phi_van_tai'] == 1){
        $model->db->query("UPDATE php_loaichi SET `phi_van_tai` = 0 WHERE id =".$id);
    }

    die(json_encode(
        array(
           
            'status'=> '1',
            'msg' => 'Update thành công'
        )
       ));
}
die(json_encode(
    array(
        
        'status'=> '1',
        'msg' => 'Update thất bại'
    )
   ));
exit;