<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   

    $result = $oContent->view_table("php_donhangroi_s ","id_donhangroi = 0");
    $count = $result->num_rows();

    $module = "'donhangroi'";
    
    $action = "'add-listdonhang'";
    $frm = "'frmdonhang'";
    $img = 1;
    $id_input_id = "'data_id'";
    $id_input_name = "'data_ten'";
   
   
    while($rs = $result->fetch())
    {
     
      
        $str_list .= '
            <tr>
                <td><input type="checkbox" name="id[]" value="'.$rs['id'].'"></td>
             
                <td>'.$rs['loaihang'].'</td>
                <td>'.$rs['soluong_hanghoa'].'</td>
                <td>'.$rs['trongluong_hanghoa'].'</td>
                <td>'.$rs['diachi_nhanhang'].'</td>
                <td>'.$rs['diachi_giaohang'].'</td>
                <td>'.$rs['thoigian_giaohang'].'</td>
                <td>'.$rs['tuyenduong_giaohang'].'</td>
                
                
               
            </tr>
        ';
    }
    
  
    
    
    if($count > 0)
    {

        $str = '
        <div class="pop-up">
        <h3>Danh sách đơn hàng rời</h3>
        <form name="frmdonhang" id="frmdonhang" method="post" onsubmit = "return add(' . $module . ',' . $action . ',' . $frm . ','.$img.')"  enctype="multipart/form-data">
        <div class="table">
        <table >
            <thead>
            <tr  class="title-table">
            
                <th></th>
                <th>Loại hàng</th>
                <th>Số lượng hàng</th>
                <th>Trọng lượng hàng</th>
                <th>Địa chỉ nhận</th>
                <th>Địa chỉ giao</th>
                <th>Thời gian giao</th>
                <th>Tuyến đường giao</th>
                </tr>
            </thead>
            <tbody>
            '. $str_list.'
            </tbody>        
        </table >
        <div>
        <input type="hidden" name="id_donhangroi" value="'.$_REQUEST['stt'].'">
        
        <div class="btn-submit">
            
            <button type="submit" class="submit">Thêm</button>
            <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            
        </div>
        
    </form>
    <script>

    </script>
    </div>
        ';
    }
    else{
        $str = '  <div class="pop-up">
        <h3 class="color-0">Không có đơn nào trong danh sách</h3>
       
        <div class="btn-submit">
            
    
        <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
        
    </div>
    </div>'
        ;
    }

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
