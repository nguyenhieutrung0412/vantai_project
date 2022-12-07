<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_taixe", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'tai-xe'";
    $update = "'update'";
    $frm = "'frmUpdatetaixe'";
    
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <h3>Update</h3>
         <form name="frmUpdatetaixe" id="frmUpdatetaixe" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Họ và tên</td>
                 <td> <input type="text" name="name"  placeholder="Name" value="'.$rs['name_taixe'].'"  required></td>
             </tr>
             <tr>
                <td class="td-first">Số điện thoại</td>
                <td><input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone" value="'.$rs['phone_taixe'].'"  placeholder="Số điện thoại" required></td>
            </tr>
            <tr>
            <td class="td-first">Địa chỉ</td>
            <td><input type="text" name="address"  placeholder="Lương tài xế" value="'.$rs['address_taixe'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Hạng bằng lái</td>
                <td><input type="text" name="hangbanglai"  placeholder="Lương tài xế" value="'.$rs['hangbanglai'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Lương tài xê</td>
                <td><input type="text" name="luong_taixe"  placeholder="Lương tài xế" value="'.$rs['luong_taixe'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Phụ cấp</td>
                <td><input type="text" name="phu_cap"  placeholder="Phụ cấp" value="'.$rs['phu_cap'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Tiền bảo hiểm</td>
                <td><input type="text" name="tien_baohiem"  placeholder="" value="'.$rs['tien_baohiem'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Tỉ lệ hoa hồng</td>
                <td><input type="text" name="tile_hoahong"  placeholder="" value="'.$rs['tile_hoahong'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Số tài khoản</td>
                <td><input type="text" name="stk"  placeholder="" value="'.$rs['stk'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên ngân hàng</td>
                <td><input type="text" name="ngan_hang"  placeholder="" value="'.$rs['ngan_hang'].'" required></td>
            </tr>
            <tr>
                <td class="td-first">Mật khẩu</td>
                <td><input type="password" name="password" placeholder="Mật khẩu" ></td>
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
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
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