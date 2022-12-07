<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_banggiacuoc_tuyen", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'banggiacuoctuyen'";
    $update = "'update'";
    $frm = "'frmUpdatebanggiacuoc'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdatebanggiacuoc" id="frmUpdatebanggiacuoc" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
        
                <tr>
                    <td class="td-first">Mã tuyến</td>
                    <td><input type="text" name="ma_tuyen"  placeholder="Mã tuyến"  value="'.$rs['ma_tuyen'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Tên tuyến</td>
                    <td><input type="text" name="ten_tuyen"  placeholder="Tên tuyến"  value="'.$rs['ten_tuyen'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Số km</td>
                    <td><input type="text" name="km"  value="'.$rs['km'].'" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="VD: Nhập 1500 tương đương 1.500km" required></td>
                </tr>
                <tr>
                    <td class="td-first">Số tiền</td>
                    <td><input type="text" name="so_tien"  value="'.$rs['so_tien'].'" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="VD: 1500000" required></td>
                </tr>
           
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
             
                <button type="submit" class="submit">Update</button>
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
                'status' => 0,
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
            )
           ));
    }
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;