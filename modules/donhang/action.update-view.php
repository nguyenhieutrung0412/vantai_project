<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangtrongoi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

    $module = "'donhang'";
    $update = "'update'";
    $frm = "'frmUpdateDonHang'";
    $rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";
    $rs['id_security'] = $oClass->id_encode($rs['id']);
      //xử lý thời gian 
      $thoigian_nhanhang = explode(" ",$rs['thoigian_nhanhang']);
      $gio_nhanhang = explode(":",$thoigian_nhanhang[1]);

      $thoigian_giaohang = explode(" ",$rs['thoigian_giaohang']);
      $thoigian_giaohang_set = explode("-",$thoigian_giaohang[0]);
      $thoigian_giao_set = $thoigian_giaohang_set[2].'/'.$thoigian_giaohang_set[1].'/'.$thoigian_giaohang_set[0];
      $gio_giaohang = explode(":",$thoigian_giaohang[1]);
      $selected_congno = '';
      $selected_tienmat = '';
    if($rs['hinhthucthanhtoan'] == 'thanhtoancongno')
    {
        $selected_congno = 'selected';
    }
    else  if($rs['hinhthucthanhtoan'] == 'thanhtoantienmat')
    {
        $selected_tienmat = 'selected';
    }
    if (isset($rs['id'])) {



        $module = "'donhang'";
        $action = "'info_kh_form'";
        $idSelect = "'name_khachhang'";
        $name_form = "'info_kh'";



        $str = '
        <div class="pop-up">
        <h3>Cập nhật đơn hàng</h3><div class="close_popup" onclick="return cancel()"><span>Thoát</span></div>
        <form name="frmUpdateDonHang" id="frmUpdateDonHang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
            <tr>
                <th colspan="2" class="title_thead">Thông tin giao nhận</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td-first">Trọng lượng hàng hóa  *</td>
                <td> <input type="text"  name="trongluong_hanghoa"  placeholder="Nhập giá trị theo đơn vị kg" value="' . $rs['trongluong_hanghoa'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Địa chỉ nhận hàng  *</td>
                <td> <input type="text"  name="diachi_nhanhang"  placeholder="Địa chỉ nhận hàng" value="' . $rs['diachi_nhanhang'] . '" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="input-formnguoinhan">
                        <label>Thời gian nhận hàng: * </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang" value="'.$thoigian_nhanhang[0].'"  required>
                        <label for="gio_nhanhang" class="time_input">Giờ: * </label> <input class="time_input-hours" type="number" min="0" max="23" value="'.$gio_nhanhang[0].'"  name="gio_nhanhang"  required>
                        <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="'.$gio_nhanhang[1].'" min="0" max="59"  required>
                    </div>
                </td>
            </tr>

           
           
            <tr>
                <td class="td-first">Địa chỉ giao hàng  *</td>
                <td> <input type="text" name="diachi_giaohang"  placeholder="Địa chỉ giao hàng" value="' . $rs['diachi_giaohang'] . '" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="input-formnguoinhan">
                        <label>Thời gian giao hàng: * </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang" value="'.$thoigian_giao_set.'"  required>
                        <label for="gio_nhanhang" class="time_input">Giờ: * </label> <input class="time_input-hours" type="number" min="0" max="23" value="'.$gio_giaohang[0].'" name="gio_giaohang"  required>
                        <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="'.$gio_giaohang[1].'"  required>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
            <table class="table-input">
            <thead>
                <tr>
                    <th colspan="2" class="title_thead">Thông tin người nhận</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="td-first">Tên người nhận *</td>
                <td><input type="text"  name="ten_nguoinhan"  placeholder="Tên người nhận" value="' . $rs['ten_nguoinhan'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Số điện thoại người nhận *</td>
                <td> <input type="text" name="phone_nguoinhan"  placeholder="Số điện thoại người nhận" value="' . $rs['phone_nguoinhan'] . '" required></td>
            </tr>
            </tbody>
            </table>
            <table class="table-input">
            <thead>
                <tr>
                    <th colspan="2" class="title_thead">Thông tin phí</th>
                </tr>
            </thead>
            <tbody>

            <tr>
                <td class="td-first">Hình thức vận chuyển *</td>
                <td><div class="select_filter">
                <div class="card_all">
                    <select name="thanhtoan_select" id="thanhtoan_select"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                        
                        <option value="thanhtoantienmat" '.$selected_tienmat.'>Thanh toán bằng tiền mặt</option>
                        <option value="thanhtoancongno" '.$selected_congno.'>Ghi vào công nợ khách hàng</option>
                    </select>
                </div>
    </div></td>
            </tr>
            <tr>
            
                <td class="td-first">Tên tuyến *</td>
                <td><input type="text" name="ten_tuyen"  placeholder="Tuyến đường" value="' . $rs['ten_tuyen'] . '" required></td>
            </tr>
            <tr>
            
                <td class="td-first">Đơn giá *</td>
                <td><input type="text" name="phivanchuyen"  placeholder="VD: 1.500.000 or 1,500,000 (Đơn giá / 1 tấn(1000Kg))" value="' . $rs['phivanchuyen'] . '" required></td>
            </tr>
            <tr>

                <td class="td-first">Lương chuyến *</td>
                <td><input type="text" name="luong_chuyen"  placeholder="Lương chuyến" value="' . $rs['luong_chuyen'] . '" required></td>
            </tr>
        </tbody>
        </table>
        
        
      
        <input type="hidden" name="id" value="' . $rs['id_security'] . '">
        <div class="btn-submit">
            <button type="submit" class="submit">Cập nhật</button>
            <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            
        </div>
        
    </form>
    <script type="text/javascript" src="template/Default/js/main_load.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: "dd/m/yy"
        });
        $( "#datepicker_2" ).datepicker({
            dateFormat: "dd/m/yy"
        });

    });
    </script>
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
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
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
