<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['name_loaichi'])),
    'hanmucchi'=>htmlspecialchars(trim($_REQUEST['hanmucchi'])),
   );
    $oClass->update("php_loaichi",$data,"id=".$data['id']);
    
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