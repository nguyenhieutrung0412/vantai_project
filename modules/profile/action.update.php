<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name'=>htmlspecialchars(trim($_REQUEST['name'])),
    'dateofbirth'=>htmlspecialchars(trim($_REQUEST['dateofbirth'])),
    'phone'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['pwd2']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['pwd2'])),
    
   );
 
    $oClass->update("php_nhansu",$data,"id=".$data['id']);
   
   die(json_encode(
    array(
       
        'status'=> '1',
        'msg' => 'Thêm thành công'
    )
   ));

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;