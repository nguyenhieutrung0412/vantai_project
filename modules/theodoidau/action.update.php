<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //xử lý lấy tháng năm của ngày đổ dầu
     $thoigian = explode("/",$_REQUEST['ngay_do']);
     if(strlen($thoigian[1]) == 1)
     {
        $thoigian[1] = '0'.$thoigian[1];
     }
     $dau = $oContent->view_table("php_theodoidau","id= ".$oClass->id_decode($_REQUEST['id']));
     $rs = $dau->fetch();
     //xử lý lưu dữ liệu theo giờ quốc tế
			$gio_quocte = $thoigian[2].'-'.$thoigian[1].'-'.$thoigian[0];
			//end 
            	//xử lý mức độ tiêu hao nhiên liệu
			$xe = $model->db->query("Select * FROM php_theodoidau WHERE id_doixe = ". $rs['id_doixe']." ORDER BY id DESC LIMIT 1");
			$xe_rs = $xe->fetch();
		    $so_km_chay_duoc_lucdo =  str_replace(".","",$_REQUEST['km_luc_do']) - str_replace(".","",$xe_rs['km_luc_do']); 
		 $muc_do_tieu_hao = $so_km_chay_duoc_lucdo / $_REQUEST['so_lit'];


            //end 
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'ngay_do'=>$gio_quocte.' '.htmlspecialchars(trim($_REQUEST['gio_do'])).':'.htmlspecialchars(trim($_REQUEST['phut_do'])),
    'km_luc_do'=> htmlspecialchars(trim($_REQUEST['km_luc_do'])),
    'so_lit'=> htmlspecialchars(trim($_REQUEST['so_lit'])),
    'do_dau_ngoai'=> htmlspecialchars(trim($_REQUEST['dau_ngoai'])),
    'msd_truockhido'=> htmlspecialchars(trim($_REQUEST['msd_truockhido'])),
    'msd_saukhido'=> htmlspecialchars(trim($_REQUEST['msd_saukhido'])),
    'muc_do_tieu_hao'=> $muc_do_tieu_hao,
    'don_gia'=> $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['don_gia']))),
    'tong_tien'=>$oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['don_gia']))) * htmlspecialchars(trim($_REQUEST['so_lit'])),
    'ngay' => $thoigian[0],
    'thang' => $thoigian[1],
    'nam' => $thoigian[2],
   );
    $oClass->update("php_theodoidau",$data,"id=".$data['id']);
    $oClass->upload_files('php_theodoidau',$data['id']);
    $oClass->upload_images('php_theodoidau',$data['id'],$chatluonganh);
    
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