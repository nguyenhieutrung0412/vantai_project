<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  
    $module = "'khachhang'";
    $add = "'add'";
    $frm = "'frmAddKhachHang'";
    $img_file = 1;
 

   



    
      
    
        $str = '
        <div class="pop-up">
        <h3>Thêm mới</h3>
        <form name="frmAddKhachHang" id="frmAddKhachHang" method="post" onsubmit ="return add_not_reload('.$module.','.$add.','.$frm.',1)"  enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Họ và tên *</td>
                            <td>
                                <input type="text" name="name"  placeholder="Name"  required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Số điện thoại *</td>
                            <td>
                                <input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone"  placeholder="Số điện thoại" required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Địa chỉ *</td>
                            <td>
                                <input type="text" name="address"  placeholder="Địa chỉ" required>
                            </td>
                        </tr>
                     
                         <tr>
                            <td class="td-first">Tên công ty </td>
                            <td>
                            <input type="text" name="ten_congty"  placeholder="Tên công ty(Nếu có)" >
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Mã số thuế</td>
                            <td>
                            <input type="text" name="masothue"  placeholder="Mã số thuế(nếu có)" >
                            </td>
                        </tr>
                         
                       
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
                <button type="submit" class="submit">Thêm</button>
                <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
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