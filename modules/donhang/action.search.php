<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = '/donhang/?';
   

    if ($_POST['madonhang'] != '') {
        $link .= 'code='. htmlspecialchars($_POST['madonhang']);
        //$arr_iddonhang = explode(",",$_POST['madonhang']);
        // for($i = 0;count($arr_iddonhang);$i++)
        // {
        //     $link .= $arr_iddonhang[$i];
        // }
      
    }
     if ($_POST['sdt_search'] != '') {
        $link .= '&sdt_search='. htmlspecialchars($_POST['sdt_search']);
     
      
    }
    // if ($_POST['thang_search'] != 0) {
    //     $link .= '&thang=' . htmlentities($_POST['thang_search']);
    // }
    // if ($_POST['nam_search'] != 0) {
    //     $link .= '&nam=' . htmlentities($_POST['nam_search']);
    // }


    die(json_encode(
        array(

            'status' => '1',
            'link' => $link,
            'msg' => 'Nhận dữ liệu thành công'
        )
    ));
}
