<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(htmlspecialchars(trim($_REQUEST['hanmucchi'])) == '')
    {
        $num = 0;
    }
    else{
        $num = htmlspecialchars(trim($_REQUEST['hanmucchi']));
    }
   $data = array(
    'id' => $oClass->id_decode($_REQUEST['id']),
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['name_loaichi'])),
    'hanmucchi'=>$num,
   );
    $oClass->update("php_loaichi",$data,"id=".$data['id']);
    
   die(json_encode(
    array(
        'status'=> '1',
        'msg' => 'Update thành công'
    )
   ));
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
 exit;