<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $link ='/baocaodoanhthunam/?';
   
   
    if($_POST['nam_search'] != 0){
        $link .= '&nam='.htmlentities($_POST['nam_search']);
    }
    

    die(json_encode(
        array(
            
            'status'=> '1',
            'link'=> $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
       ));

}
