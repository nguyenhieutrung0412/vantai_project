<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sotien = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['so_tien'])));
    $sokm = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['km'])));
    $luong_chuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['luong_chuyen'])));
    $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ma_tuyen'=>htmlspecialchars(trim($_REQUEST['ma_tuyen'])),
    'ten_tuyen'=>htmlspecialchars(trim($_REQUEST['ten_tuyen'])),
    'dvt'=>htmlspecialchars(trim($_REQUEST['dvt'])),
    'km'=>$sokm,
    'so_tien'=>$sotien,
    'luong_chuyen'=>$luong_chuyen,
    'active' => 1
 
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