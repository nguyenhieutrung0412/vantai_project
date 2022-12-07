
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id'] !=  0) {
        $module = "'donhangroi'";
        $action = "'formdiachinhan'";
        $id_nhankho = "'rd-nhankho'";
        $id_nhandiachi = "'rd-nhandiachi'";
        $name_form = "'form-noinhan'";
        $result = $oContent->view_table("php_khachhang", "id=" . $_POST['id']);
        $rs = $result->fetch();


        $str .= '
               
              <td colspan="2"> 
                <input type="text" style="width:48%;margin-top:5px;padding: 0 " name ="name_kh" value="Tên: ' . $rs['name_kh'] . '" readonly>  
                <input style="width:48%;margin-top:5px;padding: 0 5px;" type="tel" name ="phone_kh" value="Số điện thoại: ' . $rs['phone_kh'] . '" readonly> 
             
                <input type="hidden" style="width:48%;margin-top:5px;padding: 0 " name ="id_khachhang" value="' . $rs['id'] . '" readonly>  
                <input type="text" style="width:48%;margin-top:5px;padding: 0" name ="address_kh" value="Địa chỉ: ' . $rs['address_kh'] . '" readonly>  
                
                <input type="text" style="width:48%;margin-top:5px;padding: 0 5px" name ="address_kh" value="Tên công ty: ' . $rs['ten_congty'] . '" readonly>  
                <input type="text" style="width:48%;margin-top:5px;padding: 0 " name ="address_kh" value="Mã số thuế: ' . $rs['masothue'] . '" readonly> 
                <input type="text" style="width:48%;margin-top:5px;padding: 0 5px" name ="address_kh" value="CMND/CCCD: ' . $rs['cmnd'] . '" readonly> 
                <div style="width:100%">
                    <input type="radio" style="margin-top:30px;width:3%;" id="rd-nhankho" name ="rd-info-khach"  value="nhanhangtaikho"> <label for="rd-nhankho">Nhận hàng tại kho</label>
                    <input type="radio" style="margin-top:5px;width:3%;" id="rd-nhandiachi" name ="rd-info-khach" value="nhanhangtheodiachi" ><label for="rd-nhandiachi">Nhận hàng theo địa chỉ</label>
                </div>
                </td>
                <script>
                $( function() {
                    $("input[type=radio][name=rd-info-khach]").on("change", function() {
                        
                        if(this.value == "nhanhangtaikho")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_nhankho . ',' . $name_form . ');
                           
                        }
                        else if(this.value == "nhanhangtheodiachi")
                        {
                            onchangeDateSelect2(' . $module . ',' . $action . ',' . $id_nhandiachi . ',' . $name_form . ');
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
