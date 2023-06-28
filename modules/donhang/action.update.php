<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $don_gia = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
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
        'trongluong_hanghoa' => $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['trongluong_hanghoa']))),
        'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
        
        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
        'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_nhanhang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_nhanhang'])),
        'thoigian_giaohang' => $gio_quocte . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),
        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'hinhthucthanhtoan' => htmlspecialchars(trim($_REQUEST['thanhtoan_select'])),
        'ten_tuyen' => htmlspecialchars(trim($_REQUEST['ten_tuyen'])),
        'don_gia' => $don_gia,
        'luong_chuyen' => $luong_chuyen,

    );
  
     //xử lý thời gian 
     $thoigian = explode("/",htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])));
    $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
    $result_donhang = $oContent->view_table("php_donhangtrongoi", "id=" . $data['id']);
    $rs_donhang = $result_donhang->fetch();
   
    //xử lý in phiếu thu tiền mặt 
    if ($_REQUEST['thanhtoan_select'] == 'thanhtoantienmat') {
        $result_kh = $oContent->view_table("php_khachhang", "id=" . $rs_donhang['id_khachhang']);
        $rs_kh = $result_kh->fetch();

        $data_phieuthu = array(
            'loai_thu' => 3,
            'name_nguoithu' => $rs_kh['name_kh'],
            'diachi_nguoithu' => $rs_kh['address_kh'],
            'phone_nguoithu' => $rs_kh['phone_kh'],
            'ngaytao_phieuthu' => date("Y-m-d"),
            'thang' => $thoigian[1],
            'nam' => $thoigian[2],
            'sotien_thu' => $data['phivanchuyen'],
            'sotien_bangchu' => $oClass->jam_read_num_forvietnamese($data['phivanchuyen']),
            'noidung_thu' => 'Thu tiền phí vận chuyển',
            'tennguoitao_thu' => $_SESSION['name'],

            'active' => 0

        );
        $oClass->insert("php_phieuthu", $data_phieuthu);
    } elseif ($_REQUEST['thanhtoan_select'] == 'thanhtoancongno') {
        $congno = $oContent->view_table("php_congnokhachhang", " id_khachhang = ".$rs_donhang['id_khachhang']." AND `thang`=" . date("m") . " AND `nam` =". date("Y")  ."  LIMIT 1");
        $count_congno = $congno->num_rows();
        $rs_congno = $congno->fetch();
        $data_congno = array(
            'id_khachhang' => $rs_donhang['id_khachhang'],
            'so_tien' => $rs_congno['so_tien'] +  $data['phivanchuyen'],
            'tong_tien' => $rs_congno['tong_tien'] +  $data['phivanchuyen'],
            'tong_thanhtoan' => $rs_congno['tong_thanhtoan'] +  $data['phivanchuyen'],
            'thang' => $thoigian[1],
            'nam' => $thoigian[2],
            'active' => 0
        );
        if($count_congno == 1)
        {
            $oClass->update("php_congnokhachhang", $data_congno, "id=" . $rs_congno['id']);
        }
        else{
            $oClass->insert("php_congnokhachhang", $data_congno);
        }
    }


//end xử lý in phiếu thu 
    $oClass->update("php_donhangtrongoi", $data, "id=" . $data['id']);

    die(json_encode(
        array(

            'status' => '1',
            'msg' => 'Thêm thành công'
        )
    ));
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
