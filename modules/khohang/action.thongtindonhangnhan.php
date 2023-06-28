<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = "'donhangroi'";

    $action = "'active-donhangcon'";


    $frm = "'frmAddactive'";
    $img_file = "'img_file'";

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);

   //lấy danh sách hình ảnh nếu có
	$kt_img = $oContent->view_table("php_images","type = 'php_truckho_xacnhanhang' AND type_id = '".$id."'");
	$total_img = $kt_img->num_rows();
	$p=1;

	while($ds = $kt_img->fetch()){
		$code_pics = $oClass->id_encode($ds['id']);
		$code_act = "'".$code_pics."'";
		
        $module = "'khohang'";
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

    

        $str = '
        <div class="pop-up">
        <h2>Thông tin nhân viên kho nhận hàng <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
        <form name="frmAddactive" id="frmAddactive" method="post"   enctype="multipart/form-data">
            <div >
                <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Họ tên nhân viên kho:</td>
                            <td>
                                <input type="text" name="ten_nguoinhan"   value="' . $rs['ten_nv_khonhan'] . '"  placeholder="Name" readonly  required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Thời gian xác nhận nhận hàng:</td>
                            <td>
                                <input type="tel"   value="' . $rs['time_nhanhang'] . '" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone_nguoinhan"  placeholder="Số điện thoại" readonly required>
                            </td>
                        </tr>
                         <tr>
                            <td class="td-first">Ghi chú xác nhận:</td>
                            <td>
                                <input type="text"   value="' . $rs['ghichu_nhanhang'] . '" readonly required>
                            </td>
                        </tr>
                        '.$hinhanh.'
                         
                        <input type="hidden" name="id_nv_kho"   value="' . $rs['id_nv_khonhan'] . '">
                        <input type="hidden" name="id"   value="' . $rs['id_security'] . '">
                    </tbody>
                </table>
            </div>
            <div class="btn-submit">
              
              
  
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
}
