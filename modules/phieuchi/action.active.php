<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_phieuchi", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    if($_SESSION['chucvu_id'] == 0 ||$_SESSION['chucvu'] == 'Giám đốc' ||$_SESSION['chucvu'] == 'Kế toán')
    {

    
        if($rs['active'] == 0){
            $oClass->updateActive("php_phieuchi",1 .' , ngaygio_xetduyet =  "'.Date("Y-m-d h:i:s").'"' ,"`php_phieuchi`.`id` = ".$id  );
        }
        else if($rs['active'] == 1){
            $update = $oClass->updateActive("php_phieuchi",0,"`id` = ".$id  );
        }
    }
    else{
        die(json_encode(
            array(
               
                'status'=> '0',
                'msg' => 'Bạn không được quyền xét duyệt'
            )
           ));
    }
    die(json_encode(
        array(
           
            'status'=> '1',
            'msg' => 'Xét duyệt thành công'
        )
       ));
}
die(json_encode(
    array(
        
        'status'=> '0',
        'msg' => 'Xét duyệt thất bại'
    )
   ));
exit;