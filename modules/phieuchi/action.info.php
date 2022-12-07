<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_phieuchi", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['sotien_chi'] = number_format($rs['sotien_chi'], 0, ',', '.') . "VND";
    $total = $result->num_rows();
    $result2 = $oContent->view_table("php_loaichi", "`id`=".$rs['loai_chi']."  LIMIT 1");
    $rs2 = $result2->fetch();
 
    
    //lấy danh sách hình ảnh nếu có
	$kt_img = $oContent->view_table("php_images","type = 'php_phieuchi' AND type_id = '".$id."'");
	$total_img = $kt_img->num_rows();
	$p=1;

	while($ds = $kt_img->fetch()){
		$code_pics = $oClass->id_encode($ds['id']);
		$code_act = "'".$code_pics."'";
		
        $module = "'phieuchi'";
        $action = "'delete_img'";
		if($p%4==0){$ds['fix'] = ' fix';}
		
		$img .= '
            <li  id="pics_'.$code_pics.'"  class="'.$ds['fix'].'">
                  
                        <a class="colorbox group1" style="cursor:zoom-in" href="data/upload/images/'.$ds['file_name'].'" >
                            <img class="img-responsive" src="data/upload/images/'.$ds['file_name'].'">
                        </a>
                   
                    <span class="color-0" onclick="return deleteImage('.$module.','.$action.','.$code_act.')"><i class="fa fa-trash "></i> Xóa</span>
            </li>
        ';
		
		$p++;
	}
	if($total_img>0){
		$hinhanh = '<tr>
				<td colspan="2">
                
                <div class="demo-gallery">
                    <ul class="picslist "  >
                     
                    '.$img.'
                    
                    </ul>
                </div>
                   
                </td>
			</tr>';
	}

    //lấy danh sách file nếu có
	$kt_file = $oContent->view_table("php_file","type = 'php_phieuchi' AND type_id = '".$id."'");
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
        $module = "'phieuchi'";
        $action = "'delete_file'";
		$file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
		<a class="color-0" href="javascript:void(0)" onclick="return deleteImage('.$module.','.$action.','.$code_file_act.')" title="Xóa file" class="red"><i class="fa fa-trash"></i> Xóa</a>
		</p>';
	}
	if($total_file>0){
		$list_file = '<tr><td colspan="2"><h3>File đính kèm</h3>'.$file_list.'</td></tr>';
	}




    if($total==1){
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
            <h2>Thông tin phiếu chi   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
            <div class="info">
                <form>
                <table class="table-input">
                <tbody>
                   <tr>
                   
                   <td class="td-first"><label for="">Mã phiếu: </label></td>
                       <td>  <input type="text" value="'.$rs['id'].'"  readonly> </td>
                   
                   </tr>
                   <tr>
                   
                        <td class="td-first"><label for="">Loại chi: </label></td>
                        <td><input type="text" value="'.$rs2['loai_chi'].'"  readonly></td>
                  
                    </tr>
                    <tr>
                   
                        <td class="td-first"><label for="">Tên người nhận: </label></td>
                        <td><input type="text" value="'.$rs['name_nguoinhan'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Địa chỉ người nhận: </label></td>
                        <td><input type="text" value="'.$rs['diachi_nguoinhan'].'"  readonly></td>
                   
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Ngày giờ tạo phiêu: </label></td>
                        <td><input type="text" value="'.$rs['ngaytao_phieuchi'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Số tiền chi: </label></td>
                        <td><input type="text" value="'.$rs['sotien_chi'].'"  readonly></td>                 
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Nội dung để chi: </label></td>
                        <td><input type="text" value="'.$rs['noidung_chi'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Người tạo phiếu: </label></td>
                        <td><input type="text" value="'.$rs['tennguoitao_chi'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Ngày giờ xét duyệt: </label></td>
                        <td><input type="text" value="'.$rs['ngaygio_xetduyet'].'"  readonly></td>
                    
                    </tr>
                    '.$list_file.'
                    '.$hinhanh.'
                    </tbody>
                    </table>
                    </form>
                </div>
                <script type="text/javascript">
                $(document).ready(function(){
                    return animation_img();
                });
                </script>
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