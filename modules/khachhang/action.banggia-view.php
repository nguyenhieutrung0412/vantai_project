<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_banggia_hopdong", "`id_khachhang`=" . $id . " ");


    $module = "'khachhang'";
    $update = "'add-banggia'";
    $add_line = "'add-banggia'";

    $frm = "'frmUpdateBangGia'";
    $name_form = "'add-banggia'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $stt = 1;
    while ($rs = $result->fetch()) {
        $rs['luong_chuyen'] = number_format($rs['luong_chuyen'], 0, ',', '.');
        $rs['don_gia'] = number_format($rs['don_gia'], 0, ',', '.');
        $code_pics = $oClass->id_encode($rs['id']);
        $code_act = "'" . $code_pics . "'";


        $action_delete = "'delete_banggia'";
        $str_mathang .= '  
            <tr id="pics_' . $code_pics . '">
                <td>' . $stt . '</td>
                <td><input type="text" name ="update[1][ten_tuyen]" value="' . $rs['ten_tuyen'] . '"></td>
                <td><input type="text" name ="update[1][km]" value="' . $rs['km'] . '"></td>
                <td><input type="text" name ="update[1][don_gia]" value="' . $rs['don_gia'] . '"></td>
                
                <td><input type="text" name ="update[1][luong_chuyen]" value="' . $rs['luong_chuyen'] . '"></td>
                <input type="hidden" name ="update[1][id]" value="' . $rs['id'] . '">
                <input type="hidden" name ="id_khachhang" value="' . $rs['id_khachhang'] . '">
                <td><a href="javascript:void(0)" class="{xuly.xoa} color-0" onclick= "return deleteImage(' . $module . ',' . $action_delete . ',' . $code_pics . ')"> <i class="fa-solid fa-trash icon-delete"></i></a></td>
            </tr>
                ';
        $stt++;
    }


    $str = '
        <div class="pop-up">
        <h3>Bảng giá khách hàng</h3>
        <form name="frmUpdateBangGia" id="frmUpdateBangGia" method="post" onsubmit = "return _edit(' . $module . ',' . $add_line . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Tên tuyến</th>
                            <th>km ước tính</th>
                            <th>Đơn giá</th>
                            <th>Lương chuyến</th>
                            
                           
                            <th>#</th>
                        </tr>

                    </thead>
        <tbody class="add-banggia">
            ' . $str_mathang . '
          
           
            
        </tbody>
        </table>
        
        
      
            <input type="hidden" name="id_khachhang" value="' . $id . '">
            <div class="addline">
                <a href="javascript:void(0)" class="btn-add-banggia" >Thêm dòng</a>
            </div>
            <div class="btn-submit">
                
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
        </div>
        
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        
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
