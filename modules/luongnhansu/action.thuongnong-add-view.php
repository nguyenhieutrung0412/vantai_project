<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $module = "'luongnhansu'";
    $add = "'add-thuongnong'";
    $frm = "'frmAddluongnhansu'";
        $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddluongnhansu" id="frmAddluongnhansu" method="post" onsubmit = "return _edit('.$module.','.$add.','.$frm.',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Số tiền thưởng nóng</td>
                    <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="thuongnong" value="'.$rs['thuong_nong'].'"   placeholder="Số tiền(200000)" required></td>
                </tr>
                
                <tr>
                    <td class="td-first">Lý do thưởng nóng</td>
                    <td><textarea name="lydo_thuongnong"  rows="10"  placeholder="..." required>'.$rs['lydo_thuongnong'].'</textarea></td>
                </tr>
                </tbody>
                </table>
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
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