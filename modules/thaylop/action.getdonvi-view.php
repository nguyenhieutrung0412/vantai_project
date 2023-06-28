<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   

    $result = $oContent->view_table("php_donvi_suachua");
    

    $module = "'thaylop'";
    $update = "'update-upload-img'";
    $frm = "'frmloaiphi'";
    $img = 1;
    $id_input_id = "'id_donvi'";
    $id_input_name = "'ten_donvi'";
   
    while($rs = $result->fetch())
    {
        $biensoxe = "'".$rs['ten_donvi']."'";
      
        $str_loaichi .= '<label for="donvi'.$rs['id'].'"><input type="checkbox" id="donvi'.$rs['id'].'" onclick="getValue_2('.$id_input_id.','.$id_input_name.','.$biensoxe.','.$rs['id'].','.$_REQUEST['stt'].')">'.$rs['ten_donvi'].'</label>';
    }
    
  
    
    


        $str = '
        <div class="pop-up">
        <h3>Danh sách đơn vị sửa chữa</h3>
        <form name="frmloaiphi" id="frmloaiphi" method="post" onsubmit = "return add_not_reload(' . $module . ',' . $update . ',' . $frm . ','.$img.')"  enctype="multipart/form-data">
        <div class="checkbox-popup">
        '.$str_loaichi.'
        </div>
        
      
        
        <div class="btn-submit">
            
            <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            
        </div>
        
    </form>
    <script>
   
    </script>
    </div>
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
