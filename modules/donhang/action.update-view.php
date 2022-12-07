<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangtrongoi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

    $module = "'donhang'";
    $update = "'update'";
    $frm = "'frmUpdateDonHang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if (isset($rs['id'])) {



        $module = "'donhang'";
        $action = "'info_kh_form'";
        $idSelect = "'name_khachhang'";
        $name_form = "'info_kh'";



        $str = '
        <div class="pop-up">
        <h3>Update</h3>
        <form name="frmUpdateDonHang" id="frmUpdateDonHang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <tbody>
           
            <tr>
                <td class="td-first">Địa chỉ nhận hàng</td>
                <td> <input type="text"  name="diachi_nhanhang"  placeholder="Địa chỉ nhận hàng" value="' . $rs['diachi_nhanhang'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Thời gian nhận hàng</td>
                <td><input type="text" id ="datepicker" name="thoigian_nhanhang"  placeholder="Thời gian nhận hàng" value="' . $rs['thoigian_nhanhang'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên người nhận</td>
                <td><input type="text"  name="ten_nguoinhan"  placeholder="Tên người nhận" value="' . $rs['ten_nguoinhan'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">CMND/CCCD</td>
                <td><input type="text"  name="cmnd_nguoinhan"  placeholder="CMND người nhận" value="' . $rs['cmnd_nguoinhan'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Địa chỉ giao hàng</td>
                <td> <input type="text" name="diachi_giaohang"  placeholder="Địa chỉ giao hàng" value="' . $rs['diachi_giaohang'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Số điện thoại người nhận</td>
                <td> <input type="text" name="phone_nguoinhan"  placeholder="Số điện thoại người nhận" value="' . $rs['phone_nguoinhan'] . '" required></td>
            </tr>
          
            <tr>
            <td class="td-first">Phí vận chuyển</td>
            <td><input type="text" name="phivanchuyen"  placeholder="VD: 1.500.000 or 1,500,000" value="' . $rs['phivanchuyen'] . '" required></td>
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
    $( function() {
        $( "#datepicker" ).datepicker({
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
