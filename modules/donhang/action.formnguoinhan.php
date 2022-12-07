<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhang'";
    $action = "'formhinhthucthanhtoan'";
    $id_thanhtoanbangcuoc = "'rd-thanhtoanbangcuoc'";
    $id_thanhtoannhapcuoc = "'rd-thanhtoannhapcuoc'";
    $name_form = "'form-hinhthucthanhtoan'";
    $result = $oContent->view_table("php_khachhang", "id=" . $_POST['data2']);
    $rs = $result->fetch();
    if ($_POST['data'] == "cungkhach") {


        $str = '
                 
        <td colspan = "2">
            <div class="input-formnguoinhan">
                <label>Loại hàng: </label> <input type="text" name="loaihang" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Tên người nhận: </label> <input type="text" name="ten_nguoinhan"  value="' . $rs['name_kh'] . '" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Địa chỉ nhận hàng: </label> <input type="text" name="diachi_nhanhang" value="' . $rs['address_kh'] . '" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Thời gian nhận hàng:: </label> <input type="text" id="datepicker" name="thoigian_nhanhang"  required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Địa chỉ giao hàng: </label> <input type="text" name="diachi_giaohang" value="' . $rs['address_kh'] . '" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Số điện thoại người nhận: </label> <input type="tel" value="' . $rs['phone_kh'] . '" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>CMND/CCCD: </label> <input type="text" value="' . $rs['cmnd'] . '"  name="cmnd-nguoinhan" required><br>
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
                        <label>Loại hàng: </label> <input type="text" name="loaihang" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Tên người nhận: </label> <input type="text" name="ten_nguoinhan"   required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Địa chỉ nhận hàng: </label> <input type="text" name="diachi_nhanhang" value="' . $rs['address_kh'] . '" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Thời gian nhận hàng:: </label> <input type="text" id="datepicker" name="thoigian_nhanhang"  required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Địa chỉ giao hàng: </label> <input type="text" name="diachi_giaohang"  required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>Số điện thoại người nhận: </label> <input type="tel"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
                    </div>
                    <div class="input-formnguoinhan">
                        <label>CMND/CCCD: </label> <input type="text"   name="cmnd-nguoinhan" required><br>
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
