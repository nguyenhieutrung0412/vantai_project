<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_menu", "`id`=".$id." LIMIT 1");
	$total = $result->num_rows();
    if($total == 1){

        if($_SESSION['chucvu_id'] == 0){
        $oClass->delete("php_menu","`id`=".$id);
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