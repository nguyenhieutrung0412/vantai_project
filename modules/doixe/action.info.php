<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_doixe", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    // $rs['sotien_thu'] = number_format($rs['sotien_thu'], 0, ',', '.') . "";
     $total = $result->num_rows();
    // $result2 = $oContent->view_table("php_loaithu", "`id`=".$rs['loai_thu']."  LIMIT 1");
    // $rs2 = $result2->fetch();
 
    
    //lấy danh sách hình ảnh nếu có
	$kt_img = $oContent->view_table("php_images","type = 'php_phieuthu' AND type_id = '".$id."'");
	$total_img = $kt_img->num_rows();
	$p=1;

	while($ds = $kt_img->fetch()){
		$code_pics = $oClass->id_encode($ds['id']);
		$code_act = "'".$code_pics."'";
		
        $module = "'doixe'";
        $action = "'delete_img'";
		if($p%4==0){$ds['fix'] = ' fix';}
		
		$img .= '<li class="'.$ds['fix'].'" id="pics_'.$code_pics.'">
	
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
                <ul class="picslist list-unstyled row" id="lightgallery" >
				'.$img.'
				</ul>
                </div></td>
			</tr>';
	}

    //lấy danh sách file nếu có
	$kt_file = $oContent->view_table("php_file","type = 'php_phieuthu' AND type_id = '".$id."'");
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
		$list_file = '<tr><td colspan="2"><h3>File đính kèm</h3>'.$file_list.'</td></tr>';
	}


    if($total==1){
        $id_gallery = "'#lightgallery'";
        $str = '
        <div class="pop-up">
        <span class="close_pop">×</span>
            <h2>Thông tin xe  </h2>
            <div class="info">
                <form>
                <table class="table-input">
                <tbody>
                   <tr>
                   
                   <td class="td-first"><label for="">Mã xe: </label></td>
                       <td>  <input type="text" value="'.$rs['id'].'"  readonly> </td>
                   
                   </tr>
                   <tr>
                   
                        <td class="td-first"><label for="">Loại xe: </label></td>
                        <td><input type="text" value="'.$rs['loaixe'].'"  readonly></td>
                  
                    </tr>
                    <tr>
                   
                        <td class="td-first"><label for="">Tải trọng: </label></td>
                        <td><input type="text" value="'.$rs['tai_trong'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Số khối: </label></td>
                        <td><input type="text" value="'.$rs['so_khoi'].'"  readonly></td>
                   
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Biển số xe: </label></td>
                        <td><input type="text" value="'.$rs['biensoxe'].'"  readonly></td>
                    
                    </tr>
                    <tr>
                    
                        <td class="td-first"><label for="">Hạn đăng kiểm: </label></td>
                        <td><input type="text" value="'.$rs['han_dang_kiem'].'"  readonly></td>                 
                    </tr>
                   
                    '.$list_file.'
                    '.$hinhanh.'
                    </tbody>
                    </table>
                    
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