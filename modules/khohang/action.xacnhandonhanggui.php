<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'tinhtrang_khogui'=>1,
   
   );
   
    $donhang = $oContent->view_table("php_donhangroi_s","id = ".$data['id']);
    $rs = $donhang->fetch();
    if($rs['tinhtrang_khonhan'] == 0)
    {
       
        die(json_encode(
            array(
                'status'=> '0',
                'msg' => 'Bên kho nhận chưa xác nhận nhận được hàng'
            )
           ));
    }
    else{
        $oClass->update("php_donhangroi_s",$data,"id=".$data['id']);
        die(json_encode(
            array(
                'status'=> '1',
                'msg' => 'Update thành công'
            )
           ));
    }

    
    
 
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
 exit;