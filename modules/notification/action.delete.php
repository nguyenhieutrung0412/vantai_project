<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    
    
    
    $id = $oClass->id_decode($_POST['id']);

	$notification = $oContent->view_table('php_notification','id = '.$id .' LIMIT 1');
   
    $total = $notification->num_rows();
    
    if($total == 1){
        //xóa tất cả file
        $result3 = $oContent->view_table("php_file", "`type_id`=".$id);
      
        while($rs3= $result3->fetch()){
         unlink('data/upload/files/'.$rs3['file_name']);
         $oClass->delete("php_file","type_id = '".$id."' AND type = 'php_notification' ");
        }
            $oClass->delete("php_notification","`id`=".$id);
        
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