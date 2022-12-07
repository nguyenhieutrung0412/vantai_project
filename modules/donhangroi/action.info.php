<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {



    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "VND";
    if ($rs['hinhthucthanhtoan'] == 'nguoiguitra') {
        $rs['hinhthucthanhtoan'] = 'Người gửi thanh toán';
    } elseif ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
        $rs['hinhthucthanhtoan'] = 'Người nhận thanh toán';
    }

    if ($rs['phuongthucthanhtoan'] == 'thanhtoancongno') {
        $rs['phuongthucthanhtoan'] = 'Thanh toán công nợ khách hàng';
    } elseif ($rs['phuongthucthanhtoan'] == 'thanhtoantienmat') {
        $rs['phuongthucthanhtoan'] = 'Thanh toán tiền mặt';
    }
    $total = $result->num_rows();
    $result2 = $oContent->view_table("php_khachhang", "`id`=" . $rs['id_khachhang'] . "  LIMIT 1");
    $rs2 = $result2->fetch();

    $result3 = $oContent->view_table("php_mathang_donhangroi", "`id_donhangroi`=" . $id . "");

    while ($rs3 = $result3->fetch()) {


        $list_mathang .= $rs3['ten'] . ',';
    }
    // $result_taixe = $oContent->view_table("php_taixe", "`id`=".$rs['id_taixe']."  LIMIT 1");
    // $rs_taixe = $result_taixe->fetch();
    // $result_doixe = $oContent->view_table("php_doixe", "`id`=".$rs['id_doixe']."  LIMIT 1");
    // $rs_doixe = $result_doixe->fetch();
    // $result_phuxe = $oContent->view_table("php_nhansu", "`id`=".$rs['id_nhansu']."  LIMIT 1");
    // $rs_phuxe = $result_phuxe->fetch();


    //lấy danh sách hình ảnh nếu có
    $kt_img = $oContent->view_table("php_images", "type = 'php_donhangroi_s' AND type_id = '" . $rs['id'] . "'");
    $total_img = $kt_img->num_rows();
    $p = 1;

    while ($ds = $kt_img->fetch()) {
        $code_pics = $oClass->id_encode($ds['id']);
        $code_act = "'" . $code_pics . "'";

        $module = "'donhangroi'";
        $action_delete = "'delete_img'";
        if ($p % 4 == 0) {
            $ds['fix'] = ' fix';
        }

        $img .= '
        <li  id="pics_' . $code_pics . '"  class="' . $ds['fix'] . '">
              
                    <a class="colorbox group1" style="cursor:zoom-in" href="data/upload/images/' . $ds['file_name'] . '" >
                        <img class="img-responsive" src="data/upload/images/' . $ds['file_name'] . '">
                    </a>
               
                <span class="color-0" onclick="return deleteImage(' . $module . ',' . $action_delete . ',' . $code_act . ')"><i class="fa fa-trash "></i> Xóa</span>
        </li>
    ';

        $p++;
    }
    if ($total_img > 0) {
        $hinhanh = '<tr>
            <td colspan="2">
            
            <div class="demo-gallery">
                <ul class="picslist "  >
                 
                ' . $img . '
                
                </ul>
            </div>
               
            </td>
        </tr>';
    }




    if ($total == 1) {
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
            <h2>Thông tin đơn hàng   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
            <div class="info">
                <form>
                <table class="table-input">
                    <thead>
                        <tr >
                            <th colspan ="4" class="title-table"><h4>Thông tin khách hàng</h4></th>
                        </tr>
                    </thead>
              
                <tbody>
                   <tr>
                   
                   <td class="td-first"><label for="">Mã Đơn hàng: </label></td>
                       <td>  <input type="text" value="' . $rs['id'] . '"  readonly> </td>
                   
                   </tr>
                   <tr>
                   
                        <td class="td-first"><label for="">Tên khách hàng: </label></td>
                        <td><input type="text" value="' . $rs2['name_kh'] . '"  readonly></td>
                  
                    </tr>
                    <tr>
                        <td class="td-first"><label for="">Số điện thoại khách hàng: </label></td>
                        <td><input type="text" value="' . $rs2['phone_kh'] . '"  readonly></td>
              
                    </tr>
                    <tr>
                        <td class="td-first"><label for="">Địa chỉ khách hàng: </label></td>
                        <td><input type="text" value="' . $rs2['address_kh'] . '"  readonly></td>
              
                    </tr>
                    <tr>
                        <td class="td-first"><label for="">Email khách hàng: </label></td>
                        <td><input type="text" value="' . $rs2['email_kh'] . '"  readonly></td>
              
                    </tr>
                    <tr>
                        <td class="td-first"><label for="">CMND/CCCD: </label></td>
                        <td><input type="text" value="' . $rs2['cmnd'] . '"  readonly></td>
              
                    </tr>
                    <tr>
                        <td class="td-first"><label for="">Tên công ty: </label></td>
                        <td><input type="text" value="' . $rs2['ten_congty'] . '"  readonly></td>
              
                    </tr>
                    <tr>
                   
                        <td class="td-first"><label for="">Mã số thuế: </label></td>
                        <td><input type="text" value="' . $rs['masothue'] . '"  readonly></td>
                    
                    </tr>
                    </tbody>
                    </table>

                    <table class="table-input">
                    <thead>
                        <tr >
                            <th colspan ="4" class="title-table"><h4>Thông tin giao nhận</h4></th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                    
                        <td class="td-first"><label for="">Loại hàng: </label></td>
                        <td><input type="text" value="' . $rs['loaihang'] . '"  readonly></td>
                   
                    </tr>

                    <tr>
                    
                        <td class="td-first"><label for="">Số lượng hàng: </label></td>
                        <td><input type="text" value="' . $rs['soluong_hanghoa'] . '"  readonly></td>
                   
                    </tr>

                    <tr>
                    
                        <td class="td-first"><label for="">Trọng lượng hàng: </label></td>
                        <td><input type="text" value="' . $rs['trongluong_hanghoa'] . '"  readonly></td>
                   
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Chi tiết loại hàng: </label></td>
                        <td><input type="text" value="' . $list_mathang . '"  readonly></td>
                   
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Địa chỉ lấy hàng: </label></td>
                        <td><input type="text" value="' . $rs['diachi_nhanhang'] . '"  readonly></td>
               
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Thời gian lấy hàng: </label></td>
                        <td><input type="text" value="' . $rs['thoigian_nhanhang'] . '"  readonly></td>
               
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Tên người nhận hàng: </label></td>
                        <td><input type="text" value="' . $rs['ten_nguoinhan'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">CMND người nhận: </label></td>
                        <td><input type="text" value="' . $rs['cmnd_nguoinhan'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Số điện thoại người nhận: </label></td>
                        <td><input type="text" value="' . $rs['phone_nguoinhan'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Địa chỉ giao hàng: </label></td>
                        <td><input type="text" value="' . $rs['diachi_giaohang'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Thời gian giao hàng dự kiến: </label></td>
                        <td><input type="text" value="' . $rs['thoigian_giaohang'] . '"  readonly></td>
           
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Ghi chú: </label></td>
                        <td><input type="text" value="' . $rs['ghichu'] . '"  readonly></td>
                
                    </tr>
                    </tbody>
                    </table>

                    <table class="table-input">
                    <thead>
                        <tr >
                            <th colspan ="4" class="title-table"><h4>Thông tin thu phí</h4></th>
                        </tr>
                    </thead>
              
                    <tbody>
                    <tr>
                    
                        <td class="td-first"><label for="">Hình thức thanh toán: </label></td>
                        <td><input type="text" value="' . $rs['hinhthucthanhtoan'] . '"  readonly></td>                 
                    </tr>
                    <tr>
                    
                    <td class="td-first"><label for="">Phương thức thanh toán: </label></td>
                    <td><input type="text" value="' . $rs['phuongthucthanhtoan'] . '"  readonly></td>                 
                </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Phí vận chuyển: </label></td>
                        <td><input type="text" value="' . $rs['phivanchuyen'] . '"  readonly></td>
                    
                    </tr>
                    </tbody>
                    </table>
                    
                    <table class="table-input">
                    <thead>
                        <tr >
                            <th colspan ="4" class="title-table"><h4>Thông tin người nhận thực</h4></th>
                        </tr>
                    </thead>
              
                    <tbody>
                    <tr>
                    
                        <td class="td-first"><label for="">Tên người nhận: </label></td>
                        <td><input type="text" value="' . $rs['ten_nguoinhan_thuc'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Số điện thoại: </label></td>
                        <td><input type="text" value="' . $rs['phone_nguoinhan_thuc'] . '"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">CMND: </label></td>
                        <td><input type="text" value="' . $rs['cmnd_nguoinhan_thuc'] . '"  readonly></td>
                    
                    </tr>
                    ' . $hinhanh . '
                    </tbody>
                    </table>
                    </form>
                </div>
               
    ';
        die(json_encode(
            array(

                'status' => 1,
                'str' => $str
            )
        ));
    } else {
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
            )
        ));
    }
} else {
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
