<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['id'] > 0)
    {
            $donhang = $oContent->view_table("php_donhangroi_s","id = ".$oClass->id_decode($_POST['id']));
            $rs_donhang = $donhang->fetch(); 
   // $phivanchuyen = $oClass->DoiSoTien($_REQUEST['phivanchuyen'])));
   // $trongluonghang = str_replace(",", "", $_REQUEST['trongluong_hanghoa'])));
    //xử lý thời gian 
   // $thoigian = explode("/",$_REQUEST['thoigian_nhanhang'])));
    $data = array(
        'id_donhangroi' => $rs_donhang['id_donhangroi'],
        'id_khachhang' => $rs_donhang['id_khachhang'],
        'sdt_nguoiguikhac' => $rs_donhang['sdt_nguoiguikhac'],
        'loaihang' => $rs_donhang['loaihang'],
        'sdt_nguoigui' => $rs_donhang['sdt_nguoigui'],
       
        'trongluong_hanghoa' => $rs_donhang['trongluong_hanghoa'],
        'khoi_hanghoa' => $rs_donhang['khoi_hanghoa'],
        'ten_nguoinhan' => $rs_donhang['ten_nguoinhan'],
        'diachi_nhanhang' => $rs_donhang['diachi_nhanhang'],
        'diachi_giaohang' => $rs_donhang['diachi_giaohang'],
        'thoigian_nhanhang' => $rs_donhang['thoigian_nhanhang'] ,
        'thoigian_giaohang' => $rs_donhang['thoigian_giaohang'] ,
        'phone_nguoinhan' => $rs_donhang['phone_nguoinhan'],
        'hinhthucthanhtoan' => $rs_donhang['hinhthucthanhtoan'],
        'phuongthucthanhtoan' => $rs_donhang['phuongthucthanhtoan'],
        'phivanchuyen' => $rs_donhang['phivanchuyen'],
        'vat' => $rs_donhang['vat'],
        'ghichu' => $rs_donhang['ghichu'],
        'kho_guihang' => $rs_donhang['kho_guihang'],
        'kho_nhanhang' => $rs_donhang['kho_nhanhang'],
        
        'tinhtrangdon' => 0,
        'thang' => date('m'),
        'nam' => date('Y'),
    );
    // if (isset($_REQUEST['diachi_nhanhang'])) {

    //     $data['diachi_nhanhang'] = $_REQUEST['diachi_nhanhang'];
    // } elseif (isset($_REQUEST['khonhan_select'])) {

    //     $result = $oContent->view_table("php_kho", "id=" . $_POST['khonhan_select']);
    //     $rs = $result->fetch();

    //     $data['diachi_nhanhang'] = $rs['diachi_kho'];
    //     $data['kho_guihang'] = $rs['id'];
    // }

    // //xử lý địa chỉ giao
    // if (isset($_REQUEST['diachi_giaohang'])) {

    //     $data['diachi_giaohang'] = $_REQUEST['diachi_giaohang'];
    // } elseif (isset($_REQUEST['khogiao_select'])) {
    //     $result = $oContent->view_table("php_kho", "id=" . $_POST['khogiao_select']);
    //     $rs = $result->fetch();
    //     $data['diachi_giaohang'] = $rs['diachi_kho'];
    //     $data['kho_nhanhang'] = $rs['id'];
    // }

    //xử lý in phiếu thu tiền mặt 
    if ($rs_donhang['phuongthucthanhtoan'] == 'thanhtoantienmat') {
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
    } elseif ($_REQUEST['phuongthucthanhtoan'] == 'thanhtoancongno') {
        $congno = $oContent->view_table("php_congnohangroi", " id_khachhang = ".$data['id_khachhang']." AND `thang`=" . $data['thang'] . " AND `nam` =". $data['nam']  ."  LIMIT 1");
        $count_congno = $congno->num_rows();
        $rs_congno = $congno->fetch();

        $data_congno = array(
            'id_khachhang' => $data['id_khachhang'],
            'so_tien' => $rs_congno['so_tien'] +  $data['phivanchuyen'],
            'tong_tien' => $rs_congno['tong_tien'] +  $data['phivanchuyen'],
            'tong_thanhtoan' => $rs_congno['tong_thanhtoan'] +  $data['phivanchuyen'],
            'thang' => $data['thang'],
            'nam' => $data['nam'],
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
            'msg' => 'Sao chép thành công'

        )
    ));
}
else{
    die(json_encode(array(
        'status' => '0',
        'msg' => 'sao chép thất bại'
    )));
}
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
