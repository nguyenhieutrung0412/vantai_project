<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_khachhang", "`id`=".$id." LIMIT 1");
	$total = $result->num_rows();
    if($total == 1){
        $oClass->delete("php_khachhang","`id`=".$id);
        die(json_encode(
            array(
                'rs' => $rs,
                'status'=> '1',
                'msg' => 'Xóa thành công'
            )
           ));
    }
    else{
        die(json_encode(
            array(
                'rs' => $rs,
                'status'=> '0',
                'msg' => 'Không tìm thấy id'
            )
           ));
    }
   
   
    
   
}
die(json_encode(
    array(
        
        'status'=> '0',
        'msg' => 'Xóa thất bại'
    )
   ));