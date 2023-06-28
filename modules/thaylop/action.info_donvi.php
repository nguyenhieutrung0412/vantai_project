<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_thaylop", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
 
    $total = $result->num_rows();
  
    //xử lý tên tài xế
    $tx = $model->db->query("SELECT * FROM php_donvi_suachua WHERE id=" . $rs['id_donvisuachua'] . " LIMIT 1");
    $rs_tx = $tx->fetch();
  
    //lấy thông tin xe
   
    
    



    if($total==1){
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
            <h2>Thông tin đơn vị sữa chữa   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
            <div class="info">
                <form>
                <table class="table-input">
                <tbody>
                   <tr>
                   
                   <td class="td-first"><label for="">Mã đơn vị: </label></td>
                       <td>  <input type="text" value="'.$rs_tx['id'].'"  readonly> </td>
                   
                   </tr>
                   <tr>
                   
                        <td class="td-first"><label for="">Tên đơn vị: </label></td>
                        <td><input type="text" value="'.$rs_tx['ten_donvi'].'"  readonly></td>
                  
                    </tr>
                   <tr>
                   
                        <td class="td-first"><label for="">Số điện thoại đơn vị: </label></td>
                        <td><input type="text" value="'.$rs_tx['sdt'].'"  readonly></td>
                  
                    </tr>
                    <tr>
                   
                        <td class="td-first"><label for="">Địa chỉ: </label></td>
                        <td><input type="text" value="'.$rs_tx['dia_chi'].'"  readonly></td>
                    
                    </tr>
                   
                   
                    
                  
                    </tbody>
                    </table>
                    </form>
                </div>
                <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            
    ';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str
            )
           ));
    }else{
        die(json_encode(
            array(
                'status' => 0,
                'str' => '(0) Lỗi: Loại chi không được hoạt động'
            )
           ));
    }
}else{
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;