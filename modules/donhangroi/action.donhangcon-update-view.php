<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_donhangroi_s", "`id`=" . $id . "  LIMIT 1");
    $rs = $result->fetch();

    $module = "'donhangroi'";
    $update = "'update-donhangcon'";
    $frm = "'frmUpdateDonHang'";
    $rs['id_security'] = $oClass->id_encode($rs['id']);
    $rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";
    $selected_congno ='';
    $selected_tienmat ='';
    $selected_chuyenkhoan ='';
    $selected_nguoinhantra ='';
    $selected_nguoiguitra ='';

    if($rs['phuongthucthanhtoan'] == 'thanhtoancongno')
    {
        $selected_congno = 'selected';
    }
    else  if($rs['phuongthucthanhtoan'] == 'thanhtoantienmat')
    {
        $selected_tienmat = 'selected';
    }
    else  if($rs['phuongthucthanhtoan'] == 'thanhtoanchuyenkhoan')
    {
        $selected_chuyenkhoan = 'selected';
    }
    if($rs['hinhthucthanhtoan'] == 'nguoinhantra')
    {
        $selected_nguoinhantra = 'selected';
    }
    else  if($rs['hinhthucthanhtoan'] == 'nguoiguitra')
    {
        $selected_nguoiguitra = 'selected';
    }
    //lấy danh sách hình ảnh nếu có
  $kt_img = $oContent->view_table("php_images","type = 'php_donhangroi' AND type_id = '".$id."'");
  $total_img = $kt_img->num_rows();
  $p=1;

  while($ds = $kt_img->fetch()){
      $code_pics = $oClass->id_encode($ds['id']);
      $code_act = "'".$code_pics."'";
      
      $module = "'donhangroi'";
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


    if (isset($rs['id'])) {



        $module = "'donhangroi'";
        $action = "'info_kh_form'";
        $idSelect = "'name_khachhang'";
        $name_form = "'info_kh'";
        $thoigiannhan = str_replace(":", " ", $rs['thoigian_nhanhang']);
        $arr_thoigiannhan = explode(" ", $thoigiannhan);

        $thoigiangiao = str_replace(":", " ", $rs['thoigian_giaohang']);
        $arr_thoigiangiao = explode(" ", $thoigiangiao);


        $str = '
        <div class="pop-up">
        <h3>Cập nhật đơn hàng</h3>
        <div class="close_popup" onclick="return cancel()"><span>Thoát</span></div>
        <form name="frmUpdateDonHang" id="frmUpdateDonHang" method="post" onsubmit = "return _edit(' . $module . ',' . $update . ',' . $frm . ',1)"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
            <tr >
                <th colspan="2" class="title_thead">Thông tin đơn hàng</th>
            </tr>
        </thead>
        <tbody>
           
            
            
            <tr>
                <td class="td-first">Mô tả loại hàng</td>
                <td><input type="text" name="loaihang"  placeholder="Loại hàng" value="' . $rs['loaihang'] . '" required></td>
            </tr>
           
            <tr>
                <td class="td-first">Trọng lượng hàng hóa</td>
                <td><input type="text" name="trongluong_hanghoa"  placeholder="Loại hàng" value="' . $rs['trongluong_hanghoa'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Số khối hàng hóa</td>
                <td><input type="text" name="khoi_hanghoa"  placeholder="Khối hàng" value="' . $rs['khoi_hanghoa'] . '" required></td>
            </tr>
            
            </tbody>
            </table>
            <table class="table-input">
                <thead>
                    <tr>
                        <th colspan="2" class="title_thead">Thông tin giao nhận</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <td class="td-first">Tên người nhận</td>
                <td><input type="text" name="ten_nguoinhan"  placeholder="" value="' . $rs['ten_nguoinhan'] . '" required></td>
            </tr>
          
            <tr>
                <td class="td-first">Địa chỉ nhận hàng</td>
                <td><input type="text" name="diachi_nhanhang"  placeholder="" value="' . $rs['diachi_nhanhang'] . '" required></td>
            </tr>
            <tr>
            
            <td colspan="2">    <div class="input-formnguoinhan">
            <label>Thời gian nhận hàng: </label> <input class="time_input" type="text" id="datepicker" name="thoigian_nhanhang" value="' . $arr_thoigiannhan[0] . '" required>
            <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23"  name="gio_nhanhang" value="' . $arr_thoigiannhan[1] . '"  required>
            <label class="time_input">Phút: </label> <input class="time_input-hours" type="number"  name="phut_nhanhang" value="00" min="0" max="59" value="' . $arr_thoigiannhan[2] . '"  required>
              
            </tr>
            <tr>
                <td class="td-first">Địa chỉ giao hàng</td>
                <td><input type="text" name="diachi_giaohang"  placeholder="" value="' . $rs['diachi_giaohang'] . '" required></td>
            </tr>
            <tr>
              
                <td colspan="2">    
                <div class="input-formnguoinhan">
                    <label>Thời gian giao hàng dự kiến: </label> <input type="text" class="time_input" id="datepicker_2" name="thoigian_giaohang" value="' . $arr_thoigiangiao[0] . '"  required>
                    <label for="gio_nhanhang" class="time_input">Giờ: </label> <input class="time_input-hours" type="number" min="0" max="23" name="gio_giaohang" value="' . $arr_thoigiangiao[1] . '"  required>
                    <label class="time_input">Phút: </label> <input class="time_input-hours" type="number" min="0" max="59" name="phut_giaohang" value="00" value="' . $arr_thoigiangiao[2] . '"  required>
                </div>
                
                </td>
            </tr>
            <tr>
                <td class="td-first">Số điện thoại người nhận</td>
                <td><input type="text" name="phone_nguoinhan"  placeholder="" value="' . $rs['phone_nguoinhan'] . '" required></td>
            </tr>
            </tbody>
            </table>
            <table class="table-input">
                <thead>
                    <tr>
                        <th colspan="2" class="title_thead">Thông tin phí</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <td class="td-first">Phương thúc thanh toán</td>
                <td>  <div class="select_filter">
                <div class="card_all">
                    <select name="phuongthuc_select" id="phuongthuc_select">
                       
                        <option value="thanhtoantienmat" '.$selected_tienmat.'>Thanh toán tiền mặt</option>
                        <option value="thanhtoanchuyenkhoan" '.$selected_chuyenkhoan.'>Thanh toán chuyển khoản</option>
                   
                    </select>
                </div>
            </div></td>
            </tr>
            <tr>
                <td class="td-first">Bên thanh toán</td>
                <td>  
                <div class="select_filter">
                    <div class="card_all">
                        <select name="thanhtoan_select" id="thanhtoan_select"  >
                           
                            <option value="nguoiguitra" '.$selected_nguoiguitra.'>Người gửi thanh toán</option>
                            <option value="nguoinhantra" '.$selected_nguoinhantra.'>Người nhận thanh toán</option>
                        </select>
                    </div>
                </div></td>
            </tr>
           
            <tr>
                <td class="td-first">Phí vận chuyển</td>
                <td><input type="text" name="phivanchuyen"  placeholder="VD: 150.000 or 150,000" value="' . $rs['phivanchuyen'] . '" required></td>
            </tr>
            <tr>
                <td class="td-first">Phí VAT(%)</td>
                <td><input type="text" name="vat"  placeholder="Nhập phần trăm phí vat" value="' . $rs['vat'] . '" required></td>
            </tr>
            <tr>
            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
            <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
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
    <script>
    $(function() {
        $( "#datepicker").datepicker({
            dateFormat: "dd/m/yy"
        });
  
        $( "#datepicker_2").datepicker({
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
                'str' => '(0) Lỗi: Tài khoản đã bị khóa hoặc không tồn tại'
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
