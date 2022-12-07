
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['data'] !=  0) {
        $module = "'donhang'";
        $action = "'formnguoinhan'";
        $id_cungkhach = "'rd-cung-khach'";
        $id_khachkhac = "'rd-khach-khac'";
        $name_form = "'form-nguoinhan'";
        $result = $oContent->view_table("php_khachhang", "id=" . $_POST['data']);
        $rs = $result->fetch();


        $str .= '
               
              <td colspan="2"> <input style="width:48%;margin-top:5px;padding: 0 5px;" type="tel" name ="phone_kh" value="Số điện thoại: ' . $rs['phone_kh'] . '" readonly> 
                
              
                <input type="text" style="width:48%;margin-top:5px; padding: 0" name ="address_kh" value="Địa chỉ: ' . $rs['address_kh'] . '" readonly>  
                
                <input type="text" style="width:48%;margin-top:5px;padding: 0 5px" name ="address_kh" value="Tên công ty: ' . $rs['ten_congty'] . '" readonly>  
                <input type="text" style="width:48%;margin-top:5px ;padding: 0" name ="address_kh" value="Mã số thuế: ' . $rs['masothue'] . '" readonly> 
                <input type="text" style="width:48%;margin-top:5px;padding: 0 5px" name ="address_kh" value="CMND/CCCD: ' . $rs['cmnd'] . '" readonly> 
                <div style="width:100%">
                    <input type="radio" style="margin-top:30px;width:3%;" id="rd-cung-khach" name ="rd-info-khach"  value="cungkhach"> <label for="rd-cung-khach">Giao cùng khách</label>
                    <input type="radio" style="margin-top:5px;width:3%;" id="rd-khach-khac" name ="rd-info-khach" value="khachkhac" ><label for="rd-khach-khac">Khách khác</label>
                </div>
                </td>
             
              <script>
                $( function() {
                    $("input[type=radio][name=rd-info-khach]").on("change", function() {
                        if(this.value == "cungkhach")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_cungkhach . ',' . $name_form . ',' . $_POST['data'] . ');
                           
                        }
                        else if(this.value == "khachkhac")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_khachkhac . ',' . $name_form . ',' . $_POST['data'] . ');
                        }
                        
                    });
                });
              </script>
           
         ';



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
