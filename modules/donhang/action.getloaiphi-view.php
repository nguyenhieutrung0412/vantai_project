<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   

    $result = $oContent->view_table("php_loaichi", "`phi_van_tai`= 1 ");
    

    $module = "'donhang'";
    $update = "'update-upload-img'";
    $frm = "'frmloaiphi'";
    $img = 1;
   
   
    while($rs = $result->fetch())
    {
        $name_loaiphi = "'".$rs['loai_chi']."'";
        $name_action = "'".$_REQUEST['action']."'";     
        $str_loaichi .= '<label for="loaiphi'.$rs['id'].'"><input type="checkbox" id="loaiphi'.$rs['id'].'" onclick="getValue('.$name_loaiphi.','.$rs['id'].','.$_REQUEST['stt'].','.$name_action.')">'.$rs['loai_chi'].'</label>';
    }
    
  
    
    


        $str = '
        <div class="pop-up">
        <h3>Phí vận tải</h3>
        <form name="frmloaiphi" id="frmloaiphi" method="post" onsubmit = "return add_not_reload(' . $module . ',' . $update . ',' . $frm . ','.$img.')"  enctype="multipart/form-data">
        <div class="checkbox-popup">
        '.$str_loaichi.'
        </div>
        
      
        
        <div class="btn-submit">
            
            <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            
        </div>
        
    </form>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: "dd/m/yy"
        });
        $( "#datepicker_2" ).datepicker({
            dateFormat: "dd/m/yy"
        });

    });
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
