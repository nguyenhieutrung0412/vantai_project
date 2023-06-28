<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $module = "'luongnhansu'";
    $add = "'add-ngaynghi'";
    $frm = "'frmAddluongnhansu'";
        $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddluongnhansu" id="frmAddluongnhansu" method="post" onsubmit = "return _edit('.$module.','.$add.','.$frm.',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Ngày nghỉ</td>
                    <td><input type="text" id="datepicker"   name="date_ngaynghi"    multiple required></td>
                </tr>
                  <tr>
                    <td class="td-first">Lý do nghỉ</td>
                    <td><textarea name="lydo_tangca"  rows="10"   placeholder="..." required></textarea></td>
                </tr>
                <tr>
                    <td class="td-first">Tình trạng</td>
                    <td> <select name="tinhtrang" id="tinhtrang">
                                <option value="0">---Chọn tình trạng nghỉ---</option>
                                <option value="1">Nguyên ngày có phép</option>
                                <option value="2">Nguyên ngày không phép</option>
                                <option value="3">Nửa ngày có phép</option>
                                <option value="4">Nửa ngày không phép</option>
                            
                            </select></td>
                </tr>
                </tbody>
                </table>
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
            <script>
          $( function() {
            $( "#datepicker" ).multiDatesPicker({
                dateFormat: "dd/m/yy"
            });
          } );
          </script>
        </div>
        ';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
           ));
   
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;