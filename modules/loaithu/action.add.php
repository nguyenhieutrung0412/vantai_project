<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(htmlspecialchars(trim($_REQUEST['hanmucthu'])) == '')
    {
        $num = 0;
    }
    else{
        $num = htmlspecialchars(trim($_REQUEST['hanmucthu']));
    }
   $data = array(
    'loaithu'=>htmlspecialchars(trim($_REQUEST['name_loaithu'])),
    'hanmucthu'=> $num,
    'baocao'=> 1,
    'active'=> 1
   );
 

  
   
        $oClass->insert("php_loaithu",$data);
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