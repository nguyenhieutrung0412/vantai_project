<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name_menu'=>htmlspecialchars(trim($_REQUEST['name_menu'])),

   );
   if($_SESSION['chucvu_id'] == 0){
    $oClass->update("php_menu",$data,"id=".$data['id']);
   }
   else{
    die(json_encode(
        array(
        
            'status'=> '0',
            'msg' => 'Xin lỗi bạn đéo có quyền,OKE :))'
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