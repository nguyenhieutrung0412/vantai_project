<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'tien_bao_hiem'=>htmlspecialchars(trim($_REQUEST['tien_bao_hiem'])),
    'phu_cap'=>htmlspecialchars(trim($_REQUEST['phu_cap'])),
    
  
   );

   $result = $oContent->view_table("php_luongnhansu", "`id`=".$data['id']." LIMIT 1");
   $rs= $result->fetch();

   if($rs['active'] == 0)
    {
        $data['tong_luong'] = $rs['luong_thoa_thuan'] - $data['tien_bao_hiem']+ $data['phu_cap'] - $rs['tong_so_ngay_nghi_khong_phep'] - $rs['tong_ungluong'];
   
        $oClass->update("php_luongnhansu",$data,"id=".$data['id']);    
    
      
    die(json_encode(
        array(
            
            'status'=> '1',
            'msg' => 'Update thành công'
        )
    ));
    }
    else{
        die(json_encode(
            array(
               
                'status'=> '0',
                'msg' => 'Không thế update khi đã được duyệt'
            )
           ));
    }
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
 exit;