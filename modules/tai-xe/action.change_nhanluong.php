<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if ($_POST['data'] == "2") {

     
        $str = '
       
        <td class="td-first">Tỉ lệ hoa hồng *</td>
                <td><input autocomplete="off" type="text" name="tile_hoahong" placeholder="Nhập tỉ lệ phần trăm VD: 1.5"   value="0"  ></td>
        ';
    } 
    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}
