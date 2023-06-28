<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhang'";
    $action = "'formhinhthucthanhtoan2'";
    $name_form = "'form-soluonghang'";
    $idSelect = "'donvi_select'";
    if ($_POST['data'] == "thanhtoanbangcuoc") {

        $result = $oContent->view_table("php_banggiacuoc_tuyen");
        while ($rs = $result->fetch()) {
            $option_bangcuoc .= '<option value="' . $rs['id'] . '">' . $rs['ten_tuyen'] . ' - ' . $rs['so_tien'] . '(' . $rs['dvt'] . ') - Lương chuyến: ' . $rs['luong_chuyen'] . '</option>';
        }
        $str = '
       
        
        <td colspan ="2">
            <div class="select_filter">
            <div class="card_all">
                <select name="phivanchuyen_select" id="phivanchuyen_select" >
                    <option value="0">---Chọn giá cước vận chuyển---</option>
                   ' . $option_bangcuoc . '
                </select>
            </div>
        </div>
        </td>
        ';
    } elseif ($_POST['data'] == "thanhtoannhapcuoc") {
        $str = '
        <td colspan ="2">
            <div class="input-formnguoinhan">
                <label>Nhập tên tuyến:* </label> <input type="text" name="ten_tuyen" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Nhập đơn giá:* </label> <input type="text" name="phivanchuyen"  placeholder="Số tiền VD: 1.500.000 or 1,500,000 (Đơn giá / 1 tấn(1000Kg)" required><br>
            </div>
            <div class="input-formnguoinhan">
                <label>Nhập lương chuyến:* </label> <input type="text" name="luong_chuyen" placeholder="Lương chuyến" required><br>
            </div>
        </td>
           
        ';
    }
   
    else {
        $result = $oContent->view_table("php_banggia_hopdong","id_khachhang =" .$_POST['data']);
        $total = $result->num_rows();
        if($total != 0)
        {
            while ($rs = $result->fetch()) {
                $option_bangcuoc .= '<option value="' . $rs['id'] . '">' . $rs['ten_tuyen'] . ' - ' . $rs['don_gia'] .  '- Lương chuyến: ' . $rs['luong_chuyen'] . '</option>';
            }
            $str = '
           
            
            <td colspan ="2">
                <div class="select_filter">
                <div class="card_all">
                    <select name="phivanchuyen_hopdong" id="phivanchuyen_hopdong" >
                        <option value="0">---Chọn giá cước hợp đồng---</option>
                       ' . $option_bangcuoc . '
                    </select>
                </div>
            </div>
            </td>
            ';
        }
        else{
            $str = '<td colspan ="2"><p class="color-0">Khách hàng chưa có bảng giá hợp đồng!!!</p> </td>';
        }
       
    }
    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}
