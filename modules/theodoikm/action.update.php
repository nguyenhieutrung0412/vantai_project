<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    
   $data = array(
    'id' => 1,

    'km_dinhmucthaynhot'=> $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['km_dinhmucthaynhot']))),
    'km_dinhmucthaylop'=> $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['km_dinhmucthaylop']))),
   );
    $oClass->update("php_cauhinh",$data,"id=".$data['id']);
 
    
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