<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'user_id'=>trim($_REQUEST['nhan_su']),
    'so_tien_ung' => htmlspecialchars( trim($_REQUEST['so_tien_ung'])),
    'nguoi_tao_don' => $_SESSION['name'], 
  
   );
   $result = $oContent->view_table("php_ungluong", "`id`=".$data['id']."  LIMIT 1");
   $rs = $result->fetch();
   if($rs['active'] == 0)
   {
        $oClass->update("php_ungluong",$data,"id = ".$data['id']);
   }
   else{
    die(json_encode(
        array(
           
            'status'=> '0',
            'msg' => 'Không thế sửa khi đã được duyệt'
        )
       ));
   }
    
   
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