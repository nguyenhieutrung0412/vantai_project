<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Đổi tiền tệ
        $tien_luong = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['luong_taixe'])));
        $phu_cap = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phu_cap'])));
   $data = array(
    'name_taixe'=>htmlspecialchars(trim($_REQUEST['name'])),
    'phone_taixe'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'chuc_vu'=>'Tài xế',
    'address_taixe'=>htmlspecialchars(trim($_REQUEST['address'])),
    'hangbanglai'=>htmlspecialchars(trim($_REQUEST['hangbanglai'])),
    'name_page'=>'taixe',
    'luong_taixe'=>$tien_luong,
    'phu_cap'=>$phu_cap,
   
    'tien_baohiem'=>$oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['tien_baohiem']))) ,
    
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ten_nganhang'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['password']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    'active'=> 1,
    'permission'=> 'ALL',
    'ngayvaolam'=>htmlspecialchars(trim($_REQUEST['ngayvaolam'])),
    'sdt_nguoithan'=>htmlspecialchars(trim($_REQUEST['sdt_nguoithan'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    
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
   $result = $oContent->view_table("php_taixe"," `phone_taixe`=".$data['phone_taixe']."  LIMIT 1");
   $total = $result->num_rows();
  
    if($total == 0){
        $oClass->insert("php_taixe",$data);
        $lastid = $model->db->last_insetid("php_taixe");
        $oClass->upload_files('php_taixe',$lastid);
        $oClass->upload_images('php_taixe',$lastid,$chatluong_hinhupload);
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