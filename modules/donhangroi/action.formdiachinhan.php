<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhangroi'";
    $action = "'formdiachigiao'";
    $id_giaokho = "'rd-giaokho'";
    $id_giaodiachi = "'rd-giaodiachi'";
    $name_form = "'form-noigiao'";

    if ($_POST['data'] == "nhanhangtaikho") {

        $result = $oContent->view_table("php_kho", "active = 1");
        while ($rs = $result->fetch()) {
            $option_khonhan .= '<option value="' . $rs['id'] . '">' . $rs['ten_kho'] . ' </option>';
        }
        $str = '
                 
        <td colspan = "2">
            <div class="select_filter">
            <div class="card_all">
                <select name="khonhan_select" id="khonhan_select"  >
                    <option value="0">---Chọn kho nhận---</option>
                   ' . $option_khonhan . '
                </select>
            </div>
        </div>
        <div style="width:100%">
            <input type="radio" style="margin-top:30px;width:3%;" id="rd-giaokho" name ="rd-noigiao"  value="giaohangtaikho"> <label for="rd-giaokho">Giao hàng tại kho</label>
            <input type="radio" style="margin-top:5px;width:3%;" id="rd-giaodiachi" name ="rd-noigiao" value="giaohangtheodiachi" ><label for="rd-giaodiachi">Giao hàng theo địa chỉ</label>
        </div>

       
       
        </td>
                     
                     
                    
                    
                <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });
                    $("input[type=radio][name=rd-noigiao]").on("change", function() {
                        if(this.value == "giaohangtaikho")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_giaokho . ',' . $name_form . ');
                           
                        }
                        else if(this.value == "giaohangtheodiachi")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_giaodiachi . ',' . $name_form . ');
                        }
                        
                    });

                 
           

                });
                </script>
        ';
    } elseif ($_POST['data'] == "nhanhangtheodiachi") {
        $str = '
                    <td colspan = "2">
                    <div class="input-formnguoinhan">
                        <label>Nhập địa chỉ nơi nhận: </label> <input type="text" name="diachi_nhanhang" required><br>
                    </div>
                    <div style="width:100%">
                        <input type="radio" style="margin-top:30px;width:3%;" id="rd-giaokho" name ="rd-noigiao"  value="giaohangtaikho"> <label for="rd-giaokho">Giao hàng tại kho</label>
                        <input type="radio" style="margin-top:5px;width:3%;" id="rd-giaodiachi" name ="rd-noigiao" value="giaohangtheodiachi" ><label for="rd-giaodiachi">Giao hàng theo địa chỉ</label>
                    </div>

            
            
                </td>
                <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });

                    $("input[type=radio][name=rd-noigiao]").on("change", function() {
                        if(this.value == "giaohangtaikho")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_giaokho . ',' . $name_form . ');
                           
                        }
                        else if(this.value == "giaohangtheodiachi")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_giaodiachi . ',' . $name_form . ');
                        }
                        
                    });
                   
                   
                });
                </script>
        ';
    } else {
        die(json_encode(
            array(

                'status' => 0,
                'msg' => 'Lỗi hệ thống',
            )
        ));
    }
    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}
