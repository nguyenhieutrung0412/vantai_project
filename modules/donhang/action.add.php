<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['loai_hang_select'] == 1) {

        $data = array(
            'id_khachhang' => htmlspecialchars(trim($_REQUEST['name_khachhang'])),
            'loaihang' => htmlspecialchars(trim($_REQUEST['loaihang'])),
            'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
            'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])),

            'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
            'cmnd_nguoinhan' => htmlspecialchars(trim($_REQUEST['cmnd-nguoinhan'])),
            'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),

            'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
            'hinhthucthanhtoan' => htmlspecialchars(trim($_REQUEST['thanhtoan_select'])),

            'active' => 0
        );
        if (isset($_REQUEST['phivanchuyen'])) {
            $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
            $data['phivanchuyen'] = $phivanchuyen;
        } elseif (isset($_REQUEST['phivanchuyen_select'])) {
            $result = $oContent->view_table("php_banggiacuoc_tuyen", "id=" . $_POST['phivanchuyen_select']);
            $rs = $result->fetch();
            $data['phivanchuyen'] = htmlspecialchars(trim($rs['so_tien']));
        }

        //xử lý in phiếu thu tiền mặt 
        if ($_REQUEST['thanhtoan_select'] == 'thanhtoantienmat') {
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
        } elseif ($_REQUEST['thanhtoan_select'] == 'thanhtoancongno') {
            $data_congno = array(
                'id_khachhang' => $data['id_khachhang'],
                'so_tien' => $data['phivanchuyen'],
                'thang' => date("m"),
                'nam' => date("Y"),
                'active' => 0
            );
            $oClass->insert("php_congnokhachhang", $data_congno);
        }


        //end xử lý in phiếu thu 

        $oClass->insert("php_donhangtrongoi", $data);
        die(json_encode(
            array(

                'status' => '1',
                'msg' => 'Thêm thành công'

            )
        ));
    } else if ($_POST['loai_hang_select'] == 2) {
    }
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
