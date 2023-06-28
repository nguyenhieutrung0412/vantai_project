<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if($_POST['id'] > 0)
{
        $donhang = $oContent->view_table("php_donhangtrongoi","id = ".$oClass->id_decode($_POST['id']));
        $rs_donhang = $donhang->fetch(); 
    //xử lý thời gian 
        // $thoigian = explode("/",$rs_donhang['thoigian_nhanhang']);
        // //xử lý lấy tháng năm của ngày đổ dầu
        // $thoigiangiaohang = explode("/",$rs_donhang['thoigian_giaohang']);
        // if($thoigiangiaohang[1] > 0 && $thoigiangiaohang[1] < 10)
        // {
        //     $thoigiangiaohang[1] = '0'.$thoigiangiaohang[1];
        // }
        // //xử lý lưu dữ liệu theo giờ quốc tế
        // $gio_quocte = $thoigiangiaohang[2].'-'.$thoigiangiaohang[1].'-'.$thoigiangiaohang[0];
 //end 
        $data = array(
            'id_khachhang' => $rs_donhang['id_khachhang'],
            'loaihang' => $rs_donhang['loaihang'],
            'soluong_hanghoa' => $rs_donhang['soluong_hanghoa'],
            'trongluong_hanghoa' => $rs_donhang['trongluong_hanghoa'],
            'diachi_nhanhang' => $rs_donhang['diachi_nhanhang'],
            
            'thoigian_nhanhang' => $rs_donhang['thoigian_nhanhang'],
            'thoigian_giaohang' =>  $rs_donhang['thoigian_giaohang'],
            'ten_nguoinhan' => $rs_donhang['ten_nguoinhan'],
           
            'diachi_giaohang' => $rs_donhang['diachi_giaohang'],
            'donvi_tinhphi' => $rs_donhang['donvi_tinhphi'],

            'phone_nguoinhan' => $rs_donhang['phone_nguoinhan'],
            'hinhthucthanhtoan' => $rs_donhang['hinhthucthanhtoan'],
            'ghichu' => $rs_donhang['ghichu'],
            'phivanchuyen' => $rs_donhang['phivanchuyen'],
            'don_gia' => $rs_donhang['don_gia'],
            'ten_tuyen' => $rs_donhang['ten_tuyen'],
            'luong_chuyen' => $rs_donhang['luong_chuyen'],
            'active' => 0,
            'thang' => date('m'),
            'nam' => date('Y'),
        );
        //lấy sdt của khách hàng
        $result_kh = $oContent->view_table("php_khachhang", "id=" . $data['id_khachhang']);
        $rs_kh = $result_kh->fetch();
        $data['sdt_nguoigui'] = $rs_kh['phone_kh'];
        //end
       
        // if (isset($rs_donhang['phivanchuyen'] {
        //     $phivanchuyen = $oClass->DoiSoTien($_REQUEST['phivanchuyen']);
        //     $data['don_gia'] = $phivanchuyen;
         
        //     $data['ten_tuyen'] = $_REQUEST['ten_tuyen'];
        //     $data['luong_chuyen'] = $_REQUEST['luong_chuyen'];
        //     $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
            
        
        // } elseif (isset($_REQUEST['phivanchuyen_select'] {
        //     $result = $oContent->view_table("php_banggiacuoc_tuyen", "id=" . $_POST['phivanchuyen_select']);
        //     $rs = $result->fetch();
        //     $data['don_gia'] = $rs['so_tien'];
        //     $data['ten_tuyen'] = $rs['ten_tuyen'];
        //     $data['luong_chuyen'] = $rs['luong_chuyen'];
        //     $data['phivanchuyen'] = ($data['trongluong_hanghoa'] / 1000) * $data['don_gia'];
           
        
        // }

        //xử lý in phiếu thu tiền mặt 
        if ($rs_donhang['hinhthucthanhtoan'] == 'thanhtoantienmat') {
         

            $data_phieuthu = array(
                'loai_thu' => 3,
                'name_nguoithu' => $rs_kh['name_kh'],
                'diachi_nguoithu' => $rs_kh['address_kh'],
                'phone_nguoithu' => $rs_kh['phone_kh'],
                'ngaytao_phieuthu' => date("Y-m-d"),
                'thang' => $data['thang'],
                'nam' => $data['nam'],
                'sotien_thu' => $data['phivanchuyen'],
                'sotien_bangchu' => $oClass->jam_read_num_forvietnamese($data['phivanchuyen']),
                'noidung_thu' => 'Thu tiền phí vận chuyển',
                'tennguoitao_thu' => $_SESSION['name'],

                'active' => 0

            );
            $oClass->insert("php_phieuthu", $data_phieuthu);
        } elseif ($rs_donhang['hinhthucthanhtoan'] == 'thanhtoancongno') {
            $congno = $oContent->view_table("php_congnokhachhang", " id_khachhang = ".$data['id_khachhang']." AND `thang`=" . $data['thang'] . " AND `nam` =". $data['nam']  ."  LIMIT 1");
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
                'msg' => 'Sao chép thành công'

            )
            ));
    }
    else{
        die(json_encode(array(
            'status' => '0',
            'msg' => 'Sao chép không thành công'
        )));
    }
    
} else {
    die(json_encode(array(
        'status' => '0',
        'msg' => 'Thêm thất bại'
    )));
}
exit;
