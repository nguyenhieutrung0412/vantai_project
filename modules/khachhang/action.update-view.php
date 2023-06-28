<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_khachhang", "`id`=".$id." LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'khachhang'";
    $update = "'update'";
    $frm = "'frmUpdateKhachHang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if(isset($rs['id'])){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật khách hàng</h3>
        <form name="frmUpdateKhachHang" id="frmUpdateKhachHang" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
        <table class="table-input">
                        <tbody>
                            <tr>
                                <td class="td-first">Họ và tên *</td>
                                <td>
                                    <input type="text" name="name"  placeholder="Name" value = "'.$rs['name_kh'].'" required>
                                </td>
                            </tr>
                             <tr>
                                <td class="td-first">Số điện thoại *</td>
                                <td>
                                    <input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone" value = "'.$rs['phone_kh'].'"  placeholder="Số điện thoại" required>
                                </td>
                            </tr>
                             <tr>
                                <td class="td-first">Địa chỉ *</td>
                                <td>
                                    <input type="text" name="address"  placeholder="Địa chỉ" value = "'.$rs['address_kh'].'" required>
                                </td>
                            </tr>
                     
                       
                            <tr>
                                <td class="td-first">Tên công ty</td>
                                <td>
                                    <input type="text" name="ten_congty"  placeholder="Tên công ty" value = "'.$rs['ten_congty'].'" >
                                </td>
                            </tr>
                            <tr>
                                <td class="td-first">Mã số thuế</td>
                                <td>
                                    <input type="text" name="masothue"  placeholder="Mã số thuế" value = "'.$rs['masothue'].'" >
                                </td>
                            </tr>
                     
                            <tr>
                                <td class="td-first">Mật khẩu</td>
                                <td>  <input type="password" name="password"  placeholder="Mật khẩu" ></td>
                            </tr>
                        </tbody>
                    </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
             
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
    </div>
        ';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
           ));
    }else{
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
            )
           ));
    }
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;