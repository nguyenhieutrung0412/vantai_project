<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $id = $oClass->lastid("php_phongban");
   if($id != null)
   {
    $id_new = $id + 1;
   }
   else{
    $id_new = 0;
   
   }
   
   $data = array(
    'id' => $id_new,
    'chuc_vu'=>htmlspecialchars(trim($_REQUEST['name'])),
   
   );
   $result = $oContent->view_table("php_phongban", "`chuc_vu`='".$data['chuc_vu']."' LIMIT 1");
   $total = $result->num_rows();
    if($total == 0){
        $oClass->insert("php_phongban",$data);
   
        die(json_encode(
         array(
          
             'status'=> '1',
             'msg' => 'Thêm thành công'
         )
        ));
    }else{
        die(json_encode(array(
            'status' => '0',
            'msg' => 'Trùng tên phòng ban!!'
        )));
    }
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;