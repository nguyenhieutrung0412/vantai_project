<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'loaithu'=>htmlspecialchars(trim($_REQUEST['name_loaithu'])),
    'hanmucthu'=>htmlspecialchars(trim($_REQUEST['hanmucthu'])),
    'baocao'=> 1,
    'active'=> 1
   );
 

  
   
        $oClass->insert("php_loaithu",$data);
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