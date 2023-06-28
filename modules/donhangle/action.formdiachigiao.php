<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhangroi'";
    $action = "'formdiachigiao'";
    $id_giaokho = "'rd-giaokho'";
    $id_giaodiachi = "'rd-giaodiachi'";
    $name_form = "'form-noigiao'";

    if ($_POST['data'] == "giaohangtaikho") {

        $result = $oContent->view_table("php_kho", "active = 1");
        while ($rs = $result->fetch()) {
            $option_khonhan .= '<option value="' . $rs['id'] . '">' . $rs['ten_kho'] . ' </option>';
        }
        $str = '
                 
        <div class="input-formnguoinhan">
            <div class="select_filter">
            <div class="card_all">
                <select name="khogiao_select" id="khogiao_select"  >
                    <option value="0">---Chọn kho giao---</option>
                   ' . $option_khonhan . '
                </select>
            </div>
        </div>
        </div>

       
       
       
                     
                     
                    
                    
                <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });
                    

                 
           

                });
                </script>
        ';
    } elseif ($_POST['data'] == "giaohangtheodiachi") {
        $str = '

                    <div class="input-formnguoinhan">
                        <label>Nhập địa chỉ nơi giao: * </label> <input type="text" name="diachi_giaohang" required><br>
                    </div>
                   

            
            
                </td>
                <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
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
