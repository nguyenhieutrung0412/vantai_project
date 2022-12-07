<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $module = "'donhangroi'";
    $add = "'add-donhangcon'";
    $frm = "'frmAdddonhangcon'";
    $img_file = 1;

    $action_search_kh = "'formresultkh'";
    $name_input_search = "'search_sdt'";
    $name_form_search = "'form_donhang'";




    $action_thanhtoan = "'formhinhthucthanhtoan'";
    $id_thanhtoanbangcuoc = "'rd-thanhtoanbangcuoc'";
    $id_thanhtoannhapcuoc = "'rd-thanhtoannhapcuoc'";
    $name_form = "'form-hinhthucthanhtoan'";

    $result = $oContent->view_table("php_khachhang");
    while ($rs = $result->fetch()) {
        $khachhang .= ' <option value="' . $rs['id'] . '" >' . $rs['name_kh'] . '</option>';
    }



    $str = '
        <div class="pop-up">

            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAdddonhangcon" id="frmAdddonhangcon" method="post" onsubmit = "return add(' . $module . ',' . $add . ',' . $frm . ',1)"  enctype="multipart/form-data">
            <table class="table-input">
            <tbody>
                <tr>
                    <td colspan = "2">
                        <div class="input-formsearch">
                            <label>Khách hàng: </label>
                            <input class="search_input" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="search_sdt" id="search_sdt" placeholder ="Nhập 4 số điện thoại cuối để tìm khách hàng"> 
                            <div class="result_search">
                                <ul>
                                 
                                </ul>
                            </div>
                        </div>
                    </td>
                  
                </tr>
                <tr class="form_donhang">
                   
                </tr> 
                <tr   class = "info_kh">

                </tr>
                <tr   class = "form-noinhan">

                </tr>
                <tr   class = "form-noigiao">

                </tr>
                <tr class="form-nguoinhan">
                <td colspan = "2">
                <div class="input-formnguoinhan">
                    <label>SDT người gửi: </label> <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="sdt_nguoiguikhac" placeholder ="Nhập số điện thoại người gửi(Nếu là người gửi khác)"><br>
             </div>
            <div class="input-formnguoinhan">
                <label>Mô tả loại hàng: </label> <input type="text" name="loaihang" required><br>
            </div>
             <div class="input-formnguoinhan">
                <label>Số lượng hàng hóa: </label> <input type="text" name="soluong_hanghoa" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Trọng lượng hàng hóa (kg): </label> <input type="text" name="trongluong_hanghoa" placeholder="VD: 1,200.5" required><br>
            </div>
            
            <div class="input-formnguoinhan">
                <label>Tên người nhận: </label> <input type="text" name="ten_nguoinhan"   required><br>
            </div>
           
            <div class="input-formnguoinhan">
                <label>Thời gian nhận hàng: </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang"  required>
                <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang"  required>
                <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59"  required>
            </div>
            
           
            <div class="input-formnguoinhan">
                <label>Thời gian giao hàng dự kiến: </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang"  required>
                <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang"  required>
                <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00"  required>
            </div>
            <div class="input-formnguoinhan">
                <label>Số điện thoại người nhận: </label> <input type="tel"" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
            </div>
           
            <div class="input-formnguoinhan">
                
                <div class="select_filter">
                            <div class="card_all">
                                <select name="thanhtoan_select" id="thanhtoan_select"  >
                                    <option value="0">---Bên thanh toán---</option>
                                    <option value="nguoiguitra">Người gửi thanh toán</option>
                                    <option value="nguoinhantra">Người nhận thanh toán</option>
                                </select>
                            </div>
                </div>
                <div class="select_filter">
                    <div class="card_all">
                        <select name="phuongthuc_select" id="phuongthuc_select">
                            <option value="0">---Phương thức thanh toán---</option>
                            <option value="thanhtoantienmat">Thanh toán tiền mặt</option>
                            <option value="thanhtoanchuyenkhoan">Thanh toán chuyển khoản</option>
                            <option value="thanhtoancongno">Thanh toán công nợ</option>
                        </select>
                    </div>
                </div>
                <br>
            </div>

           
            

       
       
        </td>
                </tr>
                <tr class="form-hinhthucthanhtoan">
                    <td class="td-first">Phí vận chuyển: </td>
                    <td><input type="text" name="phivanchuyen" placeholder="VD: 150,000 or 150.000" required></td>
                </tr>
                <tr class="form-hinhthucthanhtoan">
                    <td class="td-first">Ghi chú: </td>
                    
                    <td><textarea id="ghichu" name="ghichu" rows="4" cols="50" style="width:99%">
                    
                    </textarea>
                    </td>
                </tr>
                

                </tbody> 
                </table>
                
           
               
               
                <div class="status">
                </div>
                <input type="hidden" name="id_donhang" value="' . $_POST['id'] . '" />
                <div class="btn-submit">
                    <button type="submit" class="submit">Tạo đơn hàng</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                    
                </div>
            </form>
        </div>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            <script>
                    $(function() {
                        $( "#datepicker").datepicker({
                            dateFormat: "dd/m/yy"
                        });
                  
                        $( "#datepicker_2").datepicker({
                            dateFormat: "dd/m/yy"
                        });

                        $("input[type=radio][name=rd-hinhthucthanhtoan]").on("change", function() {
                        
                            if(this.value == "thanhtoanbangcuoc")
                            {
                                onchangeDateSelect2(' . $module . ',' . $action_thanhtoan . ',' . $id_thanhtoanbangcuoc . ',' . $name_form . ');
                            
                            }
                            else if(this.value == "thanhtoannhapcuoc")
                            {
                                onchangeDateSelect2(' . $module . ',' . $action_thanhtoan . ',' . $id_thanhtoannhapcuoc . ',' . $name_form . ');
                            }
                            
                        });
    

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
