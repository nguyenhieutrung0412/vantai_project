<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_congnokhachhang", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    $module = "'congnokhachhang'";
    $update = "'update-chot'";
    $frm = "'frmUpdatechotcongno'";
    $img_file = "'img_file'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

      //lấy danh sách hình ảnh nếu có
      $kt_img = $oContent->view_table("php_images","type = 'php_congnohangtrongoi' AND type_id = '".$id."'");
      $total_img = $kt_img->num_rows();
      $p=1;

      while($ds = $kt_img->fetch()){
          $code_pics = $oClass->id_encode($ds['id']);
          $code_act = "'".$code_pics."'";
          
         
          $action = "'delete_img'";
          if($p%4==0){$ds['fix'] = ' fix';}
          
          $img .= '
          <li class="'.$ds['fix'].'" id="pics_'.$code_pics.'">
  
          <a class="colorboxv group1" style="cursor:zoom-in"  href="data/upload/images/'.$ds['file_name'].'">
              <img  class="img-responsive"src="data/upload/images/'.$ds['file_name'].'">
          </a>
          <span class="color-0" onclick="return deleteImage('.$module.','.$action.','.$code_act.')"><i class="fa fa-trash "></i> Xóa</span></li>
          
          ';
          
          $p++;
      }
      if($total_img>0){
          $hinhanh = '<tr>
                  <td colspan="2">
                  
                  <div class="demo-gallery">
                      <ul class="picslist list-unstyled row"  id="lightgallery">
                      
                      '.$img.'
                      
                      </ul>
                  </div>
                  
                  </td>
              </tr>';
      }


    if ($total == 1) {

        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật công nợ</h3>
         <form name="frmUpdatechotcongno" id="frmUpdatechotcongno" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',' . $img_file . ')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Ngày chốt công nợ :*</td>
                <td >
                    <input class="time_input picker" type="text"  name="ngay_chot" value="'.$rs['ngay_chot'].'"  required>  
                </td>
            </tr>
            <tr>
                <td class="td-first">Hạn thanh toán :*</td>
                <td >
                    <input class="time_input picker" type="text"  name="ngay_thu" value="'.$rs['ngay_thu'].'"  required>  
                </td>
            </tr>
            <tr>
                <td class="td-first">VAT áp dụng(%) :*</td>
                <td >
                    <input class="" type="text"  name="vat" value="'.$rs['vat'].'" placeholder="Nhập số phần trăm vd: 10" required>
                </td>
            </tr>
            <tr>
                <td class="td-first">Tình trạng:</td>
                <td>
                    <select name="active">
                        <option value="0">Cập nhật công nợ</option>
                        <option value="1">Chốt công nợ</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td-first">Ghi chú :</td>
                <td >
                    <textarea name="ghichu"></textarea>
                </td>
            </tr>
            <tr>
                <td class="td-first">Hình ảnh (nếu có):</td>
                <td >
                    <input  type="file"  name="img_file[]" id="img_file" accept="image/*"  multiple>
                </td>
            </tr>
            '.$hinhanh.'
            
           
            </tbody>
            </table>
                <input type="hidden" name="id" value="' . $rs['id_security'] . '">
                <div class="btn-submit">
                <button type="submit" class="submit">Cập nhật</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                    
                </div>
            </form>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            <script>
            $( function() {
                      
                $( ".picker" ).datepicker({
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
                'status' => 0,
                'str' => '(0) Lỗi'
            )
        ));
    }
} else {
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
