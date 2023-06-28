<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['value'] == 0)
    {
        //xử lý lấy số liệu dầu trước khi đổ

    $dau = $oContent->view_table("php_theodoidau","msd_truockhido >= 0 ORDER BY msd_saukhido DESC LIMIT 1");
    $rs_dau = $dau->fetch();
    $value = $rs_dau['msd_saukhido'];
    //end
    }
    else{
        $value = 0; 
    }
   
    die(json_encode(
        array(
            
            'status'=> '1',
          
            'str'=>$value,
           
        )
       ));
}