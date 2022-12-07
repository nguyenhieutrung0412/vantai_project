<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loai_hang'=>htmlspecialchars(trim($_REQUEST['loai_hang'])),
    
   );
    $oClass->update("php_loaihang",$data,"id=".$data['id']);
    
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