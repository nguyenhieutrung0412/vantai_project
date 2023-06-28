<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ten_donvi'=>htmlspecialchars(trim($_REQUEST['ten_donvi'])),
    'sdt'=>htmlspecialchars(trim($_REQUEST['sdt'])),
    'dia_chi'=>htmlspecialchars(trim($_REQUEST['dia_chi'])),
    
   );
    $oClass->update("php_donvi_suachua",$data,"id=".$data['id']);
    
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