<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $result = $oContent->view_table("php_donhangtrongoi", "`id`= " . $oClass->id_decode($_REQUEST['id']) . " LIMIT 1");
    $rs = $result->fetch();
  
   
    if (isset($_POST['checkbox_xuatben']) && $_POST['checkbox_xuatben'] == '1') {
        $count = 1;
        $date = "date_xuatben";
    } elseif(isset($_POST['checkbox_danggiao']) && $_POST['checkbox_danggiao'] == '1'){
        $count = 2;
        $date = "date_danggiao";
    }
    elseif(isset($_POST['checkbox_giaohangtoidiachi']) && $_POST['checkbox_giaohangtoidiachi'] == '1'){
        $count = 3;
        $date = "date_giaohangtoidiachi";
    }
    elseif(isset($_POST['checkbox_hoanthanh']) && $_POST['checkbox_hoanthanh'] == '1'){
        $count = 4;
         $date = "date_hoanthanh_timeline";
    }
    if($rs['tinhtrangdon'] > $count)
    {
        $count = $rs['tinhtrangdon'];
    }
    
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),

        
        'tinhtrangdon' => $count,
        $date => date("d/m/yy G:i:s", time())

    );

    //xử lý tên type của img
    if($_POST['name_tinhtrang'] == 1 )
    {
        $_name_img = '_xuatben';
    }
    elseif($_POST['name_tinhtrang'] == 2 )
    {
        $_name_img = '_danggiao';
    }
    elseif($_POST['name_tinhtrang'] == 3 )
    {
        $_name_img = '_giaohangtoidiachi';
    }
    elseif($_POST['name_tinhtrang'] == 4 )
    {
        $_name_img = '_hoanthanh';
    }
    

    $chatluong_hinhupload = $model->db->query("SELECT * FROM php_cauhinh LIMIT 1");
    $cauhinh = $chatluong_hinhupload->fetch();
    if($rs['id_taixe'] == 0 || $rs['id_doixe'] == 0  )
    {
        die(json_encode(
            array(
        
                'status' => '0',
                'msg' => 'Chưa điều tài xế hoặc phụ xe hoặc xe!!!'
            )
        ));
        exit;
    }
    if(($count -  $rs['tinhtrangdon']) <= 1 )
    {
        $oClass->update("php_donhangtrongoi", $data, "id=" . $data['id']);
        $oClass->upload_images('php_donhangtrongoi'.$_name_img, $data['id'], $cauhinh['chatluong_hinhupload']);
    }
    else{
        die(json_encode(
            array(
        
                'status' => '0',
                'msg' => 'Bạn phải hoàn thành từng bước!!!'
            )
        ));
        exit;
    }
       

        die(json_encode(
            array(
                'id' => $update,
                'status' => '1',
                'msg' => 'Update thành công'
            )
        ));
   
   
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Update thất bại'
    )
));
exit;
