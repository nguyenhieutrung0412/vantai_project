<?php



if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name_kh'=>htmlspecialchars(trim($_REQUEST['name'])),
  
    'phone_kh'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'address_kh'=>htmlspecialchars(trim($_REQUEST['address'])),
    'email_kh'=>htmlspecialchars(trim($_REQUEST['email'])),
    'ten_congty'=>htmlspecialchars(trim($_REQUEST['ten_congty'])),
    'masothue'=>htmlspecialchars(trim($_REQUEST['masothue'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    'pwd'=>htmlspecialchars(trim($_REQUEST['password'])),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    
   );
   if($data['pwd'] == ""){
    unset($data['pwd']);
    unset($data['pwd2']);
    }
    else{
        $data['pwd'] = md5( $data['pwd']);
    }
    $oClass->update("php_khachhang",$data,"id=".$data['id']);
   
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