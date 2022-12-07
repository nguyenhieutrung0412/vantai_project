<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

    $module = "'donhangroi'";
    $update = "'update-donhangcon'";
    $frm = "'frmUpdateDonHang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if (isset($rs['id'])) {



        $module = "'donhangroi'";
        $action = "'info_kh_form'";
        $idSelect = "'name_khachhang'";
        $name_form = "'info_kh'";
        $thoigiannhan = str_replace(":", " ", $rs['thoigian_nhanhang']);
        $arr_thoigiannhan = explode(" ", $thoigiannhan);

        $thoigiangiao = str_replace(":", " ", $rs['thoigian_giaohang']);
        $arr_thoigiangiao = explode(" ", $thoigiangiao);


        $str = '
        <div class="pop-up">
        <h3>Update</h3>
        <form name="frmUpdateDonHang" id="frmUpdateDonHang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <tbody>
           
            
          
            <tr>
                <td class="td-first">Loại hàng</td>
                <td><input type="text" name="loaihang"  placeholder="Loại hàng" value="' . $rs['loaihang'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Số lượng hàng hóa</td>
                <td><input type="text" name="soluong_hanghoa"  placeholder="Loại hàng" value="' . $rs['soluong_hanghoa'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Trọng lượng hàng hóa</td>
                <td><input type="text" name="trongluong_hanghoa"  placeholder="Loại hàng" value="' . $rs['trongluong_hanghoa'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên người nhận</td>
                <td><input type="text" name="ten_nguoinhan"  placeholder="" value="' . $rs['ten_nguoinhan'] . '" required></td>
            </tr>
          
            <tr>
                <td class="td-first">Địa chỉ nhận hàng</td>
                <td><input type="text" name="diachi_nhanhang"  placeholder="" value="' . $rs['diachi_nhanhang'] . '" required></td>
            </tr>
            <tr>
            
            <td colspan="2">    <div class="input-formnguoinhan">
            <label>Thời gian nhận hàng: </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang" value="' . $arr_thoigiannhan[0] . '" required>
            <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang" value="' . $arr_thoigiannhan[1] . '"  required>
            <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59" value="' . $arr_thoigiannhan[2] . '"  required>
              
            </tr>
            <tr>
                <td class="td-first">Địa chỉ giao hàng</td>
                <td><input type="text" name="diachi_giaohang"  placeholder="" value="' . $rs['diachi_giaohang'] . '" required></td>
            </tr>
            <tr>
              
                <td colspan="2">    
                <div class="input-formnguoinhan">
                    <label>Thời gian giao hàng dự kiến: </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang" value="' . $arr_thoigiangiao[0] . '"  required>
                    <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang" value="' . $arr_thoigiangiao[1] . '"  required>
                    <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00" value="' . $arr_thoigiangiao[2] . '"  required>
                </div>
                
                </td>
            </tr>
            <tr>
                <td class="td-first">Số điện thoại người nhận</td>
                <td><input type="text" name="phone_nguoinhan"  placeholder="" value="' . $rs['phone_nguoinhan'] . '" required></td>
            </tr>
          
            <tr>
                <td class="td-first">Phí vận chuyển</td>
                <td><input type="text" name="phivanchuyen"  placeholder="VD: 150.000 or 150,000" value="' . $rs['phivanchuyen'] . '" required></td>
            </tr>
        </tbody>
        </table>
        
        
      
        <input type="hidden" name="id" value="' . $rs['id_security'] . '">
        <div class="btn-submit">
   
            <button type="submit" class="submit">Update</button>
            <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
        </div>
    </form>
    <script>
    $(function() {
        $( "#datepicker").datepicker({
            dateFormat: "dd/m/yy"
        });
  
        $( "#datepicker_2").datepicker({
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
