<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

    
    
    $result = $oContent->view_table("php_luongtaixe", "active = 0 ");
    
    if($_SESSION['chucvu_id'] == 0 ||$_SESSION['chucvu'] == 'Giám đốc')
    {
        while($rs = $result->fetch())
        {
            $oClass->updateActive("php_luongtaixe",1,"`php_luongtaixe`.`id` = ".$rs['id']  );
        }     
    }
    else{
        die(json_encode(
            array(
               
                'status'=> '0',
                'msg' => 'Bạn không được quyền xét duyệt'
            )
           ));
           exit;
    }
    die(json_encode(
        array(
           
            'status'=> '1',
            'msg' => 'Xét duyệt thành công'
        )
       ));
       exit;
}

die(json_encode(
    array(
     
        'status'=> '0',
        'msg' => 'Lỗi!!!'
    )
   ));
exit;