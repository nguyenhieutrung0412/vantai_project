<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'ten_donvi'=>htmlspecialchars(trim($_REQUEST['ten_donvi'])),
    'sdt'=>htmlspecialchars(trim($_REQUEST['sdt'])),
    'dia_chi'=>htmlspecialchars(trim($_REQUEST['dia_chi'])),
    'active' =>1
   );
 

  
   
        $oClass->insert("php_donvi_suachua",$data);
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