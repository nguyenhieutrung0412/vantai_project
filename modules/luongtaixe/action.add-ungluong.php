<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $date = explode('/',$_REQUEST['date_ung']);
                $data = array(
                'user_id'=>htmlspecialchars($_REQUEST['user_id']),
                'so_tien_ung' =>htmlspecialchars($_REQUEST['so_tien_ung']),
                'noidung_ung' =>htmlspecialchars($_REQUEST['noidung_ung']),
                'ngay' => $date[0],
                'thang' =>$rs['thang'],
                'nam' => $rs['nam'],
                'nguoi_tao_don' => $_SESSION['name'],
                'active'=> 0
                );
                $oClass->insert("php_ungluong",$data);


//                $tru_luong_ngay_nghi = ($rs['luong_thoa_thuan'] / $rs['ngay_cong']) * $_REQUEST['tong_ngaynghi_kphep'];
//
//                $data2 = array(
//                    'tong_luong' => $rs['luong_thoa_thuan'] - $rs['tien_bao_hiem'] + $rs['phu_cap'] - $rs['tong_so_ngay_nghi_khong_phep'] - $_REQUEST['so_tien_ung'],
//                    'tong_ungluong'=> $_REQUEST['so_tien_ung']
//                );
//                $result2 = $oContent->view_table("php_ungluong", "`user_id`=".$data['user_id']." AND ngay = ".$data['ngay']." AND thang = ".$data['thang']." AND nam = ".$data['nam']."  LIMIT 1");
//                $total = $result2->num_rows();
//                $rs2 = $result2->fetch();
//                if($total == 1){
//                    $oClass->update("php_ungluong",$data,"id = ".$rs2['id']);
//                }
//                else{
//                    $oClass->insert("php_ungluong",$data);
//                }
//
//                $oClass->update("php_luongnhansu",$data2,"id = ".$rs['id']);

                
                
                   
    
        die(json_encode(
         array(
           
             'status'=> '1', 
             'msg' => 'Ứng thành công, đợi duyệt đơn'
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