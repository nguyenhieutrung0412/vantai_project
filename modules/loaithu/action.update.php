<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loaithu'=>htmlspecialchars(trim($_REQUEST['name_loaithu'])),
    'hanmucthu'=>htmlspecialchars(trim($_REQUEST['hanmucthu'])),
   );
    $oClass->update("php_loaithu",$data,"id=".$data['id']);
    
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