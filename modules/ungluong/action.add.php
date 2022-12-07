<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'user_id'=>htmlspecialchars( trim($_REQUEST['nhan_su'])),
    'so_tien_ung' => htmlspecialchars( trim($_REQUEST['so_tien_ung'])),
   
    'ngay' => date("d"),
    'thang' => date("m"),
    'nam' => date("Y"),
    'nguoi_tao_don' => $_SESSION['name'],
    'active' => 0
    
   );

        $oClass->insert("php_ungluong",$data);
 
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