<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //kiểm tra xem có người phụ trách chuyến này chưa
    if ($_POST['id_phutrach'] != 0) {

        $module = "'donhangroi'";
        $action = "'update-phutrach'";
        //kiểm tra xem đang điều xe cho đối tượng nào
        if ($_POST['name_phutrach'] == 'taixe') {


            $title = 'Tài Xế';
            $name_phutrach = "'taixe'";

            $list_taixe = $oContent->view_table("php_taixe", "id = " . $_POST['id_phutrach']);

            $rs_taixe = $list_taixe->fetch();

            $taixe_khac = $oContent->view_table("php_taixe", "tinhtrangdon = 0");
            while ($rs_taixe_khac = $taixe_khac->fetch()) {
                if ($rs_taixe_khac['id'] != $_POST['id_phutrach']) {
                    $li_taixe_khac .= '<li>' . $rs_taixe_khac['name_taixe'] . ' <a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_taixe_khac['id'] . ',' . $name_phutrach . ')">Đổi</a></li>';
                }
            };



            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <div class="list_luongnhansu">
                    <table class="detail-container">
                            <tbody>
                            <tr>
                                <td  class="first">Họ và tên:</td>
                                <td>' . $rs_taixe['name_taixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Hạng bằng lái:</td>
                                <td>' . $rs_taixe['hangbanglai'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Số điện thoại:</td>
                                <td>' . $rs_taixe['phone_taixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Địa chỉ:</td>
                                <td>' . $rs_taixe['address_taixe'] . '</td>
                            </tr>
                            <input type="hidden" name="id_phuxe" value="' . $rs_taixe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    <table>
                </div>
                <div class="change">
                    <h4>Đổi tài xế xe</h4>
                    <ul>
                        ' . $li_taixe_khac . '
                    </ul>
                </div>
            </div>
        ';
        } else if ($_POST['name_phutrach'] == 'phuxe') {
            $title = 'Phụ xe';
            $name_phutrach = "'phuxe'";
            $list_phuxe = $oContent->view_table("php_nhansu", "position_id= 5 AND id=" . $_POST['id_phutrach']);
            $rs_phuxe = $list_phuxe->fetch();

            $phuxe_khac = $oContent->view_table("php_nhansu", "position_id= 5 AND tinhtrangdon = 0");
            while ($rs_phuxe_khac = $phuxe_khac->fetch()) {
                if ($rs_phuxe_khac['id'] != $_POST['id_phutrach']) {
                    $li_phuxekhac .= '<li>' . $rs_phuxe_khac['name'] . ' <a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_phuxe_khac['id'] . ',' . $name_phutrach . ')">Đổi</a></li>';
                }
            };

            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <div class="list_luongnhansu">
                    <table class="detail-container">
                            <tbody>
                            <tr>
                                <td  class="first">Họ và tên:</td>
                                <td>' . $rs_phuxe['name'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Ngày tháng năm sinh:</td>
                                <td>' . $rs_phuxe['dateofbirth'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Số điện thoại:</td>
                                <td>' . $rs_phuxe['phone'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Chức vụ:</td>
                                <td>' . $rs_phuxe['position'] . '</td>
                            </tr>
                            <input type="hidden" name="id_phuxe" value="' . $rs_phuxe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    <table>
                </div>
                <div class="change">
                    <h4>Đổi người phụ xe</h4>
                    <ul>
                        ' . $li_phuxekhac . '
                    </ul>
                </div>
            </div>
        ';


            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str,


                )
            ));
            exit;
        } else if ($_POST['name_phutrach'] == 'doixe') {
            $title = 'Đội xe';
            $name_phutrach = "'doixe'";

            $list_doixe = $oContent->view_table("php_doixe", "active= 1 AND id=" . $_POST['id_phutrach']);

            $rs_doixe = $list_doixe->fetch();
            //xử lý tên tài xế
            if ($rs_doixe['id_taixe'] != 0) {
                $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe['id_taixe']);
                $rstaixe = $taixe->fetch();
                $rs_doixe['name_taixe'] = $rstaixe['name_taixe'];
            } else {
                $rs_doixe['name_taixe'] = 'Không có tài xế phụ trách';
            }

            $doixe_khac = $oContent->view_table("php_doixe", " tinhtrangxe = 0");
            while ($rs_doixe_khac = $doixe_khac->fetch()) {
                if ($rs_doixe_khac['id'] != $_POST['id_phutrach']) {
                    if ($rs_doixe_khac['id_taixe'] != 0) {
                        $taixe_khac = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe_khac['id_taixe']);
                        $rstaixe_khac = $taixe_khac->fetch();
                        $rs_doixe_khac['name_taixe'] = $rstaixe_khac['name_taixe'];
                    } else {
                        $rs_doixe_khac['name_taixe'] = 'Không có tài xế phụ trách';
                    }
                    $li_doixekhac .= '<li>' . $rs_doixe_khac['loaixe'] . '(' . $rs_doixe_khac['name_taixe'] . ') <a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_doixe_khac['id'] . ',' . $name_phutrach . ')">Đổi</a></li>';
                }
            };

            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <div class="list_luongnhansu">
                    <table class="detail-container">
                            <tbody>
                            <tr>
                                <td  class="first">Loại xe:</td>
                                <td>' . $rs_doixe['loaixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Biển số xe:</td>
                                <td>' . $rs_doixe['biensoxe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Tên tài xế phụ trách xe:</td>
                                <td>' . $rs_doixe['name_taixe'] . '</td>
                            </tr>
                           
                            <input type="hidden" name="id_phuxe" value="' . $rs_doixe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    <table>
                </div>
                <div class="change">
                    <h4>Đổi người phụ xe</h4>
                    <ul>
                        ' . $li_doixekhac . '
                    </ul>
                </div>
            </div>
        ';
        }

        //html chung 

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
