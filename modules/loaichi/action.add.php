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
    'loai_chi'=>htmlspecialchars(trim($_REQUEST['name_loaichi'])),
    'hanmucchi'=>$num,
    'baocao'=> 1,
    'phi_van_tai'=> 0,
    'active'=> 1
   );
 

  
   
        $oClass->insert("php_loaichi",$data);
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