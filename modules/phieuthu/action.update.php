<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loai_thu'=>htmlspecialchars(trim($_REQUEST['loai_thu'])),
    'name_nguoithu'=>htmlspecialchars(trim($_REQUEST['name_nguoithu'])),
    'diachi_nguoithu'=>htmlspecialchars(trim($_REQUEST['diachi_nguoithu'])),
    'phone_nguoithu'=>htmlspecialchars(trim($_REQUEST['phone_nguoithu'])),
    'sotien_thu' => htmlspecialchars(trim($_REQUEST['sotien_thu'])),
    'noidung_thu' => htmlspecialchars(trim($_REQUEST['noidung_thu'])),
    'sotien_bangchu' => htmlspecialchars(trim($_REQUEST['sotien_bangchu'])),
    'tennguoitao_thu' => $_SESSION['name'],
  
   );
   if($rs['active'] == 0)
   {
   $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
   $cauhinh = $chatluong_hinhupload->fetch();
    $oClass->update("php_phieuthu",$data,"id = ".$data['id']);
    $oClass->upload_files('php_phieuthu',$data['id']);
    $oClass->upload_images('php_phieuthu',$data['id'],$cauhinh['chatluong_hinhupload']);
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