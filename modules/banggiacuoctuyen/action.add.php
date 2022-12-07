<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'ma_tuyen'=>htmlspecialchars(trim($_REQUEST['ma_tuyen'])),
    'ten_tuyen'=>htmlspecialchars(trim($_REQUEST['ten_tuyen'])),
    'km'=>htmlspecialchars(trim($_REQUEST['km'])),
    'so_tien'=>htmlspecialchars(trim($_REQUEST['so_tien'])),
    'active' => 1
 
   );
 

  
   
        $oClass->insert("php_banggiacuoc_tuyen",$data);
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