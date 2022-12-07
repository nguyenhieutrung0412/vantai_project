<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();

    $date = explode(',',$_REQUEST['date_ngaynghi']);
        for($i = 0; $i < count($date);$i++) {
            $date_2 = explode('/',$date[$i]);
            $data = array(
                'user_id' => $rs['user_id'],
                'ngay' => trim($date_2[0]),
                'thang' =>trim($date_2[1]),
                'nam' => trim($date_2[2]),
                'tinhtrang' => htmlspecialchars($_REQUEST['tinhtrang']),
            );
            $oClass->insert("php_ngaynghi",$data);



        }
    //xử lý trừ tiền
    $result2 = $oContent->view_table("php_ngaynghi", "user_id=".$rs['user_id']." AND thang=".$rs['thang']." AND nam = ".$rs['nam']);
    $tru_luong_ngay_nghi = 0;
        while ($rs2 = $result2->fetch()){


        if($rs2['tinhtrang'] == 2)
        {
            $tru_luong_ngay_nghi += ($rs['luong_thoa_thuan'] / $rs['ngay_cong']) * 1;
        }
        else if ($rs2['tinhtrang'] == 4)
        {
            $tru_luong_ngay_nghi += ($rs['luong_thoa_thuan'] / $rs['ngay_cong']) * 0.5;
        }
    }
    $update_luong = $rs['tong_luong'];

    if($tru_luong_ngay_nghi != 0)
    {
        $update_luong = $rs['tong_luong'] + $rs['tong_so_ngay_nghi_khong_phep'];
    }

    $data2 = array(
        'tong_luong' =>  $update_luong - $tru_luong_ngay_nghi,
        'tong_so_ngay_nghi_khong_phep'=>  $tru_luong_ngay_nghi
    );
    $oClass->update("php_luongnhansu",$data2,"id = ".$rs['id']);

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