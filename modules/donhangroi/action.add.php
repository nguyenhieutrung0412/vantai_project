<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 //xử lý thời gian 
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
        'thoigian_giaohang' =>  $gio_quocte . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'tuyenduong_giaohang' => htmlspecialchars(trim($_REQUEST['tuyenduong_giaohang'])),
        'tong_phivanchuyen' => 0,
        'luong_chuyen' => $luong_chuyen,
        'ngay' => $thoigian[0],
        'thang' => $thoigian[1],
        'nam' => $thoigian[2],

        'tinhtrangdon' => 0,
        'active' => 0,
        'time_donhang' =>  $thoigian[2].'-'.$thoigian[1].'-'.$thoigian[0],
        'nhan_lenh' => 0,
    );
    $so_don = htmlspecialchars(trim($_REQUEST['so_don_tao']));
    for($i = 0;$i < $so_don;$i++)
    {
        $oClass->insert('php_donhangroi', $data);
    }
 
    die(json_encode(array(
        'status' => '1',
        'msg' => 'Thêm thành công'
    )));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
