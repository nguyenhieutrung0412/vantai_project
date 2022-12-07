<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $oClass->id_decode($_POST['id']);
    $result = $oContent->view_table("php_luongnhansu", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $module = "'luongnhansu'";
    $add = "'add-ungluong'";
    $frm = "'frmAddluongnhansu'";
        $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddluongnhansu" id="frmAddluongnhansu" method="post" onsubmit = "return _edit('.$module.','.$add.','.$frm.',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
            </tr>
                <td class="td-first">Số tiền ứng </td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="so_tien_ung"    placeholder="Số tiền ứng" required></td>
            </tr>
                <tr>
                    <td class="td-first">Nội dung ứng tiền</td>
                    <td><textarea name="noidung_ung"  rows="10"  placeholder="..." required></textarea></td>
                </tr>
                <tr>
                    <td class="td-first">Ngày ứng lương</td>
                    <td><input type="text" id="datepicker"   name="date_ung"    multiple required></td>
                </tr>
                
                </tbody>
                </table>
                <input type="hidden" name="user_id" value="'.$rs['user_id'].'">
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
              <script>
          $( function() {
            $( "#datepicker" ).datepicker({
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