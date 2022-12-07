<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'domain'=>htmlspecialchars(trim($_REQUEST['domain'])),
    'phone'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'company'=>htmlspecialchars(trim($_REQUEST['company'])),
    'MaSothue'=>htmlspecialchars(trim($_REQUEST['MaSothue'])),
    'email'=>htmlspecialchars(trim($_REQUEST['email'])),
    'address'=>htmlspecialchars(trim($_REQUEST['address'])),
    'chatluong_hinhupload'=>htmlspecialchars(trim($_REQUEST['chatluong_hinhupload'])),
    'nam_hoatdong'=>htmlspecialchars(trim($_REQUEST['nam_hoatdong'])),
    
   );
 
    $oClass->update("php_cauhinh",$data,"id=".$data['id']);
   
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