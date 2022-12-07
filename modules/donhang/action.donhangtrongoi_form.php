<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['data'] ==  1) {

        $module = "'donhang'";
        $action = "'info_kh_form'";
        $idSelect = "'name_khachhang'";
        $name_form = "'info_kh'";
        $result = $oContent->view_table("php_khachhang");
        while ($rs = $result->fetch()) {
            $khachhang .= ' <option value="' . $rs['id'] . '" >' . $rs['name_kh'] . '</option>';
        }
        $str = '<td>Tên khách hàng:</td>
                <td>
                    <div class="card_all">
                        <select name="name_khachhang" id="name_khachhang"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                            <option value="0">---Chọn khách hàng---</option>
                            ' . $khachhang . '
                        </select>
                        
                </td>
                
                    
                   
                </div>';

        die(json_encode(
            array(

                'status' => 1,
                'str' => $str
            )
        ));
    } else if ($_POST['data'] ==  2) {
        $str = 'Vui lòng chọn cả năm và tháng';

        die(json_encode(
            array(

                'status' => 0,
                'str' => $str
            )
        ));
    } else {
        $str = 'Vui lòng chọn cả năm và tháng';

        die(json_encode(
            array(
                'data' => $_POST['data'],
                'status' => 0,
                'str' => $str
            )
        ));
    }
}
