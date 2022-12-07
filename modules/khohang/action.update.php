<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ten_kho'=>htmlspecialchars(trim($_REQUEST['ten_kho'])),
    'diachi_kho'=>htmlspecialchars(trim($_REQUEST['diachi_kho'])),
   );
    $oClass->update("php_kho",$data,"id=".$data['id']);
    
   die(json_encode(
    array(
        'status'=> '1',
        'msg' => 'Update thành công'
    )
   ));
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
 exit;