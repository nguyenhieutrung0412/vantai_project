<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //rand mã khách hàng tự động 
 
    
   $data = array(
    
    'name_kh'=>htmlspecialchars(trim($_REQUEST['name'])),
    'phone_kh'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'address_kh'=>htmlspecialchars(trim($_REQUEST['address'])),
    'email_kh'=>htmlspecialchars(trim($_REQUEST['email'])),
    'ten_congty'=>htmlspecialchars(trim($_REQUEST['ten_congty'])),
    'masothue'=>htmlspecialchars(trim($_REQUEST['masothue'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['password']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    'active'=> 1
   );
   $result = $oContent->view_table("php_khachhang", "`phone_kh`=".$data['phone_kh']." LIMIT 1");
   $total = $result->num_rows();
    if($total == 0){
        $oClass->insert("php_khachhang",$data);
   
        die(json_encode(
         array(
             'name' => $id_kt,
             'status'=> '1',
             'msg' => 'Thêm thành công'
         )
        ));
    }else{
        die(json_encode(array(
            'status' => '0',
            'msg' => 'Trùng số điện thoại không thể thêm dữ liệu!!!'
        )));
    }
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;