<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
                $data = array(
                'id'=>$oClass->id_decode($_REQUEST['id']),
                'thuong_nong' =>$oClass->DoiSoTien(htmlspecialchars($_REQUEST['thuongnong'])),
                'lydo_thuongnong' =>htmlspecialchars($_REQUEST['lydo_thuongnong']),
                'tong_luong' => ($rs['tong_luong'] - $rs['thuong_nong']) + $oClass->DoiSoTien(htmlspecialchars($_REQUEST['thuongnong']))
                );
                $oClass->update("php_luongnhansu",$data,"id = ".$data['id']);
                
                   
    
        die(json_encode(
         array(
           
             'status'=> '1', 
             'msg' => 'Thêm thành công'
         )
        ));
   
   

}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
   
}
 exit;