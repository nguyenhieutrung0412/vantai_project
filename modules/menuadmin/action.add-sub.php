<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->lastid("php_menu_phanquyen");
    if($id != null)
    {
     $id_new = $id + 1;
    }
    else{
     $id_new = 1;
    
    }
   $data = array(
    'id' => $id_new,
    'name'=>htmlspecialchars(trim($_REQUEST['name_menu'])),
    
    'id_menu_cha'=> htmlspecialchars(trim($_REQUEST['id_menucha']))
   );

   if($_SESSION['chucvu_id'] == 0){
        $oClass->insert("php_menu_phanquyen",$data);
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