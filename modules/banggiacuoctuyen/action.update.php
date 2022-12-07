<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ma_tuyen'=>htmlspecialchars(trim($_REQUEST['ma_tuyen'])),
    'ten_tuyen'=>htmlspecialchars(trim($_REQUEST['ten_tuyen'])),
    'km'=>htmlspecialchars(trim($_REQUEST['km'])),
    'so_tien'=>htmlspecialchars(trim($_REQUEST['so_tien'])),
    
   );
    $oClass->update("php_banggiacuoc_tuyen",$data,"id=".$data['id']);
    
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