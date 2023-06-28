<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $data = array(
    'id' => $oClass->id_decode($_POST['id']),
    'tinhtrang_khonhan'=>1,
    'id_nv_khonhan'=>$_SESSION['user_id'],
    'ten_nv_khonhan'=>$_SESSION['name'],
    'time_nhanhang'=>date("Y-m-d h:i:s"),
    'ghichu_nhanhang'=>$_POST['ghichu_nhanhang'],
   );
    $oClass->update("php_donhangroi_s",$data,"id=".$data['id']);
    $oClass->upload_images('php_truckho_xacnhanhang',$data['id'],$chatluonghinh);
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