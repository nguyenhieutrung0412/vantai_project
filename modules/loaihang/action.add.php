<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'loai_hang'=>htmlspecialchars(trim($_REQUEST['loai_hang'])),
 
   );
 

  
   
        $oClass->insert("php_loaihang",$data);
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