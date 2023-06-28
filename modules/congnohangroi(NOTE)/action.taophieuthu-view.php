<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'phieuthu'";
    $add = "'add'";
    $frm = "'frmAddphieuthu'";
    $img_file = "'img_file'";
    





    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_congnohangroi", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    //xử lý thông tin khách hàng
    $result_kh = $oContent->view_table("php_khachhang", "`id`=" . $rs['id_khachhang'] . "  LIMIT 1");
    $rs_kh = $result_kh->fetch();
    $sotien_conlai = $rs['tong_thanhtoan'] - $rs['sotien_thanhtoan'];
    $sotien_conlai = number_format($sotien_conlai, 0, ',', '.') . "";
    $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddphieuthu" id="frmAddphieuthu" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
              
            <table class="table-input">
            <tbody>
               <tr>
                   <td class="td-first">Tên loại thu</td>
                    <td>
                       <select name="loai_thu" id="loai_thu">
                       
                       
                           <option value="1" >Thu công nợ khách hàng</option>
                       
                       </select>
                   </td>
               </tr>
                <tr>
                    <td class="td-first">Họ tên người thu</td>
                   <td><input type="text"  name="name_nguoithu" value="'.$rs_kh['name_kh'].'"  placeholder="Họ tên người thu" required></td>
                </tr>
                 <tr>
                    <td class="td-first">Địa chỉ người thu</td>
                   <td><input type="text"  name="diachi_nguoithu" value="'.$rs_kh['address_kh'].'"  placeholder="Địa chỉ người thu" required></td>
                </tr>
                 <tr>
                    <td class="td-first">Số điện thoại người thu</td>
                   <td><input type="text" value="'.$rs_kh['phone_kh'].'" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="phone_nguoithu"  placeholder="Số điện thoại người thu" required></td>
                </tr>
                <tr>
                    <td class="td-first">Số tiền thu</td>
                   <td><input type="text" value="'.$sotien_conlai.'" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="sotien_thu"  placeholder="Số tiền thu" required></td>
                </tr>
                 <tr>
                    <td class="td-first">Số tiền bằng chữ</td>
                   <td><input type="text"   name="sotien_bangchu"  placeholder="Số tiền bằng chữ" required></td>
                </tr>
                <tr>
                    <td class="td-first">Nội dung thu</td>
                   <td><input type="text" value="Thu tiền công nợ khách hàng"  name="noidung_thu"  placeholder="Nội dung thu" required></td>
                </tr>
                
                 <tr>
                    <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                   <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
                </tr>
                <tr>
                    <td class="td-first">Hình file đính kèm(nếu có)</td>
                   <td><input type="file"  name="pdf_file[]" id="pdf_file" multiple accept= ".pdf, .docx, .doc"></td>
                </tr>
               
            </tbody>
            </table>
                   
            <input type="hidden" value="'.$rs['id_security'].'"  name="id_congnohangroi" >
                   <div class="btn-submit">
                       
                       <button type="submit" class="submit">Thêm</button>
                       <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                   </div>
               </form>
        </div>
        <script>
        $( "#datepicker" ).datepicker({
            dateFormat: "dd/m/yy"
        });
        </script>
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
