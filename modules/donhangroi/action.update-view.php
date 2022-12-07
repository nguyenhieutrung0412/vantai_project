<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

    $module = "'donhangroi'";
    $update = "'update'";
    $frm = "'frmUpdateDonHang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if (isset($rs['id'])) {



        $module = "'donhangroi'";
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
            <td class="td-first">Phí vận chuyển</td>
            <td><input type="text" name="tong_phivanchuyen"  placeholder="Phí vận chuyển" value="' . $rs['tong_phivanchuyen'] . '" required></td>
        </tr>
        </tbody>
        </table>
        
        
      
        <input type="hidden" name="id" value="' . $rs['id_security'] . '">
        <div class="btn-submit">
          
            <button type="submit" class="submit">Update</button>
            <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
        </div>
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
