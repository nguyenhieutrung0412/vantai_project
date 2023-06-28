<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   

    $result = $oContent->view_table("php_donvi_suachua");
    

    $module = "'theodoisuachua'";
    $action = "'getvalue_search'";
    $id_input_name = "'data_donvisearch'";
    $id_input_id = "'data_iddonvisearch'";
   // $update = "'search_fillter'";
    $frm = "'frmtaixesearch'";
    $img = 1;
    $stt = "'1'";

   

    while($rs = $result->fetch())
    {
        $biensoxe = "'".$rs['ten_donvi']."'";
      
        $str_loaichi .= '<label for="donvi'.$rs['id'].'"><input type="checkbox" name="id_donvi[]" value="'.$rs['id'].'" id="donvi'.$rs['id'].'" >'.$rs['ten_donvi'].'</label>';
    }
    
  
    
    


        $str = '
        <div class="pop-up">
        <h3>Lọc kết quả theo tên đơn vị trong tháng '.$_POST['thang'].' năm '.$_POST['nam'].'</h3>
        <form name="frmtaixesearch" id="frmtaixesearch" method="post" onsubmit = "return getvalue_search1('.$module.','.$action.','.$frm.','.$id_input_id.','.$id_input_name.','.$stt.','.$img.')"  enctype="multipart/form-data">
        <div class="checkbox-popup">
        '.$str_loaichi.'
        </div>
        <input type="hidden" name="thang" value="'.$_POST['thang'].'">
        <input type="hidden" name="nam" value="'.$_POST['nam'].'" >

        
        <div class="btn-submit">
            <button type="submit" class="submit">Chọn</button>  
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
