<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_doixe", "`id`=".$id." AND active = 1 LIMIT 1");
    $rs = $result->fetch();
    $total = $result->num_rows();
    if($rs['id_taixe'] != 0 && $rs['id_taixe'] != null){
        $taixe = $oContent->view_table("php_taixe", "`phone_taixe`=".$rs['taixe']." AND active = 1 LIMIT 1");
        $rs_taixe = $taixe->fetch();
        $rs_taixe['name_taixe_xuly'] = $rs_taixe['name_taixe']." ".$rs_taixe['phone_taixe'];
    
    }
    //xử lý xuất tài xế chưa có xe phụ  trách 
    $taixe_doixe =  $model->db->query("SELECT id_taixe FROM php_doixe");
    while($taixe_dacoxe = $taixe_doixe->fetch()){
        if($taixe_dacoxe['id_taixe'] > 0){
            $idtaixe[] = $taixe_dacoxe['id_taixe'];
        }
        
    }
    
    $taixe_all=  $model->db->query("SELECT * FROM php_taixe");
    while($taixe_chuacoxe = $taixe_all->fetch()){
        if(!in_array($taixe_chuacoxe['id'],$idtaixe)){
            $str .= '<option value="'.$taixe_chuacoxe['name_taixe'].' '.$taixe_chuacoxe['phone_taixe'].'">';
        }
    }
     //lấy danh sách hình ảnh nếu có
     $kt_img = $oContent->view_table("php_images","type = 'php_doixe' AND type_id = '".$id."'");
     $total_img = $kt_img->num_rows();
     $p=1;

     while($ds = $kt_img->fetch()){
         $code_pics = $oClass->id_encode($ds['id']);
         $code_act = "'".$code_pics."'";
         
         $module = "'doixe'";
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
     $kt_file = $oContent->view_table("php_file","type = 'php_doixe' AND type_id = '".$id."'");
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
         $module = "'doixe'";
         $action = "'delete_file'";
         $file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
         <a class="color-0" href="javascript:void(0)" onclick="return deleteImage('.$module.','.$action.','.$code_file_act.')" title="Xóa file" class="red"><i class="fa fa-trash"></i> Xóa</a>
         </p>';
     }
     if($total_file>0){
         $list_file = '<tr><td colspan="2">'.$file_list.'</td></tr>';
     }
    
   
    $module = "'doixe'";
    $update = "'update'";
    $frm = "'frmUpdateDoixe'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    if($total==1){
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
        <h3>Cập nhật xe</h3>
         <form name="frmUpdateDoixe" id="frmUpdateDoixe" method="post" onsubmit = "return _edit('.$module.','.$update.','.$frm.',1)"  enctype="multipart/form-data">
            
         
         <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Loại xe *</td>
                 <td><input type="text" name="loaixe"  placeholder="Loại xe" value="'.$rs['loaixe'].'"  required> </td>
             </tr>
             <tr>
                <td class="td-first">Biển số xe *</td>
                <td>  <input type="text" name="biensoxe"  placeholder="Biển số xe" value="'.$rs['biensoxe'].'" required> </td>
            </tr>
             <tr>
                <td class="td-first">Tải trọng *</td>
                <td>  <input type="text" name="tai_trong"  placeholder="Tải trọng" value="'.$rs['tai_trong'].'" required> </td>
            </tr>
             <tr>
                <td class="td-first">Số khối *</td>
                <td>  <input type="text" name="so_khoi"  placeholder="Số khối" value="'.$rs['so_khoi'].'" required> </td>
            </tr>
             <tr>
                <td class="td-first">Hạn đăng kiểm *</td>
                <td>  <input type="text" name="han_dang_kiem" class="picker"  placeholder="Hạn đăng kiểm" value="'.$rs['han_dang_kiem'].'" required> </td>
            </tr>
            <tr>
                <td class="td-first">Tài xế phụ trách *</td>
                <td><input list="list_tx" name="list_tx" value="'.$rs_taixe['name_taixe_xuly'].'" >
                <datalist id="list_tx">
               '.$str.'
                </datalist> </td>
            </tr>
            <tr>
            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
           <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
        </tr>
        '.$hinhanh.'
         </tbody>
         </table>
            <input type="hidden" name="id" value="'.$rs['id_security'].'">
            <div class="btn-submit">
         
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
            <script>
            $( function() {
                $("#datepicker2,.picker").datepicker({
                    dateFormat: "dd/m/yy"
                });
            });
            </script>
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
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
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