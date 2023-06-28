<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   

    $result = $oContent->view_table("php_doixe");
    

    $module = "'donhangroi'";
    $update = "'update-upload-img'";
    $frm = "'frmloaiphi'";
    $img = 1;
    $id_input_id = "'idxe'";
    $id_input_name = "'biensoxe'";
   
    while($rs = $result->fetch())
    {
        $biensoxe = "'".$rs['biensoxe']."'";
      
        $str_loaichi .= '<label for="xe'.$rs['id'].'"><input type="checkbox" id="xe'.$rs['id'].'" onclick="getValue_2('.$id_input_id.','.$id_input_name.','.$biensoxe.','.$rs['id'].','.$_REQUEST['stt'].')">'.$rs['biensoxe'].'</label>';
    }
    
  
    
    


        $str = '
        <div class="pop-up">
        <h3>Danh sách xe</h3>
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
