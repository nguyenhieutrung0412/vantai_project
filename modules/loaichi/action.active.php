<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_loaichi", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    if($rs['active'] == 0){
        $oClass->updateActive("php_loaichi",1,"`php_loaichi`.`id` = ".$id  );
    }
    else if($rs['active'] == 1){
        $update = $oClass->updateActive("php_loaichi",0,"`id` = ".$id  );
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