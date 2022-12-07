<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

   

//     encode(12_____12)_____676 => 23456rtyundfhjt97864
//    $arr = explode('_____',decode($id));
//    $id = $arr[0];
//    $phone = $arr[1];
    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_nhansu", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();

    $module = "'nhan-su'";
    $update = "'update'";
    $frm = "'frmUpdateNhanSu'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
            <h3>Update</h3>
            <form name="frmUpdateNhanSu" id="frmUpdateNhanSu" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
                
            <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Họ và tên</td>
                    <td> <input type="text" name="name"  placeholder="Name" value="'.$rs['name'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Ngày tháng năm sinh</td>
                    <td> <input type="date" name="dateofbirth"  placeholder="Ngày tháng năm sinh" value="'.$rs['dateofbirth'].'" required></td>
                </tr>
                 <tr>
                    <td class="td-first">Địa chỉ</td>
                    <td> <input type="text" name="diachi"  placeholder="Địa chỉ" value="'.$rs['diachi'].'" required></td>
                </tr>
                 <tr>
                    <td class="td-first">CMND</td>
                    <td> <input type="text" name="cmnd"  placeholder="CMND" value="'.$rs['cmnd'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Số điện thoại</td>
                    <td>   <input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone" value="'.$rs['phone'].'"  placeholder="Số điện thoại" required></td>
                </tr>
                <tr>
                    <td class="td-first">Chức vụ</td>
                    <td>
                        <input list="list_chucvu" name="list_chucvu" value="'.$rs['position'].'">
                        <datalist id="list_chucvu">
                        <!--BASIC list_chucvu-->
                            <option value="{list_chucvu.chuc_vu} ">
                        <!--BASIC list_chucvu-->
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td class="td-first">Ngày vào làm</td>
                    <td> <input type="date" name="dateofcompany"  placeholder="Ngày vào làm" value="'.$rs['dateofcompany'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Tiền lương</td>
                    <td> <input type="text" name="luong" onchange="return formatTienTe(this.value)" placeholder="Tiền lương"value="'.$rs['luong_nhansu'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Phụ cấp</td>
                    <td> <input type="text" name="phu_cap" onchange="return formatTienTe(this.value)" placeholder="Phụ cấp"value="'.$rs['phu_cap'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Số tài khoản</td>
                    <td> <input type="text" name="stk"  placeholder="Số tài khoản"value="'.$rs['stk'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Tên ngân hàng</td>
                    <td> <input type="text" name="ngan_hang"  placeholder="VD: VCB,MB..."value="'.$rs['ngan_hang'].'" required></td>
                </tr>
                <tr>
                    <td class="td-first">Mật khẩu</td>
                    <td>  <input type="password" name="password"  placeholder="Mật khẩu" ></td>
                </tr>
            </tbody>
            </table>
                <input type="hidden" name="id" value="'.$rs['id_security'].'">
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Update</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
        
        </div>';
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