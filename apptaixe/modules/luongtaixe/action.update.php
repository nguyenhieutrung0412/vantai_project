<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'tien_bao_hiem'=>htmlspecialchars(trim($_REQUEST['tien_bao_hiem'])),
    'phu_cap'=>htmlspecialchars(trim($_REQUEST['phu_cap'])),
    
  
   );

   $result = $oContent->view_table("php_luongtaixe", "`id`=".$data['id']." LIMIT 1");
   $rs= $result->fetch();

   //xử lý tình tiền hoa hông
   $user_ns = $model->db->query("SELECT * FROM php_taixe WHERE id=" .$data['user_id'] .' LIMIT 1');
   $rs_ns = $user_ns->fetch();
   $tienhoahong = $rs['sanluong_hoanthanh'] * $rs_ns['tile_hoahong'];

   //end

   
   if($rs['active'] == 0)
    {
        $data['tong_luong'] = $rs['luong_thoa_thuan'] - $data['tien_bao_hiem']+ $data['phu_cap'] - $rs['tong_so_ngay_nghi_khong_phep'] - $rs['tong_ungluong'];
        $data['tien_hoahong'] = $tienhoahong;
        $oClass->update("php_luongtaixe",$data,"id=".$data['id']);    
    
      
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