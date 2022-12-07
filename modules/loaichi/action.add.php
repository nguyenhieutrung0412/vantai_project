<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['name_loaichi'])),
    'hanmucchi'=>htmlspecialchars(trim($_REQUEST['hanmucchi'])),
    'baocao'=> 1,
    'active'=> 1
   );
 

  
   
        $oClass->insert("php_loaichi",$data);
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