<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'name'=>htmlspecialchars(trim($_REQUEST['name'])),
    'dateofbirth'=>htmlspecialchars(trim($_REQUEST['dateofbirth'])),
    'phone'=>htmlspecialchars(trim($_REQUEST['phone'])),
    'pwd'=>htmlspecialchars(md5(trim($_REQUEST['pwd2']))),
    'pwd2'=>htmlspecialchars(trim($_REQUEST['pwd2'])),
    
   );
 
    $result = $oContent->view_table("php_nhansu", "`phone`=".$data['phone']."  LIMIT 1");
    $total = $result->num_rows();
     if($total == 0){
        
             
        $oClass->update("php_nhansu",$data,"id=".$data['id']);
    
             die(json_encode(
              array(
                  'status'=> '1',
                  'msg' => 'Cập nhật thành công'
              )
             ));
        
    
 
        
     }else{
         die(json_encode(array(
             'status' => '0',
             'msg' => 'Không thể cập nhật dữ liệu (Không thể tạo admin hoặc bị trùng số điện thoại)'
         )));
     }
   
   die(json_encode(
    array(
       
        'status'=> '1',
        'msg' => 'Cập nhật thành công'
    )
   ));

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Cập nhật thất bại'
    )));
   
}
 exit;