<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'name_taixe'=>htmlspecialchars(trim($_REQUEST['name'])),
    'phone_taixe'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'chuc_vu'=>'Tài xế',
    'address_taixe'=>htmlspecialchars(trim($_REQUEST['address'])),
    'hangbanglai'=>htmlspecialchars(trim($_REQUEST['hangbanglai'])),
    'name_page'=>'taixe',
    'luong_taixe'=>htmlspecialchars(trim($_REQUEST['luong_taixe'])),
    'phu_cap'=>htmlspecialchars(trim($_REQUEST['phu_cap'])),
    'tien_baohiem'=>htmlspecialchars(trim($_REQUEST['tien_baohiem'])),
    'tile_hoahong'=>htmlspecialchars(trim($_REQUEST['tile_hoahong'])),
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ten_nganhang'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['password']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    'active'=> 1
   );
   $result = $oContent->view_table("php_taixe"," `phone_taixe`=".$data['phone_taixe']."  LIMIT 1");
   $total = $result->num_rows();
  
    if($total == 0){
        $oClass->insert("php_taixe",$data);
        die(json_encode(
         array(
         
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