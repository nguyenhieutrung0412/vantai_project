<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
    $trongluonghang = str_replace(",", "", htmlspecialchars(trim($_REQUEST['trongluong_hanghoa'])));
    //xử lý thời gian 
    $thoigian = explode("/",htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])));
    $data = array(
        'id_donhangroi' => 0,
        'id_khachhang' => htmlspecialchars(trim($_REQUEST['id_khachhang'])),
        'sdt_nguoiguikhac' => htmlspecialchars(trim($_REQUEST['sdt_nguoiguikhac'])),
        'loaihang' => htmlspecialchars(trim($_REQUEST['loaihang'])),
        'vat' => htmlspecialchars(trim($_REQUEST['vat'])),
        'trongluong_hanghoa' => $trongluonghang,
        'khoi_hanghoa' => htmlspecialchars(trim($_REQUEST['khoi_hanghoa'])),
        'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
        'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_nhanhang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_nhanhang'])),
        'thoigian_giaohang' => htmlspecialchars(trim($_REQUEST['thoigian_giaohang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
        'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
        'hinhthucthanhtoan' => htmlspecialchars(trim($_REQUEST['thanhtoan_select'])),
        'phuongthucthanhtoan' => htmlspecialchars(trim($_REQUEST['phuongthuc_select'])),
        'phivanchuyen' => $phivanchuyen,
        'ghichu' => htmlspecialchars(trim($_REQUEST['ghichu'])),
    
        'tinhtrangdon' => 0,
        'thang' => $thoigian[1],
        'nam' => $thoigian[2],
        'tuyenduong_giaohang' => htmlspecialchars(trim($_REQUEST['tuyenduong_giaohang'])),
    );
    if (isset($_REQUEST['diachi_nhanhang'])) {

        $data['diachi_nhanhang'] = htmlspecialchars(trim($_REQUEST['diachi_nhanhang']));
    } elseif (isset($_REQUEST['khonhan_select'])) {

        $result = $oContent->view_table("php_kho", "id=" . $_POST['khonhan_select']);
        $rs = $result->fetch();

        $data['diachi_nhanhang'] = $rs['diachi_kho'];
        $data['kho_guihang'] = $rs['id'];
    }

    //xử lý địa chỉ giao
    if (isset($_REQUEST['diachi_giaohang'])) {

        $data['diachi_giaohang'] = htmlspecialchars(trim($_REQUEST['diachi_giaohang']));
    } elseif (isset($_REQUEST['khogiao_select'])) {
        $result = $oContent->view_table("php_kho", "id=" . $_POST['khogiao_select']);
        $rs = $result->fetch();
        $data['diachi_giaohang'] = htmlspecialchars(trim($rs['diachi_kho']));
        $data['kho_nhanhang'] = $rs['id'];
    }

    //xử lý in phiếu thu tiền mặt 
    if ($_REQUEST['phuongthuc_select'] == 'thanhtoantienmat') {
        $result_kh = $oContent->view_table("php_khachhang", "id=" . $data['id_khachhang']);
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

    //xử lý cộng dồn phí vận chuyển đơn hàng tổng
    $result_donhang = $oContent->view_table("php_donhangroi", "id=" . $data['id_donhangroi']);
    $rs_donhang = $result_donhang->fetch();
    $data2['tong_phivanchuyen'] = $rs_donhang['tong_phivanchuyen'] + $data['phivanchuyen'];

    $oClass->update("php_donhangroi", $data2, "id =" . $data['id_donhangroi']);





    //end xử lý in phiếu thu 

    $oClass->insert("php_donhangroi_s", $data);
    $lastid = $model->db->last_insetid("php_donhangroi_s");
    $oClass->upload_images('php_donhangroi',$lastid,$chatluong_hinhupload);
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
