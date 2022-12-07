<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name_taixe'=>htmlspecialchars(trim($_REQUEST['name'])),
    'phone_taixe'=>htmlspecialchars(trim($_REQUEST['phone'])),
 
    'address_taixe'=>htmlspecialchars(trim($_REQUEST['address'])),
    'hangbanglai'=>htmlspecialchars(trim($_REQUEST['hangbanglai'])),
    'luong_taixe'=>htmlspecialchars(trim($_REQUEST['luong_taixe'])),
    'phu_cap'=>htmlspecialchars(trim($_REQUEST['phu_cap'])),
    'tien_baohiem'=>htmlspecialchars(trim($_REQUEST['tien_baohiem'])),
    'tile_hoahong'=>htmlspecialchars(trim($_REQUEST['tile_hoahong'])),
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ten_nganhang'])),
    'pwd'=>htmlspecialchars(trim($_REQUEST['password'])),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
   
   );
   $data2 = array(
    
    'taixe'=>trim($_REQUEST['phone']),
    
   
   );
        if($data['pwd'] == ""){
            unset($data['pwd']);
            unset($data['pwd2']);
        }
        else{
            $data['pwd'] = md5( $data['pwd']);
        }
    $oClass->update("php_doixe",$data2," id_taixe ='".$data['id']."'");
    $oClass->update("php_taixe",$data,"id=".$data['id']);
  
   
   die(json_encode(
    array(
        'name' => $_REQUEST['name'],
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