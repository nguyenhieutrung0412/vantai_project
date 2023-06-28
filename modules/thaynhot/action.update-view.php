<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_thaynhot", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
      //xử lý thời gian 
      $thoigian_donhang = explode("-",$rs['ngay_thaynhot']);
      
      //xử lý thời gian 
    
      //xử lý xuất thời gian theo định dạng d-m-yyyy
  
      $thoigian_donhang_dmyyyy = $thoigian_donhang[2] .'/'.$thoigian_donhang[1] .'/'.$thoigian_donhang[0];

      //xử lý tên tài xế
      $tx = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
      $rs_tx = $tx->fetch();
      $rs['name_taixe'] =  $rs_tx['name_taixe'];
      //lấy thông tin xe
      $xe = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
      $rs_xe = $xe->fetch();
      $rs['biensoxe'] =  $rs_xe['biensoxe'];
    $total = $result->num_rows();
    $module = "'thaynhot'";
    $update = "'update'";
    $frm = "'frmUpdatesuachua'";
    $img_file = "'img_file'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";
     //lấy danh sách hình ảnh nếu có
     $kt_img = $oContent->view_table("php_images","type = 'php_thaynhot' AND type_id = '".$id."'");
     $total_img = $kt_img->num_rows();
     $p=1;

     while($ds = $kt_img->fetch()){
         $code_pics = $oClass->id_encode($ds['id']);
         $code_act = "'".$code_pics."'";
         
         $module = "'thaynhot'";
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

     //lấy danh sách file nếu có
     $kt_file = $oContent->view_table("php_file","type = 'php_thaynhot' AND type_id = '".$id."'");
     $total_file= $kt_file->num_rows();

     $arr_file = array(
     'pdf'=>'<i class="fa fa-file-pdf-o"></i> ',
     'doc'=>'<i class="fa fa-file-word-o"></i> ',
     'docx'=>'<i class="fa fa-file-word-o"></i> ',
     'xls'=>'<i class="fa fa-file-excel-o"></i> ',
     'xlsx'=>'<i class="fa fa-file-excel-o"></i> '
     );

     while($ds_file = $kt_file->fetch()){
         $code_file = $oClass->id_encode($ds_file['id']);
         $code_file_act = "'".$code_file."'";
         $module = "'thaynhot'";
         $action = "'delete_file'";
         $file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
         <a class="color-0" href="javascript:void(0)" onclick="return deleteImage('.$module.','.$action.','.$code_file_act.')" title="Xóa file" class="red"><i class="fa fa-trash"></i> Xóa</a>
         </p>';
     }
     if($total_file>0){
         $list_file = '<tr><td colspan="2">'.$file_list.'</td></tr>';
     }

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật thông tin thay nhớt - mã <span class="color-0">'.$rs['id'].'</span></h3>
         <form name="frmUpdatesuachua" id="frmUpdatesuachua" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
            
         <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên tài xế</td>
                <td><input type="text"   value="'.$rs['name_taixe'].'"  readonly></td>
            </tr>
            <tr>
                <td class="td-first">Biển số xe</td>
                <td><input type="text"   value="'.$rs['biensoxe'].'"  readonly></td>
            </tr>
           
             <tr>
                 
                 <td colspan = "2">
                    <div class="input-formnguoinhan">
                        <label>Ngày thay nhớt: </label> <input type="text" class="time_input picker" id="datepicker_2" name="ngay_thaynhot"  value="'.$thoigian_donhang_dmyyyy.'" required>
                       
                    </div>
                </td>
             </tr>
             <tr>
                <td class="td-first">Số km(km lúc thay nhớt)</td>
                <td><input type="text"  name="km_luc_thaynhot" value="'.$rs['km_luc_thaynhot'].'"  required></td>
            </tr>
             <tr>
                <td class="td-first">Nội dung thay nhớt</td>
                <td><input type="text"  name="noidung" value="'.$rs['noidung'].'"   required></td>
            </tr>
             <tr>
                <td class="td-first">Số tiền</td>
                <td><input type="text"  name="tong_tien" value="'.$rs['tong_tien'].'"  required></td>
            </tr>
            <tr>
            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
           <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*,.pdf"></td>
        </tr>
        '.$hinhanh.'
        <tr>
            <td class="td-first">File đính kèm(nếu có)</td>
            <td><input type="file"  name="pdf_file[]" id="pdf_file" multiple accept= ".pdf, .docx, .doc,.xls,.xlsx"></td>
        </tr>
        '.$list_file.'
           
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                
            </div>
        </form>
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
    </div>
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
                'str' => '(0) Lỗi: Loại thu không được hoạt động'
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