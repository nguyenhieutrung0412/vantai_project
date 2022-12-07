<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_ungluong", "`id`= ".$id." LIMIT 1");
     $rs = $result->fetch();
    if($_SESSION['chucvu_id'] == 0 ||$_SESSION['chucvu'] == 'Giám đốc' )
    {
        if($rs['active'] == 0){
            $oClass->updateActive("php_ungluong",1 ,"id = ".$id  );
            $result2 = $oContent->view_table("php_luongnhansu", "`user_id`= ".$rs['user_id']." AND thang =".$rs['thang']." AND nam =".$rs['nam']." LIMIT 1");
            $rs2 = $result2->fetch();
            $data2 = array(
                    'tong_luong' => $rs2['tong_luong'] - $rs['so_tien_ung'],
                    'tong_ungluong'=> $rs2['tong_ungluong']+$rs['so_tien_ung']
                );
            $oClass->update("php_luongnhansu",$data2,"id = ".$rs2['id']);
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