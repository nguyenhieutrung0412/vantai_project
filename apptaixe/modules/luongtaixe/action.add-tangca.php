<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();

    $date = explode(',',$_REQUEST['date_tangca']);
    for($i = 0; $i < count($date);$i++)
    {
        $date_2 = explode('/',$date[$i]);
        $data2 = array(
            'user_id' => $rs['user_id'],
            'ngay'=> $date_2[0],
            'thang'=> $date_2[1],
            'nam'=> $date_2[2],
            'sotien'=> $oClass->DoiSoTien(htmlspecialchars($_REQUEST['tang_ca'])),
            'noidung_tangca'=> htmlspecialchars($_REQUEST['lydo_tangca']),

        );
        $oClass->insert("php_tangca",$data2);
    }

                $data = array(
                'id'=>$oClass->id_decode($_REQUEST['id']),
                'tang_ca' =>$rs['tang_ca'] + $oClass->DoiSoTien(htmlspecialchars($_REQUEST['tang_ca'])),

                'tong_luong' => htmlspecialchars($rs['tong_luong'] + $oClass->DoiSoTien($_REQUEST['tang_ca']))
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