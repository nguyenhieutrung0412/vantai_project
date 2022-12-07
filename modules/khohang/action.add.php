<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'ten_kho'=>htmlspecialchars(trim($_REQUEST['ten_kho'])),
    'diachi_kho'=>htmlspecialchars(trim($_REQUEST['diachi_kho'])),

    'active'=> 1
   );
 

  
   
        $oClass->insert("php_kho",$data);
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