<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Đổi tiền tệ
    $tien_luong = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['luong'])));
    $phu_cap = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phu_cap'])));
    //lay id chuc vu
    $chucvu_id = $oContent->view_table("php_phongban", "`chuc_vu`= '".trim($_REQUEST['list_chucvu'])."' LIMIT 1");
    $chucvu_id =$chucvu_id->fetch();
   $data = array(
    'name'=>htmlspecialchars(trim($_REQUEST['name'])),
    'dateofbirth'=>htmlspecialchars(trim($_REQUEST['dateofbirth'])),
    'phone'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'diachi'=>htmlspecialchars(trim($_REQUEST['diachi'])),
    'cmnd'=>htmlspecialchars(trim($_REQUEST['cmnd'])),
    'position'=>htmlspecialchars(trim($_REQUEST['list_chucvu'])),
    'position_id'=>$chucvu_id['id'],
    'dateofcompany'=>htmlspecialchars(trim($_REQUEST['dateofcompany'])),
    'luong_nhansu'=>$tien_luong,
    'phu_cap'=>$phu_cap,
    
    'tien_baohiem'=>$oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['tien_baohiem']))) ,
    'stk'=>htmlspecialchars(trim($_REQUEST['stk'])),
    'ngan_hang'=>htmlspecialchars(trim($_REQUEST['ngan_hang'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['password']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['password'])),
    'active'=> 1
   );
   if($data['position_id'] == '0' ){
    die(json_encode(array(
        'status' => '2',
        'msg' => '(2)Không thể thêm dữ liệu (Không thể tạo admin)'
    )));
   
   }
   $result = $oContent->view_table("php_nhansu", "`phone`=".$data['phone']."  LIMIT 1");
   $total = $result->num_rows();
    if($total == 0){
       
            
            $oClass->insert("php_nhansu",$data);
   
            die(json_encode(
             array(
                 'status'=> '1',
                 'msg' => 'Thêm thành công'
             )
            ));
       
   

       
    }else{
        die(json_encode(array(
            'status' => '0',
            'msg' => 'Không thể thêm dữ liệu (Không thể tạo admin hoặc bị trùng số điện thoại)'
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