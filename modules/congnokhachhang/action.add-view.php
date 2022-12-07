<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'congnokhachhang'";
    $add = "'add'";
    $frm = "'frmAddcongno'";
    $img_file = 1;
    $rs['id_security'] = $oClass->id_encode($rs['id']);





    $khachhang = $oContent->view_table("php_khachhang", "active = 1");
    while ($rs_khachhang = $khachhang->fetch()) {

        $option_kh .= ' <option value="' . $rs_khachhang['id'] . '">' . $rs_khachhang['name_kh'] . '</option>';
    };

    $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddcongno" id="frmAddcongno" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
              
            <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Tên khách hàng:</td>
                    <td> 
                        <div class="select_filter">
                            <div class="card_all">
                                <select name="khachhang_select" id="khachhang_select" required>
                                    <option value="0">---Chọn khách hàng---</option>
                                ' . $option_kh . '
                                </select>
                            </div>
                        </div>
                    </td>
                <tr>
                <tr>
                    <td class="td-first">Số tiền:</td>
                    <td><input type="text" name="so_tien" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></td>
                </tr>
                <tr>
                    <td class="td-first">Thời gian:</td>
                    <td><input type="text" id="datepicker" name="thoigian"  required></td>
                </tr>
               
                

                </tbody> 
                </table>

                <div class="btn-submit">
                    <button type="submit" class="submit">Tạo công nợ</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                    
                </div>
            </form>
        </div>
        <script>
        $( "#datepicker" ).datepicker({
            dateFormat: "dd/m/yy"
        });
        </script>
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
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
