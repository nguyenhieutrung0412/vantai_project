<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //xử lý lấy tháng năm của ngày đổ dầu
     $thoigian = explode("/",$_REQUEST['ngay_thaylop']);
        //xử lý lấy tháng năm của ngày đổ dầu
      
        if(strlen($thoigian[1]) == 1)
        {
           $thoigian[1] = '0'.$thoigian[1];
        }
        //xử lý lưu dữ liệu theo giờ quốc tế
               $gio_quocte = $thoigian[2].'-'.$thoigian[1].'-'.$thoigian[0];
               //end 
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ngay_thaylop'=>$gio_quocte,
    'km_luc_thaylop'=> htmlspecialchars(trim($_REQUEST['km_luc_thaylop'])),
    'vitri_lop'=> htmlspecialchars(trim($_REQUEST['vitri_lop'])),
    'seri'=> htmlspecialchars(trim($_REQUEST['seri'])),
    'noidung'=> htmlspecialchars(trim($_REQUEST['noidung'])),
    'tong_tien'=> $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['tong_tien']))),
    'ngay' => $thoigian[0],
    'thang' => $thoigian[1],
    'nam' => $thoigian[2],
   );
    $oClass->update("php_thaylop",$data,"id=".$data['id']);
    $oClass->upload_files('php_thaylop',$data['id']);
    $oClass->upload_images('php_thaylop',$data['id'],$chatluonganh);
    
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