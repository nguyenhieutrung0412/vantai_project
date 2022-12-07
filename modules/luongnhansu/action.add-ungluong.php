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