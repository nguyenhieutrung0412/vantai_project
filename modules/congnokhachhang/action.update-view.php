<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_congnokhachhang", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'congnokhachhang'";
    $update = "'update'";
    $frm = "'frmUpdatecongnokhachhang'";
    $img_file = "'1'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    //xử lý khách hàng selected 
    $result_kh_selected = $oContent->view_table("php_khachhang", "`id`=" . $rs['id_khachhang'] . "  LIMIT 1");
    $rs_kh_selected = $result->fetch();
    $selected = ' <option value="' . $rs_kh_selected['id'] . '" selected>' . $rs_kh_selected['name_kh'] . '</option>';

    //xử lý danh sách khách hàng trừ khách hàng đã đc chọn
    $result_kh_list = $oContent->view_table("php_khachhang");
    while ($rs_kh_list = $result->fetch()) {
        if ($rs_kh_list['id'] != $rs_kh_selected['id']) {
            $list_option .= '<option value="' . $rs_kh_list['id'] . '">' . $rs_kh_list['name_kh'] . '</option>';
        }
    }


    if ($total == 1) {

        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdatecongnokhachhang" id="frmUpdatecongnokhachhang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
            <td class="td-first">Tên khách hàng:</td>
            <td> 
                <div class="select_filter">
                    <div class="card_all">
                        <select name="khachhang_select" id="khachhang_select" required>
                       
                        ' . $selected . '
                        ' . $list_option . '
                        </select>
                    </div>
                </div>
            </td>
            <tr>
            <tr>
                <td class="td-first">Số tiền:</td>
                <td><input type="text" value="' . $rs['so_tien'] . '" name="so_tien" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></td>
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
