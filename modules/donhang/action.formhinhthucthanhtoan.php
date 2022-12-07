<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['data'] == "thanhtoanbangcuoc") {

        $result = $oContent->view_table("php_banggiacuoc_tuyen");
        while ($rs = $result->fetch()) {
            $option_bangcuoc .= '<option value="' . $rs['id'] . '">' . $rs['ten_tuyen'] . ' - ' . $rs['so_tien'] . '</option>';
        }
        $str = '
        <td colspan="2">
            <div class="select_filter">
            <div class="card_all">
                <select name="phivanchuyen_select" id="phivanchuyen_select"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                    <option value="0">---Chọn giá cước vận chuyển---</option>
                   ' . $option_bangcuoc . '
                </select>
            </div>
        </div>
        </td>
        ';
    } elseif ($_POST['data'] == "thanhtoannhapcuoc") {
        $str = '
        
            <td class="td-first">Phí vận chuyển: </td>
            <td><input type="text" name="phivanchuyen" placeholder="VD: 1.500.000 or 1,500,000" required></td>
        
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
