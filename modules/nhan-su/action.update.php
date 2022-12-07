<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $chucvu_id = $oContent->view_table("php_phongban", "`chuc_vu`= '".trim($_REQUEST['list_chucvu'])."' LIMIT 1");
    $chucvu_id =$chucvu_id->fetch();
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name'=>htmlspecialchars(trim($_REQUEST['name'])),
    'dateofbirth'=>htmlspecialchars(trim($_REQUEST['dateofbirth'])),
    'phone'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'diachi'=>htmlspecialchars(trim($_REQUEST['diachi'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    'position'=>htmlspecialchars(trim($_REQUEST['list_chucvu'])),
    'position_id'=>$chucvu_id['id'],
    'dateofcompany'=>htmlspecialchars(trim($_REQUEST['dateofcompany'])),
    'luong_nhansu'=>htmlspecialchars(trim($_REQUEST['luong'])),
    'phu_cap'=>htmlspecialchars(trim($_REQUEST['phu_cap'])),
    'tien_baohiem'=>(htmlspecialchars(trim($_REQUEST['luong'])) + htmlspecialchars($_REQUEST['phu_cap']))  * 0.015,
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ngan_hang'])),
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
   
    $oClass->update("php_nhansu",$data,"id=".$data['id']);
   
   die(json_encode(
    array(
        'name' => $_REQUEST['name'],
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