<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_phongban", "`id`=".$id." LIMIT 1");
	$total = $result->num_rows();
    if($total == 1){
        if($id != 0 && $id != 1 && $id != 2 && $id != 3 && $id != 4 && $id != 5 && $id != 6 ){
            $oClass->delete("php_phongban","`id`=".$id);
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
                    'msg' => '(1): Không được xóa phòng ban này'
                )
               ));
        }
     
       
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