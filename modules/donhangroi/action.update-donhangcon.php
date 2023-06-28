<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));

    //xử lý phí vận chuyển để update phí tổng
    $result_donhangroi_s = $oContent->view_table("php_donhangroi_s", "id=" . $oClass->id_decode($_REQUEST['id']));
    $rs_donhangroi_s = $result_donhangroi_s->fetch();
    $result_donhangroi = $oContent->view_table("php_donhangroi", "id=" . $rs_donhangroi_s['id_donhangroi']);
    $rs_donhangroi = $result_donhangroi->fetch();
    //xử lý trừ tiền phí cũ của đơn hàng được update
    $phivanchuyen_prev =  $rs_donhangroi['tong_phivanchuyen'] - $rs_donhangroi_s['phivanchuyen'];


    $trongluonghang = str_replace(",", "", htmlspecialchars(trim($_REQUEST['trongluong_hanghoa'])));
    $data = array(
        'id' => $oClass->id_decode($_REQUEST['id']),
        'loaihang' => htmlspecialchars(trim($_REQUEST['loaihang'])),
        
        'trongluong_hanghoa' => $trongluonghang,
        'khoi_hanghoa' => htmlspecialchars(trim($_REQUEST['khoi_hanghoa'])),
        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),

        'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
        'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_nhanhang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_nhanhang'])),
        'thoigian_giaohang' => htmlspecialchars(trim($_REQUEST['thoigian_giaohang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),

        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'hinhthucthanhtoan' => htmlspecialchars(trim($_REQUEST['thanhtoan_select'])),
        'phuongthucthanhtoan' => htmlspecialchars(trim($_REQUEST['phuongthuc_select'])),
        'phivanchuyen' => $phivanchuyen,
        'vat' => htmlspecialchars(trim($_REQUEST['vat'])),

    );
    $data2 = array(
        
        
        'tong_phivanchuyen' => $phivanchuyen_prev + $phivanchuyen,

    );
    //xử lý in phiếu thu tiền mặt 
    if ($_REQUEST['phuongthuc_select'] == 'thanhtoantienmat') {
        $result_kh = $oContent->view_table("php_khachhang", "id=" . $rs_donhangroi_s['id_khachhang']);
        $rs_kh = $result_kh->fetch();

        $data_phieuthu = array(
            'loai_thu' => 3,
            'name_nguoithu' => $rs_kh['name_kh'],
            'diachi_nguoithu' => $rs_kh['address_kh'],
            'phone_nguoithu' => $rs_kh['phone_kh'],
            'ngaytao_phieuthu' => date("Y-m-d"),
            'thang' => date("m"),
            'nam' => date("Y"),
            'sotien_thu' => $data['phivanchuyen'],
            'sotien_bangchu' => $oClass->jam_read_num_forvietnamese($data['phivanchuyen']),
            'noidung_thu' => 'Thu tiền phí vận chuyển',
            'tennguoitao_thu' => $_SESSION['name'],
            'active' => 0

        );
        $oClass->insert("php_phieuthu", $data_phieuthu);
    } elseif ($_REQUEST['phuongthuc_select'] == 'thanhtoancongno') {
        $congno = $oContent->view_table("php_congnohangroi", " id_khachhang = ".$data['id_khachhang']." AND `thang`=" . $thoigian[1] . " AND `nam` =". $thoigian[2]  ."  LIMIT 1");
        $count_congno = $congno->num_rows();
        $rs_congno = $congno->fetch();

        $data_congno = array(
            'id_khachhang' => $data['id_khachhang'],
            'so_tien' => $rs_congno['so_tien'] +  $data['phivanchuyen'],
            'tong_tien' => $rs_congno['tong_tien'] +  $data['phivanchuyen'],
            'tong_thanhtoan' => $rs_congno['tong_thanhtoan'] +  $data['phivanchuyen'],
            'thang' => $thoigian[1],
            'nam' => $thoigian[2],
            'active' => 0
        );
        if($count_congno == 1)
        {
            $oClass->update("php_congnohangroi", $data_congno, "id=" . $rs_congno['id']);
        }
        else{
            $oClass->insert("php_congnohangroi", $data_congno);
        }
    }


    //end xử lý in phiếu thu 
    $oClass->update("php_donhangroi", $data2, "id =" . $rs_donhangroi['id']);
    $oClass->update("php_donhangroi_s", $data, "id=" . $data['id']);

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
