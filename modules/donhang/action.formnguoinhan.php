<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $module = "'donhang'";
        $action = "'formhinhthucthanhtoan'";
        $id_thanhtoanbangcuoc = "'rd-thanhtoanbangcuoc'";
        $id_thanhtoannhapcuoc = "'rd-thanhtoannhapcuoc'";
        $name_form = "'form-hinhthucthanhtoan'";
        $idSelect = "'thanhtoan_select'";
    $result = $oContent->view_table("php_khachhang", "id=" . $_POST['data2']);
    $rs = $result->fetch();
    if ($_POST['data'] == "cungkhach") {


        $str = '
                 
        <td colspan = "2">
            <div class="input-formnguoinhan">
                <label>Mô tả hàng hóa: * </label> <input type="text" name="loaihang" required><br>
            </div>
       
            
          
      
           
        
            <div class="input-formnguoinhan">
                <label>Trọng lượng hàng hóa: * </label> <input type="text" name="trongluong_hanghoa" placeholder="Nhập theo giá trị kg. VD: 1500.5kg" required><br>
            </div>
           
            <div class="input-formnguoinhan">
                <label>Địa chỉ nhận hàng: * </label> <input type="text" name="diachi_nhanhang" value="" required><br>
            </div>
            
            <div class="input-formnguoinhan">
                <label>Thời gian nhận hàng: * </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang"  required>
                <label for="gio_nhanhang" class="time_input">Giờ: * </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang"  required>
                <label class="time_input">Phút: * </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59"  required>
            </div>
            <div class="input-formnguoinhan">
                <label>Địa chỉ giao hàng: * </label> <input type="text" name="diachi_giaohang" value="" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Thời gian giao hàng: * </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang"  required>
                <label for="gio_nhanhang" class="time_input">Giờ: * </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang"  required>
                <label class="time_input">Phút: * </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00"  required>
            </div>
            <div class="input-formnguoinhan">
                <label>Tên người nhận: * </label> <input type="text" name="ten_nguoinhan"  value="" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Số điện thoại người nhận: * </label> <input type="tel" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
            </div>
          
            <div class="input-formnguoinhan">
                
                <div class="select_filter">
                            <div class="card_all">
                                <select name="thanhtoan_select" id="thanhtoan_select"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                                    <option value="0">---Chọn hình thức thanh toán---</option>
                                    <option value="thanhtoantienmat">Thanh toán bằng tiền mặt</option>
                                    <option value="thanhtoancongno">Ghi vào công nợ khách hàng</option>
                                </select>
                            </div>
                </div>
                <br>
            </div>
            <div class="input-formnguoinhan">
            <input type="radio"  id="rd-thanhtoanbangcuoc" name ="rd-hinhthucthanhtoan"  value="thanhtoanbangcuoc"> <label for="rd-thanhtoanbangcuoc" id="label-radio">Dùng bảng cước mặc định</label>
            <input type="radio"  id="rd-thanhtoannhapcuoc" name ="rd-hinhthucthanhtoan" value="thanhtoannhapcuoc" ><label for="rd-thanhtoannhapcuoc" id="label-radio">Tự nhập giá cước</label><br>
            </div>

       
       
        </td>
                     
                     
                    
                    
                <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });
                    $( "#datepicker_2" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });

                    $("input[type=radio][name=rd-hinhthucthanhtoan]").on("change", function() {
                       
                        if(this.value == "thanhtoanbangcuoc")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoanbangcuoc . ',' . $name_form . ');
                        
                        }
                        else if(this.value == "thanhtoannhapcuoc")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoannhapcuoc . ',' . $name_form . ');
                        }
                        
                    });
           

                });
                </script>
        ';
    } elseif ($_POST['data'] == "khachkhac") {
        $str = '
                    <td colspan = "2">
                    <div class="input-formnguoinhan">
                        <label>Mô tả hàng hóa: *</label> <input type="text" name="loaihang" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                    <label>Số lượng hàng hóa: *</label> <input type="text"   name="soluong_hanghoa" placeholder="Nhập số lượng hàng hóa" required>
                  
                       
                
                </div>
                    <div class="input-formnguoinhan">
                        <label>Trọng lượng hàng hóa: *</label> <input type="text" name="trongluong_hanghoa" placeholder="Nhập theo giá trị kg. VD: 1500.5kg" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Địa chỉ nhận hàng: *</label> <input type="text" name="diachi_nhanhang" value="" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Thời gian nhận hàng:* </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang"  required>
                        <label for="gio_nhanhang" *class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang"  required>
                        <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59"  required>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Địa chỉ giao hàng: *</label> <input type="text" name="diachi_giaohang"  required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Thời gian giao hàng: *</label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang"  required>
                        <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang"  required>
                        <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00"  required>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Tên người nhận: *</label> <input type="text" name="ten_nguoinhan"   required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Số điện thoại người nhận: *</label> <input type="tel"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
                    </div>
                   
                    <div class="input-formnguoinhan">
                        
                        <div class="select_filter">
                                    <div class="card_all">
                                        <select name="thanhtoan_select" id="thanhtoan_select"  onchange="return onchangeDateSelect2(' . $module . ',' . $action . ',' . $idSelect . ',' . $name_form . ');">
                                            <option value="0">---Chọn hình thức thanh toán---</option>
                                            <option value="thanhtoantienmat">Thanh toán bằng tiền mặt</option>
                                            <option value="thanhtoancongno">Ghi vào công nợ khách hàng</option>
                                        </select>
                                    </div>
                        </div>
                        <br>
                    </div>
                    <div class="input-formnguoinhan">
                    <input type="radio"  id="rd-thanhtoanbangcuoc" name ="rd-hinhthucthanhtoan"  value="thanhtoanbangcuoc"> <label for="rd-thanhtoanbangcuoc" id="label-radio">Dùng bảng cước mặc định</label>
                    <input type="radio"  id="rd-thanhtoannhapcuoc" name ="rd-hinhthucthanhtoan" value="thanhtoannhapcuoc" ><label for="rd-thanhtoannhapcuoc" id="label-radio">Tự nhập giá cước</label><br>
                    </div>

            
            
                </td>
                <script>
                $( function() {
                  
                    $( "#datepicker" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });
                    $( "#datepicker_2" ).datepicker({
                        dateFormat: "dd/m/yy"
                    });

                    $("input[type=radio][name=rd-hinhthucthanhtoan]").on("change", function() {
                       
                        if(this.value == "thanhtoanbangcuoc")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoanbangcuoc . ',' . $name_form . ');
                        
                        }
                        else if(this.value == "thanhtoannhapcuoc")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoannhapcuoc . ',' . $name_form . ');
                        }
                        
                    });
                   
                });
                </script>
        ';
    } else {
        die(json_encode(
            array(

                'status' => 0,
                'msg' => 'Lỗi hệ thống',
            )
        ));
    }
    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}
