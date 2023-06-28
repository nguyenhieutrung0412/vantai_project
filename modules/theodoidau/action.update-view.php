<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_theodoidau", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
      //xử lý thời gian 
      $thoigian_donhang = explode(" ",$rs['ngay_do']);
      //xử lý xuất thời gian theo định dạng d-m-yyyy
      $thoigian_donhang_array = explode("-",$thoigian_donhang[0]);
      $thoigian_donhang_dmyyyy = $thoigian_donhang_array[2] .'/'.$thoigian_donhang_array[1] .'/'.$thoigian_donhang_array[0];

      $gio_giaohang = explode(":",$thoigian_donhang[1]);
      //xử lý tên tài xế
      $tx = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
      $rs_tx = $tx->fetch();
      $rs['name_taixe'] =  $rs_tx['name_taixe'];
      //lấy thông tin xe
      $xe = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
      $rs_xe = $xe->fetch();
      $rs['biensoxe'] =  $rs_xe['biensoxe'];
    $total = $result->num_rows();
    $module = "'theodoidau'";
    $update = "'update'";
    $frm = "'frmUpdatedau'";
    $img_file = "'img_file'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";


    if($rs['do_dau_ngoai'] == 0)
    {
        $checkbox_no = 'selected';
    }
    $checkbox_yes ='';
    if($rs['do_dau_ngoai'] == 1)
    {
        $checkbox_yes = 'selected';
    }
     //lấy danh sách hình ảnh nếu có
     $kt_img = $oContent->view_table("php_images","type = 'php_theodoidau' AND type_id = '".$id."'");
     $total_img = $kt_img->num_rows();
     $p=1;

     while($ds = $kt_img->fetch()){
         $code_pics = $oClass->id_encode($ds['id']);
         $code_act = "'".$code_pics."'";
         
         $module = "'theodoidau'";
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
     $kt_file = $oContent->view_table("php_file","type = 'php_theodoidau' AND type_id = '".$id."'");
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
         $module = "'theodoidau'";
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
        <h3>Cập nhật thông tin đổ dầu - mã <span class="color-0">'.$rs['id'].'</span></h3>
         <form name="frmUpdatedau" id="frmUpdatedau" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
            
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
                        <label>Ngày đổ dầu: </label> <input type="text" class="time_input picker" id="datepicker_2" name="ngay_do"  value="'.$thoigian_donhang_dmyyyy.'" required>
                        <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_do" value="'.$gio_giaohang[0].'"  required>
                        <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_do" value="'.$gio_giaohang[1].'"  required>
                    </div>
                </td>
             </tr>
             <tr>
                <td class="td-first">Số km(km lúc đổ)</td>
                <td><input type="text"  name="km_luc_do" value="'.$rs['km_luc_do'].'"  required></td>
            </tr>
             <tr>
                <td class="td-first">Số lít đổ</td>
                <td><input type="text"  name="so_lit" value="'.$rs['so_lit'].'"   required></td>
            </tr>
             <tr>
                <td class="td-first">Đơn giá</td>
                <td><input type="text"  name="don_gia" value="'.$rs['don_gia'].'"  required></td>
            </tr>
            <tr>
            <td class="td-first">Dầu ngoài</td>
                <td><select name ="dau_ngoai"   >
                <option value="1" '.$checkbox_yes.' >Có</option>
                <option value="0" '.$checkbox_no.'>Không</option>
                </select></td>
            </tr>
           
            <tr><td>Mã số dầu trước khi đổ:</td>
            <td> <input type="text" class=" " id="msd_truockhido_1" name="msd_truockhido" value="'.$rs['msd_truockhido'].'"></td> 
            </tr>
            <tr><td>Mã số dầu sau khi đổ:</td>
            <td><input type="text" class=" " id="msd_saukhido_1" name="msd_saukhido" value="'.$rs['msd_saukhido'].'"></td> 
            </tr>
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