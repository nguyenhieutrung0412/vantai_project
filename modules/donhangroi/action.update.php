<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thoigian = explode("/",htmlspecialchars(trim($_REQUEST['thoigian_giaohang'])));
    $luong_chuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['luong_chuyen'])));
      //xử lý lấy tháng năm của ngày đổ dầu
  $thoigiangiaohang = explode("/",$_REQUEST['thoigian_giaohang']);
  if($thoigiangiaohang[1] > 0 && $thoigiangiaohang[1] < 10)
  {
      $thoigiangiaohang[1] = '0'.$thoigiangiaohang[1];
  }
  //xử lý lưu dữ liệu theo giờ quốc tế
  $gio_quocte = $thoigiangiaohang[2].'-'.$thoigiangiaohang[1].'-'.$thoigiangiaohang[0];
//end 
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),

       
        'thoigian_giaohang' =>   $gio_quocte . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'luong_chuyen' => $luong_chuyen,
        'time_donhang' =>  $thoigian[2].'-'.$thoigian[1].'-'.$thoigian[0]

    );

    $oClass->update("php_donhangroi", $data, "id=" . $data['id']);

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Update thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Update thất bại'
    )));
}
exit;
