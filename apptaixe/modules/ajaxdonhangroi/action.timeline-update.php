<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $result = $oContent->view_table("php_donhangroi", "`id`= " . $oClass->id_decode($_REQUEST['id']) . " LIMIT 1");
    $rs = $result->fetch();
    
   
  
    if(isset($_POST['checkbox_danggiaohang']) && $_POST['checkbox_danggiaohang'] == '1'){
        $count = 1;
        $date = "date_danggiao";
    }
    elseif(isset($_POST['checkbox_hoanthanh']) && $_POST['checkbox_hoanthanh'] == '1'){
        $count = 2;
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
        $_name_img = '_danggiaohang';
    }
    elseif($_POST['name_tinhtrang'] == 2 )
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
                'msg' => 'Chưa điều tài xế hoặc xe!!!'
            )
        ));
        exit;
    }
    
    if(($count -  $rs['tinhtrangdon']) <= 1 )
    {
        if($count !=2)
        {
            $oClass->update("php_donhangroi", $data, "id=" . $data['id']);
            $oClass->upload_images('php_donhangroi'.$_name_img, $data['id'], $cauhinh['chatluong_hinhupload']);
        }
        else{
            $donhangcon = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = ".$rs['id']." AND tinhtrangdon = 0 LIMIT 1");
            $count_donhangcon = $donhangcon->num_rows();
            if ($count_donhangcon > 0){
                die(json_encode(
                array(
        
                    'status' => '0',
                    'msg' => 'Bạn chưa hoàn thành tất cả đơn hàng con!!!'
                )
                ));
                exit;
            }
            $oClass->update("php_donhangroi", $data, "id=" . $data['id']);
            $oClass->upload_images('php_donhangroi'.$_name_img, $data['id'], $cauhinh['chatluong_hinhupload']);
        }
        

        die(json_encode(
            array(
                'id' => $update,
                'status' => '1',
                'msg' => 'Update thành công'
            )
        ));
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
   
}
die(json_encode(
    array(

        'status' => '0',
        'msg' => 'Update thất bại'
    )
));
exit;
