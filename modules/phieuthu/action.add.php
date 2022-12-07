<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'loai_thu'=>htmlspecialchars(trim($_REQUEST['loai_thu'])),
    'name_nguoithu'=>htmlspecialchars(trim($_REQUEST['name_nguoithu'])),
    'diachi_nguoithu'=>htmlspecialchars(trim($_REQUEST['diachi_nguoithu'])),
    'phone_nguoithu'=>htmlspecialchars(trim($_REQUEST['phone_nguoithu'])),
    
    'ngaytao_phieuthu' => date("Y-m-d"),
    'thang' => date("m"),
    'nam' => date("Y"),
    'sotien_thu' => htmlspecialchars(trim($_REQUEST['sotien_thu'])),
    'sotien_bangchu' => htmlspecialchars(trim($_REQUEST['sotien_bangchu'])),
    'noidung_thu' => htmlspecialchars(trim($_REQUEST['noidung_thu'])),
    'tennguoitao_thu' => $_SESSION['name'],

    'active' => 0
    
   );
 
        $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
        $cauhinh = $chatluong_hinhupload->fetch();
        $oClass->insert("php_phieuthu",$data);
        $lastid = $model->db->last_insetid("php_phieuthu");
        $oClass->upload_files('php_phieuthu',$lastid);
        $oClass->upload_images('php_phieuthu',$lastid,$cauhinh['chatluong_hinhupload']);
        
        die(json_encode(
         array(
            
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