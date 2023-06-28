<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_phiphatsinh", "`id_donhang`=" . $id . " ");


    $module = "'donhang'";
    $update = "'add-phiphatsinh'";
    $add_line = "'add-phiphatsinh'";

    $frm = "'frmUpdatePhiphatsinh'";
    $name_form = "'add-phiphatsinh'";
    $img_file = "'img_file'";
   
    $stt = 1;
    while ($rs = $result->fetch()) {
        $rs['sotien'] = number_format($rs['sotien'], 0, ',', '.') . "";
        $code_pics = $oClass->id_encode($rs['id']);
        $code_act = "'" . $code_pics . "'";
        $rs['id_security'] = $oClass->id_encode($rs['id']);

        $action_delete = "'delete_phiphatsinh'";
        $action_upload = "'upload-img-view'";
        $name_form_upload = "'popup-upload-img'";
        $checkbox_no = '';
        if($rs['thukhach'] == 0)
        {
            $checkbox_no = 'selected';
        }
        $checkbox_yes ='';
        if($rs['thukhach'] == 1)
        {
            $checkbox_yes = 'selected';
        }
        //lấy danh sách hình ảnh nếu có
        $kt_img = $model->db->query("SELECT * FROM php_images WHERE type = 'php_phiphatsinh' AND type_id = ".$rs['id']);
        //$kt_img = $oContent->view_table("php_images","type = 'php_phiphatsinh' AND type_id = '".$id."'");
        $total_img = $kt_img->num_rows();
      
        $img = '';
        while($ds = $kt_img->fetch()){
           
   
            
            $img .= '
            <a class="group1" href="data/upload/images/'.$ds['file_name'].'" title="Me and my grandfather on the Ohoopee."><img  class="img-responsive" style="width:50px;" src="data/upload/images/'.$ds['file_name'].'"></a>
                
            ';
            
          
        }
        $hinhanh = '';
        if($total_img>0){
            $hinhanh = '
                    

                        '.$img.'
 
                   
 
               ';
        } 
        
         //lấy danh sách file nếu có
         $kt_file = $model->db->query("SELECT * FROM php_file WHERE type = 'php_phiphatsinh' AND type_id = ".$rs['id']);
          //  $kt_file = $oContent->view_table("php_file","type = 'php_phieuthu' AND type_id = '".$id."'");
         $total_file= $kt_file->num_rows();
 
         $arr_file = array(
         'pdf'=>'<i class="fa fa-file-pdf-o"></i> ',
         
         );
         $file_list = '';
         while($ds_file = $kt_file->fetch()){
         
         
             $file_list .= '<a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_type'].'</a>
             
             ';
         }
         $list_file='';
         if($total_file>0){
             $list_file = ''.$file_list.'';
         }
         $no= '';
         if($hinhanh == '' && $list_file == ''){
            $no = '<input type="file" name="img_file2[' . $rs['id'] . ']" id="img_file" value=""  accept="image/*,.pdf">';
        } 
        $action ="'update'";

        $str_mathang .= '  
            <tr id="pics_' . $code_pics . '">
                <td>' . $stt . '</td>
                <td>
                    <input type="text" name="tenphi[]" class="btn-phi" id="tenphi'.$stt.'" value="' . $rs['ten_phi'] . '" onclick="return load('.$stt.','.$action.')">
                    <input type="hidden" name="idphi[]" id="idphi'.$stt.'" value="' . $rs['id_loaichi'] . '">
                </td>
              
                <td><input type="text"  name ="sotien[]" value="' . $rs['sotien'] . '"></td>
                <td><input type="text"  name ="so_hoadon[]" value="' . $rs['so_hoadon'] . '"></td>
                <td><input type="text"  name ="ngay_hoadon[]" id="datepicker" value="' . $rs['ngay_hoadon'] . '"></td>
       
                <td><select name ="thukhach[]" >
                    <option value="1" '.$checkbox_yes.'>Có</option>
                    <option value="0" '.$checkbox_no.'>Không</option>
                </select></td>
                <td><input type="text" name ="ghichu[]" value="' . $rs['ghichu'] . '"></td>
                <td class="center"><a >'.$hinhanh.''.$list_file.''.$no.'</a></td>
                <input type="hidden" name ="id[]" value="' . $rs['id'] . '">
                <input type="hidden" name ="id_donhang" value="' . $rs['id_donhang'] . '">
                <td><a href="javascript:void(0)" class="{xuly.xoa} color-0" onclick= "return deleteImage(' . $module . ',' . $action_delete . ',' . $code_pics . ')"> <i class="fa-solid fa-trash icon-delete"></i></a></td>
            </tr>
                ';
        $stt++;
    }


    $str = '
        <div class="pop-up">
        <h3>Thông tin phí phát sinh - Mã :' . $id . '</h3>
        <form name="frmUpdatePhiphatsinh" autocomplete="off" id="frmUpdatePhiphatsinh" method="post" onsubmit = "return _edit(' . $module . ',' . $add_line . ',' . $frm . ','.$img_file.')"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Tên phí</th>
                            <th>Số tiền</th>
                            <th>Số hóa đơn</th>
                            <th>Ngày hóa đơn</th>
                            <th>Thu khách</th>
                            <th>Ghi chú</th>
                            <th>Upload</th>
                           
                            <th>#</th>
                        </tr>

                    </thead>
        <tbody class="add-phiphatsinh">
        '.$str_mathang.'
        
            
          
           
            
        </tbody>
        </table>
        
        
      
            <input type="hidden" name="id_donhang" value="' . $id . '">
            <div class="addline">
                <a href="javascript:void(0)" class="btn-add-phiphatsinh" >Thêm dòng</a>
            </div>
            <div class="btn-submit">
                
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
        </div>
        
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        <script>
        $( function() {
                  
            $( "#datepicker" ).datepicker({
                dateFormat: "dd/m/yy"
            });
            $( "#datepicker2" ).datepicker({
                dateFormat: "dd/m/yy"
            });
            $(".btn-upload").on("click", function() {
                $(".popup-upload-img").toggleClass("in");
            })
        });
        </script>
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
