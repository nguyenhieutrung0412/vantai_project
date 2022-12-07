<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_nhansu", "`id`=".$id." LIMIT 1");
    $rs = $result->fetch();
	$total = $result->num_rows();
    if($total == 1){
        if($rs['position_id'] == 0){
            die(json_encode(
                array(
                    
                    'status'=> '0',
                    'msg' => 'Không thể xóa'
                )
               ));
        }
        else{
            $oClass->delete("php_nhansu","`id`=".$id);
        }
        die(json_encode(
            array(
                
                'status'=> '1',
                'msg' => 'Xóa thành công'
            )
           ));
    }
    else{
        die(json_encode(
            array(
                
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