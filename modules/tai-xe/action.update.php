<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //Đổi tiền tệ
     $tien_luong = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['luong_taixe'])));
     $phu_cap = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phu_cap'])));
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name_taixe'=>htmlspecialchars(trim($_REQUEST['name'])),
    'phone_taixe'=>htmlspecialchars(trim($_REQUEST['phone'])),
 
    'address_taixe'=>htmlspecialchars(trim($_REQUEST['address'])),
    'hangbanglai'=>htmlspecialchars(trim($_REQUEST['hangbanglai'])),
    'luong_taixe'=>$tien_luong,
    'phu_cap'=>$phu_cap,

    'tien_baohiem'=>$oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['tien_baohiem']))),
    'tile_hoahong'=>htmlspecialchars(trim($_REQUEST['tile_hoahong'])),
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ten_nganhang'])),
    'pwd'=>htmlspecialchars(trim($_REQUEST['password'])),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    'ngayvaolam'=>htmlspecialchars(trim($_REQUEST['ngayvaolam'])),
    'sdt_nguoithan'=>htmlspecialchars(trim($_REQUEST['sdt_nguoithan'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    'luong_chuyen'=>htmlspecialchars(trim($_REQUEST['luong_chuyen'])),
    
   
   );
   if(htmlspecialchars(trim($_REQUEST['hinhthucnhanluong'])) == '1')
   {
    $data['luong_chuyen'] = 1;
    $data['tile_hoahong'] = 0;
   }
   elseif(htmlspecialchars(trim($_REQUEST['hinhthucnhanluong'])) == '2'){
    $data['luong_chuyen'] = 0;
    $data['tile_hoahong'] = htmlspecialchars(trim($_REQUEST['tile_hoahong']));
   }
   elseif(htmlspecialchars(trim($_REQUEST['hinhthucnhanluong'])) == '0'){
    $data['luong_chuyen'] = 0;
    $data['tile_hoahong'] = 0;
   }
   $data2 = array(
    
    'taixe'=>trim($_REQUEST['phone']),
    
   
   );
        if($data['pwd'] == ""){
            unset($data['pwd']);
            unset($data['pwd2']);
        }
        else{
            $data['pwd'] = md5( $data['pwd']);
        }
    $oClass->update("php_doixe",$data2," id_taixe ='".$data['id']."'");
    $oClass->update("php_taixe",$data,"id=".$data['id']);
    $oClass->upload_files('php_taixe',$data['id']);
    $oClass->upload_images('php_taixe',$data['id'],$chatluong_hinhupload);
  
   
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