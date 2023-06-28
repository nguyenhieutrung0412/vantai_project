<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    //xử lý thời gian 
    $thoigian_donhang = explode(" ",$rs['thoigian_giaohang']);
    $thoigian_giaohang_set = explode("-",$thoigian_donhang[0]);
    $thoigian_giao_set = $thoigian_giaohang_set[2].'/'.$thoigian_giaohang_set[1].'/'.$thoigian_giaohang_set[0];
    $gio_giaohang = explode(":",$thoigian_donhang[1]);
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
        <span class="close_pop">×</span>
        <h3>Cập nhật đơn hàng</h3>
        <form name="frmUpdateDonHang" id="frmUpdateDonHang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <tbody>
           
            
            <tr>
                <td colspan = "2">
                    <div class="input-formnguoinhan">
                        <label>Thời gian giao hàng: * </label> <input type="text" class="time_input" id="datepicker"  name="thoigian_giaohang"  value="'.$thoigian_giao_set.'" required>
                        <label for="gio_nhanhang" class="time_input">Giờ: * </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang" value="'.$gio_giaohang[0].'"  required>
                        <label class="time_input">Phút: * </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="'.$gio_giaohang[1].'"  required>
                    </div>
                </td>
            </tr>
          
            <tr>
                <td class="td-first">Lương chuyến *</td>
                <td><input type="text" name="luong_chuyen" placeholder="" value="' . $rs['luong_chuyen'] . '"  required></td>
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
