<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name'=>htmlspecialchars(trim($_REQUEST['name_menu-sub'])),
    'id_menu_cha'=>htmlspecialchars(trim($_REQUEST['id_menucha'])),
   );
   if($_SESSION['chucvu_id'] == 0){
    $oClass->update("php_menu_phanquyen",$data,"id=".$data['id']);

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