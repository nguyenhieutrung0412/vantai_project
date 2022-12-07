<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['loai_chi'])),
    'name_nguoinhan' => htmlspecialchars(trim($_REQUEST['name_nguoinhan'])),
    'diachi_nguoinhan' => htmlspecialchars(trim($_REQUEST['diachi_nguoinhan'])),
    'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
    'ngaytao_phieuchi' => date("Y-m-d"),
    'thang' => date("m"),
    'nam' => date("Y"),
    'sotien_chi' => htmlspecialchars(trim($_REQUEST['sotien_chi'])),
    'sotien_bangchu' => htmlspecialchars(trim($_REQUEST['sotien_bangchu'])),
    'noidung_chi' =>htmlspecialchars( trim($_REQUEST['noidung_chi'])),
    'kemtheo' => htmlspecialchars(trim($_REQUEST['kemtheo'])),
    'tennguoitao_chi' => $_SESSION['name'],
    
    
    'active' => 0
    
   );


   $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
   $cauhinh = $chatluong_hinhupload->fetch();
   $hanmucchi = $model->db->query("SELECT * FROM php_loaichi WHERE id =".$data['loai_chi'].' LIMIT 1');
   $rs = $hanmucchi->fetch();
    if($rs['hanmucchi'] == 0){
        $oClass->insert("php_phieuchi",$data);
        $lastid = $model->db->last_insetid("php_phieuchi");
        $oClass->upload_files('php_phieuchi',$lastid);
        $oClass->upload_images('php_phieuchi',$lastid,$cauhinh['chatluong_hinhupload']);
    }
   else{
    if($data['sotien_chi'] <= $rs['hanmucchi'])
    {
     $oClass->insert("php_phieuchi",$data);
     $lastid = $model->db->last_insetid("php_phieuchi");
     $oClass->upload_files('php_phieuchi',$lastid);
     
     $oClass->upload_images('php_phieuchi',$lastid,$cauhinh['chatluong_hinhupload']);
    }
    else{
     die(json_encode(
         array(
         
             'status'=> '0',
             'msg' => 'Vượt quá hạn mức của loại chi này'
         )
        ));
    }
   }
   
    
      
        die(json_encode(
         array(
            'p'=>$_FILES['img_file'],
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