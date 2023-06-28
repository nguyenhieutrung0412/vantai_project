<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhang'";

    $action_kh = "'info_kh_form'";
    $idSelect = "'name_khachhang'";
    $name_form_kh = "'info_kh'";

    $module_kh = "'khachhang'";
    $action_kh_add = "'add-view'";


    if ($_POST['data'] != "") {
        $str_list = '';
        $kh_result =  $model->db->query("SELECT * FROM php_khachhang WHERE phone_kh LIKE '%" . $_POST['data'] . "%' LIMIT 3");
        $count = $kh_result->num_rows();
        while ($rs = $kh_result->fetch()) {
            $khachhang .= ' <option value="' . $rs['id'] . '" >' . $rs['name_kh'] . '</option>';
            $str_list .= '<li><a onclick ="return onchange_search(' . $module . ',' . $action_kh . ',' . $rs['id'] . ',' . $name_form_kh . ');">' . $rs['name_kh'] . ' - ' . $rs['phone_kh'] . ' <span class="click"> Chọn<span></a></li>';
        };

        if ($count > 0) {
            $str = '
            
            ';
            die(json_encode(
                array(

                    'status' => 1,
                    'str' => $str,
                    'str_list' => $str_list,
                )
            ));
        } else {
            $str = '
            <td colspan="2">
            <div class="str color-0" >Không có khách hàng trong danh sách, vui lòng thêm khách hàng!</div>
            <a class="button" style="margin:20px" onclick="return add_view_deletePopup_afteradd(' . $module_kh . ',' . $action_kh_add . ')">Thêm khách hàng</a>
            </td>
            ';
            die(json_encode(
                array(

                    'status' => 2,
                    'str' => $str,
                    'str_list' => $str_list,
                    'msg' => 'Không có khách hàng tồn tại, hãy thêm khách hàng'
                )
            ));
        }
    }
}
