<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //xử lý thời gian 
        $thoigian = explode("/",htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])));
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
            'id_khachhang' => htmlspecialchars(trim($_REQUEST['id_khachhang'])),
            'loaihang' => htmlspecialchars(trim($_REQUEST['loaihang'])),
            'soluong_hanghoa' => htmlspecialchars(trim($_REQUEST['soluong_hanghoa'])),
            'trongluong_hanghoa' => $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['trongluong_hanghoa']))),
            'diachi_nhanhang' => htmlspecialchars(trim($_REQUEST['diachi_nhanhang'])),
            
            'thoigian_nhanhang' => htmlspecialchars(trim($_REQUEST['thoigian_nhanhang'])) . ' ' . htmlspecialchars(trim($_REQUEST['gio_nhanhang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_nhanhang'])),
            'thoigian_giaohang' => $gio_quocte . ' ' . htmlspecialchars(trim($_REQUEST['gio_giaohang'])) . ':' . htmlspecialchars(trim($_REQUEST['phut_giaohang'])),
            'ten_nguoinhan' => htmlspecialchars(trim($_REQUEST['ten_nguoinhan'])),
           
            'diachi_giaohang' => htmlspecialchars(trim($_REQUEST['diachi_giaohang'])),
            'donvi_tinhphi' => htmlspecialchars(trim($_REQUEST['donvi_select'])),

            'phone_nguoinhan' => htmlspecialchars(trim($_REQUEST['phone_nguoinhan'])),
            'hinhthucthanhtoan' => htmlspecialchars(trim($_REQUEST['thanhtoan_select'])),
            'ghichu' => htmlspecialchars(trim($_REQUEST['ghichu'])),
            'active' => 0,
            'thang' => $thoigian[1],
            'nam' => $thoigian[2],
            'nhan_lenh' => 0,
        );
        //lấy sdt của khách hàng
        $result_kh = $oContent->view_table("php_khachhang", "id=" . $data['id_khachhang']);
        $rs_kh = $result_kh->fetch();
        $data['sdt_nguoigui'] = $rs_kh['phone_kh'];
        //end
       
        if (isset($_REQUEST['phivanchuyen'])) {
            $phivanchuyen = $oClass->DoiSoTien(htmlspecialchars(trim($_REQUEST['phivanchuyen'])));
            $data['don_gia'] = $phivanchuyen;
         
            $data['ten_tuyen'] = htmlspecialchars(trim($_REQUEST['ten_tuyen']));
            $data['luong_chuyen'] = htmlspecialchars(trim($_REQUEST['luong_chuyen']));
            $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
            
        
        } elseif (isset($_REQUEST['phivanchuyen_select'])) {
            $result = $oContent->view_table("php_banggiacuoc_tuyen", "id=" . $_POST['phivanchuyen_select']);
            $rs = $result->fetch();
            $data['don_gia'] = htmlspecialchars(trim($rs['so_tien']));
            $data['ten_tuyen'] = $rs['ten_tuyen'];
            $data['luong_chuyen'] = $rs['luong_chuyen'];
            $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
           
        
        }
        elseif (isset($_REQUEST['phivanchuyen_hopdong'])) {
            $result = $oContent->view_table("php_banggia_hopdong", "id=" . $_POST['phivanchuyen_hopdong']);
            $rs = $result->fetch();
            $data['don_gia'] = htmlspecialchars(trim($rs['don_gia']));
            $data['ten_tuyen'] = $rs['ten_tuyen'];
            $data['luong_chuyen'] = $rs['luong_chuyen'];
            $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
           
        
        }

        //xử lý in phiếu thu tiền mặt 
        if ($_REQUEST['thanhtoan_select'] == 'thanhtoantienmat') {
         

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
            $congno = $oContent->view_table("php_congnokhachhang", " id_khachhang = ".$data['id_khachhang']." AND `thang`=" . $thoigian[1] . " AND `nam` =". $thoigian[2]  ."  LIMIT 1");
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
                $oClass->update("php_congnokhachhang", $data_congno, "id=" . $rs_congno['id']);
            }
            else{
                $oClass->insert("php_congnokhachhang", $data_congno);
            }
            
        }


        //end xử lý in phiếu thu 

        $oClass->insert("php_donhangtrongoi", $data);
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
