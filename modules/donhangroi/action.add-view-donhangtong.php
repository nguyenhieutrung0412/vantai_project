<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'donhangroi'";
    $add = "'add'";
    $frm = "'frmAdddonhang'";
    $img_file = 1;

    $str = '
        <div class="pop-up">

            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAdddonhang" id="frmAdddonhang" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
                
                <tr class="form-nguoinhan">
                <td colspan = "2">
            <div class="input-formnguoinhan">
                <label>Thời gian giao hàng: </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang"  required>
                <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang"  required>
                <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00"  required>
            </div>
        </td>
                </tr>
                <tr class="form-hinhthucthanhtoan">
                    <td class="td-first">Tuyến đường tổng: </td>
                    <td><input type="text" name="tuyenduong_giaohang" placeholder="" required></td>
                </tr>

                </tbody> 
                </table>

                <div class="btn-submit">
                    <button type="submit" class="submit">Tạo đơn hàng</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                    
                </div>
            </form>
        </div>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
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
