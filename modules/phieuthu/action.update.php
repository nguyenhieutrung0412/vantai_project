<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['loai_chi'])),
    'name_nguoinhan'=>htmlspecialchars(trim($_REQUEST['name_nguoinhan'])),
    'diachi_nguoinhan'=>htmlspecialchars(trim($_REQUEST['diachi_nguoinhan'])),
    'phone_nguoinhan'=>htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
    'sotien_chi' => htmlspecialchars(trim($_REQUEST['sotien_chi'])),
    'noidung_chi' => htmlspecialchars(trim($_REQUEST['noidung_chi'])),
    'sotien_bangchu' => htmlspecialchars(trim($_REQUEST['sotien_bangchu'])),
    'tennguoitao_chi' => $_SESSION['name'],
  
   );
   if($rs['active'] == 0)
   {
   $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
   $cauhinh = $chatluong_hinhupload->fetch();
    $oClass->update("php_phieuchi",$data,"id = ".$data['id']);
    $oClass->upload_files('php_phieuchi',$data['id']);
    $oClass->upload_images('php_phieuchi',$data['id'],$cauhinh['chatluong_hinhupload']);
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