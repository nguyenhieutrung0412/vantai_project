<?php
use LDAP\Result;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'chuc_vu'=>htmlspecialchars(trim($_REQUEST['name'])),
   );
    if($id != 0 && $id != 1 && $id != 2 && $id != 3 && $id != 4 && $id != 5 && $id != 6 ){
        $oClass->update("php_phongban",$data,"id=".$data['id']);
        die(json_encode(
            array(
               
                'status'=> '1',
                'msg' => 'Update thành công'
            )
        ));
    }
    else{
        die(json_encode(
            array(
                
                'status'=> '0',
                'msg' => '(1): Không được chỉnh sửa phòng ban này'
            )
        ));
    }
   
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;