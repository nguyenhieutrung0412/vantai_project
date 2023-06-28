
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id'] !=  0) {
        //$module = "'donhang'";
        //$action = "'formnguoinhan'";
        $id_cungkhach = "'rd-cung-khach'";
        $id_khachkhac = "'rd-khach-khac'";
        //$name_form = "'form-nguoinhan'";

        $module = "'donhang'";
        $action = "'formhinhthucthanhtoan'";
        $id_thanhtoanbangcuoc = "'rd-thanhtoanbangcuoc'";
        $id_thanhtoannhapcuoc = "'rd-thanhtoannhapcuoc'";
        $id_thanhtoanhopdong = "'rd-thanhtoanhopdong'";
        $name_form = "'form-hinhthucthanhtoan'";
        $idSelect = "'thanhtoan_select'";
        $result = $oContent->view_table("php_khachhang", "id=" . $_POST['id']);
        $rs = $result->fetch();
    $back_up =' 
    <input type="radio" style="margin-top:30px;width:3%;" id="rd-cung-khach" name ="rd-info-khach"  value="cungkhach" checked> <label for="rd-cung-khach">Giao cùng khách</label>
    <input type="hidden" style="margin-top:5px;width:3%;" id="rd-khach-khac" name ="rd-info-khach" value="khachkhac" ><label for="rd-khach-khac">Khách khác</label>';
        $i = 1;
        $str .= '
               
              <td colspan="2"> 
              <input type="text" style="width:48%;margin-top:5px;padding: 0 " name ="name_kh" value="Tên: ' . $rs['name_kh'] . '" readonly>  
              <input style="width:48%;margin-top:5px;padding: 0 5px;" type="tel" name ="phone_kh" value="Số điện thoại: ' . $rs['phone_kh'] . '" readonly> 
                 <input type="hidden" style="width:48%;margin-top:5px;padding: 0 " name ="id_khachhang" value="' . $rs['id'] . '" readonly>  
              
                <input type="text" style="width:48%;margin-top:5px; padding: 0" name ="address_kh" value="Địa chỉ: ' . $rs['address_kh'] . '" readonly>  
                
                <input type="text" style="width:48%;margin-top:5px;padding: 0 5px" name ="address_kh" value="Tên công ty: ' . $rs['ten_congty'] . '" readonly>  
                <input type="text" style="width:48%;margin-top:5px ;padding: 0" name ="address_kh" value="Mã số thuế: ' . $rs['masothue'] . '" readonly> 
                
                <div style="width:100%">
                    
                   
                </div>
                <br>
                
                
               
               
                <div class="input-formnguoinhan">
                    <label>Địa chỉ lấy hàng: *</label> <input type="text" name="diachi_nhanhang" value="" required><br>
                </div>
                
                <div class="input-formnguoinhan">
                    <label>Thời gian lấy hàng: *</label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang"  required>
                    <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang"  required>
                    <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59"  required>
                </div>
                <div class="input-formnguoinhan">
                    <label>Địa chỉ giao hàng: *</label> <input type="text" name="diachi_giaohang" value="" required><br>
                </div>
                <div class="input-formnguoinhan">
                    <label>Thời gian giao hàng: *</label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang"  required>
                    <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang"  required>
                    <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00"  required>
                </div>
                <div class="input-formnguoinhan">
                    <label>Tên người nhận: *</label> <input type="text" name="ten_nguoinhan"  value="" required><br>
                </div>
                <div class="input-formnguoinhan">
                    <label>Số điện thoại người nhận: *</label> <input type="tel" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan" required><br>
                </div>
                <div class="input-formnguoinhan">
                <label>Mô tả hàng hóa: *</label> <input type="text" name="loaihang" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Số lượng hàng hóa: *</label> <input type="text"  name="soluong_hanghoa" placeholder="Nhập số lượng hàng hóa" required>
              
                  
            
            </div>
        
            <div class="input-formnguoinhan">
                <label>Trọng lượng hàng hóa: *</label> <input type="text" name="trongluong_hanghoa" placeholder="Nhập theo giá trị kg. VD: 1500.5kg" required><br>
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
                <input type="radio"  id="rd-thanhtoannhapcuoc" name ="rd-hinhthucthanhtoan" value="thanhtoannhapcuoc" ><label for="rd-thanhtoannhapcuoc" id="label-radio">Tự nhập giá cước</label>
                <input type="radio"  id="rd-thanhtoanhopdong" name ="rd-hinhthucthanhtoan" value="'.$_POST['id'].'" ><label for="rd-thanhtoanhopdong" id="label-radio">Giá từ hợp đồng</label><br>
                </div>
    
           
           
            
                         
                         
                        
                        
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
                            else{
                                onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoanhopdong . ',' . $name_form . ');
                            }

                            
                        });
               
    
                    });
                    </script>

                </td>
             
              <script>
                $( function() {
                    $("input[type=radio][name=rd-info-khach]").on("change", function() {
                        if(this.value == "cungkhach")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_cungkhach . ',' . $name_form . ',' . $_POST['id'] . ');
                           
                        }
                        else if(this.value == "khachkhac")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_khachkhac . ',' . $name_form . ',' . $_POST['id'] . ');
                        }
                        else{
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_thanhtoanhopdong . ',' . $name_form . ');
                        }
                        
                    });
                });
              </script>
           
         ';
         if($i == 1)
         {
            
         }



        die(json_encode(
            array(

                'status' => 1,
                'str' => $str,

            )
        ));
    } else {
        $str = 'Vui lòng chọn tên khách hàng';

        die(json_encode(
            array(

                'status' => 0,
                'str' => $str
            )
        ));
    }
}
