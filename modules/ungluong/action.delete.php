<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_ungluong", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
	$total = $result->num_rows();
    if($total == 1){
        if($rs['active'] == 0){
            $oClass->delete("php_ungluong","`id`=".$id);
        }
        else{
            die(json_encode(
                array(
                   
                    'status'=> '0',
                    'msg' => 'Không thế xóa khi đã được duyệt'
                )
               ));
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