<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //kiểm tra xem có người phụ trách chuyến này chưa
    if ($_POST['id_phutrach'] == 0) {
        $module = "'donhangroi'";
        $action = "'dieulenh-update'";
        //kiểm tra xem đang điều xe cho đối tượng nào
        if ($_POST['name_phutrach'] == 'taixe') {
            $name_phutrach = "'taixe'";
            $thead = ' <tr>
                            <th>Tên tài xế </th>
                            <th>Số điện thoại tài xế </th>
                            <th>Hạng bằng lái </th>
                            <th>Action </th>
                            </tr>';
            $list_taixe = $oContent->view_table("php_taixe");

            while ($rs_taixe = $list_taixe->fetch()) {
                $icon = '';
                if ($rs_taixe['tinhtrangdon'] == 1) {
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }

                $ds .= ' 
                <tr>
                    <td>' . $rs_taixe['name_taixe'] . ' ' . $icon . '</td>
                    <td>' . $rs_taixe['phone_taixe'] . '</td>
                    <td>' . $rs_taixe['hangbanglai'] . '</td>
                    <input type="hidden" name="id_taixe" value="' . $rs_taixe['id'] . '">
                    <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                    <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_taixe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                </tr>
                ';
            }
        } else if ($_POST['name_phutrach'] == 'phuxe') {
            $name_phutrach = "'phuxe'";
            $thead = ' <tr>
            <th>Tên người phụ xe </th>
            <th>Số điện thoại </th>
            <th>Chức vụ </th>
            <th>Action </th>
            </tr>';
            $list_phuxe = $oContent->view_table("php_nhansu", "position_id= 5");

            while ($rs_phuxe = $list_phuxe->fetch()) {
                $icon = '';
                if ($rs_phuxe['tinhtrangdon'] == 1) {
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }

                $ds .= ' 
            <tr>
                <td>' . $rs_phuxe['name'] . ' ' . $icon . '</td>
                <td>' . $rs_phuxe['phone'] . '</td>
                <td>' . $rs_phuxe['position'] . '</td>
                <input type="hidden" name="id_phuxe" value="' . $rs_phuxe['id'] . '">
                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_phuxe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
            </tr>
            ';
            }
        } else if ($_POST['name_phutrach'] == 'doixe') {
            $name_phutrach = "'doixe'";
            $thead = ' <tr>
            <th>Loại xe </th>
            <th>Biển số xe </th>
            <th>Tài xế phụ trách</th>
            <th>Action </th>
            </tr>';
            $list_doixe = $oContent->view_table("php_doixe", "active= 1");

            while ($rs_doixe = $list_doixe->fetch()) {
                $icon = '';
                if ($rs_doixe['tinhtrangxe'] == 1) {
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }
                //xử lý tên tài xế
                if ($rs_doixe['id_taixe'] != 0) {
                    $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe['id_taixe']);
                    $rstaixe = $taixe->fetch();
                    $rs_doixe['name_taixe'] = $rstaixe['name_taixe'];
                } else {
                    $rs_doixe['name_taixe'] = 'Không có tài xế phụ trách';
                }

                $ds .= ' 
            <tr>
                <td>' . $rs_doixe['loaixe'] . ' ' . $icon . '</td>
                <td>' . $rs_doixe['biensoxe'] . '</td>
                <td>' . $rs_doixe['name_taixe'] . '</td>
                <input type="hidden" name="id_taixe" value="' . $rs_doixe['id_taixe'] . '">
                <input type="hidden" name="id_doixe" value="' . $rs_doixe['id'] . '">
                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_doixe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
            </tr>
            ';
            }
        }

        //html chung 
        $str .= '
            <div class="pop-up">
                <h2> Điều lệnh cho đơn hàng    <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
        
                <div class="table"> 
                    <table>
                            <thead>
                               ' . $thead . '
                            <thead>
                            <tbody>

                            ' . $ds . '
                            </tbody>
                    <table>
                </div>
            </div>
        ';
        die(json_encode(
            array(
                'str' => $str,
                'status' => 1,

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
} else {
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
