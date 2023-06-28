<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //lấy dữ liệu của đơn hàng
    $id = $oClass->id_decode($_POST['id_donhang']);
    $donhang = $oContent->view_table("php_donhangtrongoi","id=".$id);
    $rs_donhang = $donhang->fetch();
    $thoigian_donhanghientai = explode(" ",$rs_donhang['thoigian_giaohang']);

    //lấy thời gian của tất cả đơn hàng rời
    $thoigian_cuatatcadon = $model->db->query("SELECT * FROM php_donhangroi WHERE active =0");
    while($rs_thoigian_cuatatcadon = $thoigian_cuatatcadon->fetch()){
        $arr_thoigiantatcadon = explode(" ",$rs_thoigian_cuatatcadon['thoigian_giaohang']);
        if($arr_thoigiantatcadon[0]  == $thoigian_donhanghientai[0])
        {
            $arr_taixedangban[] = $rs_thoigian_cuatatcadon['id_taixe'];
            $arr_doixedangban[] = $rs_thoigian_cuatatcadon['id_doixe'];
            $arr_phuxedangban[] = $rs_thoigian_cuatatcadon['id_nhansu'];
        }

    }
    //lấy thời gian của tất cả đơn hàng trọn gói
    $thoigian_cuatatcadontrongoi = $model->db->query("SELECT * FROM php_donhangtrongoi WHERE active =0");
    while($rs_thoigian_cuatatcadontrongoi = $thoigian_cuatatcadontrongoi->fetch()){
        $arr_thoigiantatcadontrongoi = explode(" ",$rs_thoigian_cuatatcadontrongoi['thoigian_giaohang']);
        if($arr_thoigiantatcadontrongoi[0]  == $thoigian_donhanghientai[0])
        {
            $arr_taixedangban[] = $rs_thoigian_cuatatcadontrongoi['id_taixe'];
            $arr_doixedangban[] = $rs_thoigian_cuatatcadontrongoi['id_doixe'];
            $arr_phuxedangban[] = $rs_thoigian_cuatatcadontrongoi['id_nhansu'];
        }

    }
  
    //kiểm tra xem có người phụ trách chuyến này chưa
    if ($_POST['id_phutrach'] == 0) {
        $module = "'donhang'";
        $action = "'dieulenh-update'";
        //kiểm tra xem đang điều xe cho đối tượng nào
        if ($_POST['name_phutrach'] == 'taixe') {

            //kiểm tra trong ngày của đơn tài xế này cũng đang có đơn thì không cho điều
           
            $name_phutrach = "'taixe'";
            $class_search ='taixe_search-input_donhangtrongoi';
            $list_taixe = $oContent->view_table("php_taixe");

            while ($rs_taixe = $list_taixe->fetch()) {
                $icon = '';
                
                //danh sách thời gian tài xế đó bận
                $thoigian_taixeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_taixe = ".$rs_taixe['id']." AND active =0");
                $thoigianban_taixe='';
                while($rs_thoigian_taixeban = $thoigian_taixeban->fetch()){
                    $thoigianban_taixe .= $rs_thoigian_taixeban['thoigian_giaohang'].'<br><br>';
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }
                $thoigian_taixebantrongoi = $model->db->query("SELECT thoigian_giaohang FROM php_donhangtrongoi WHERE id_taixe = ".$rs_taixe['id']." AND active =0");
               
                while($rs_thoigian_taixebantrongoi = $thoigian_taixebantrongoi->fetch()){
                    $thoigianban_taixe .= $rs_thoigian_taixebantrongoi['thoigian_giaohang'].'<br><br>';
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }
               
                if(in_array($rs_taixe['id'],$arr_taixedangban))
                {
                    $thead_ban = ' <tr>
                    <th>Tên tài xế </th>
                    <th>Số điện thoại tài xế </th>
                    <th>Thời gian có chuyến </th>
                    
                    <th>Action </th>
                    </tr>';

                    $title_ban = '<div style="color:red;font-size:16px"> <h4>Tài xế đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                    $ds_ban .= ' 
                    <tr>
                        <td>' . $rs_taixe['name_taixe'] . ' ' . $icon . '</td>
                        <td>' . $rs_taixe['phone_taixe'] . '</td>
                        <td>'.$thoigianban_taixe.'</td>
                        <input type="hidden" name="id_taixe" value="' . $rs_taixe['id'] . '">
                        <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                        <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                    </tr>
                    ';

                }
                else{
                    $thead = ' <tr>
                    <th>Tên tài xế </th>
                    <th>Số điện thoại tài xế </th>
                    <th>Thời gian có chuyến </th>
                    
                    <th>Action </th>
                    </tr>';
                    $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Tài xế có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                    if($thoigianban_taixe == '')
                    {
                        $thoigianban_taixe ='Không có chuyến';
                    }
                    $ds .= ' 
                    <tr>
                        <td>' . $rs_taixe['name_taixe'] . ' ' . $icon . '</td>
                        <td>' . $rs_taixe['phone_taixe'] . '</td>
                        <td>'.$thoigianban_taixe.'</td>
                       
                        <input type="hidden" name="id_taixe" value="' . $rs_taixe['id'] . '">
                        <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                        <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_taixe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                    </tr>
                    ';
                }

                
            }
        } else if ($_POST['name_phutrach'] == 'phuxe') {
            $name_phutrach = "'phuxe'";
            $class_search ='phuxe_search-input_donhangtrongoi';
            $list_phuxe = $oContent->view_table("php_nhansu", "position_id= 5");

          
            while ($rs_phuxe = $list_phuxe->fetch()) {
                $icon = '';

               
                  //danh sách thời gian phụ xe đó bận
                $thoigian_phuxeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_nhansu = ".$rs_phuxe['id']." AND active =0");
                $thoigianban_phuxe='';
                while($rs_thoigian_phuxeban = $thoigian_phuxeban->fetch()){
                    $thoigianban_phuxe .= $rs_thoigian_phuxeban['thoigian_giaohang'].'<br><br>';
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }

                $thoigian_phuxebantrongoi = $model->db->query("SELECT thoigian_giaohang FROM php_donhangtrongoi WHERE id_nhansu = ".$rs_phuxe['id']." AND active =0");
               
                while($rs_thoigian_phuxebantrongoi = $thoigian_phuxebantrongoi->fetch()){
                    $thoigianban_phuxe .= $rs_thoigian_phuxebantrongoi['thoigian_giaohang'].'<br><br>';
                    $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                }
                if(in_array($rs_phuxe['id'],$arr_phuxedangban))
                {
                    $thead_ban = ' <tr>
                    <th>Tên người phụ xe </th>
                    <th>Số điện thoại </th>
                    <th>Ngày có chuyến </th>
                    <th>Action </th>
                    </tr>';

                    $title_ban = '<div style="color:red;font-size:16px"> <h4>Phụ xe đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                    $ds_ban .= ' 
                    <tr>
                        <td>' . $rs_phuxe['name'] . ' ' . $icon . '</td>
                        <td>' . $rs_phuxe['phone'] . '</td>
                        <td>'.$thoigianban_phuxe.'</td>
                        <input type="hidden" name="id_phuxe" value="' . $rs_phuxe['id'] . '">
                                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                        <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                    </tr>
                    ';
                }
                else{
                    $thead = ' <tr>
                    <th>Tên người phụ xe </th>
                    <th>Số điện thoại </th>
                    <th>Chức vụ </th>
                    <th>Action </th>
                    </tr>';
                    $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Phụ xe có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                    if($thoigianban_phuxe == '')
                    {
                        $thoigianban_phuxe ='Không có chuyến';
                    }
                    $ds .= ' 
                            <tr>
                                <td>' . $rs_phuxe['name'] . ' ' . $icon . '</td>
                                <td>' . $rs_phuxe['phone'] . '</td>
                                <td>'.$thoigianban_phuxe.'</td>
                                <input type="hidden" name="id_phuxe" value="' . $rs_phuxe['id'] . '">
                                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                                <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_phuxe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                            </tr>
                            ';
                }
                
            }
        } else if ($_POST['name_phutrach'] == 'doixe') {
            $name_phutrach = "'doixe'";
            $class_search ='doixe_search-input_donhangtrongoi';
            $list_doixe = $oContent->view_table("php_doixe", "active= 1");

            while ($rs_doixe = $list_doixe->fetch()) {
                $icon = '';
                

                  //danh sách thời gian đội xe xe đó bận
                  $thoigian_doixeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_doixe = ".$rs_doixe['id']." AND active =0");
                  $thoigianban_doixe='';
                  while($rs_thoigian_doixeban = $thoigian_doixeban->fetch()){
                      $thoigianban_doixe .= $rs_thoigian_doixeban['thoigian_giaohang'].'<br><br>';
                      $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                  }
                  
                    $thoigian_doixebantrongoi = $model->db->query("SELECT thoigian_giaohang FROM php_donhangtrongoi WHERE id_doixe = ".$rs_doixe['id']." AND active =0");
                
                    while($rs_thoigian_doixebantrongoi = $thoigian_doixebantrongoi->fetch()){
                        $thoigianban_doixe .= $rs_thoigian_doixebantrongoi['thoigian_giaohang'].'<br><br>';
                        $icon = '<i class="fa-solid fa-circle-check color-2"></i>';
                    }
                  if(in_array($rs_doixe['id'],$arr_doixedangban))
                  {
                      $thead_ban = ' <tr>
                      <th>Loại xe </th>
                      <th>Biển số xe </th>
                      <th>Tài xế phụ trách</th>
                      <th>Thời gian có chuyến</th>

                      <th>Action </th>
                      </tr>';
                         //xử lý tên tài xế
                        if ($rs_doixe['id_taixe'] != 0) {
                            $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe['id_taixe']);
                            $rstaixe = $taixe->fetch();
                            $rs_doixe['name_taixe'] = $rstaixe['name_taixe'];
                        } else {
                            $rs_doixe['name_taixe'] = 'Không có tài xế phụ trách';
                        }
  
                      $title_ban = '<div style="color:red;font-size:16px"> <h4>Xe đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                      $ds_ban .= ' 
                      <tr>
                          <td>' . $rs_doixe['loaixe'] . ' ' . $icon . '</td>
                          <td>' . $rs_doixe['biensoxe'] . '</td>
                          <td>' . $rs_doixe['name_taixe'] . '</td>
                          <td>'.$thoigianban_doixe.'</td>
                          <input type="hidden" name="id_taixe" value="' . $rs_doixe['id_taixe'] . '">
                          <input type="hidden" name="id_doixe" value="' . $rs_doixe['id'] . '">
                          <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                          <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                      </tr>
                      ';
                  }else{
                        $thead = ' <tr>
                        <th>Loại xe </th>
                        <th>Biển số xe </th>
                        <th>Tài xế phụ trách</th>
                        <th>Thời gian có chuyến</th>
                        <th>Action </th>
                        </tr>';
                     //xử lý tên tài xế
                        if ($rs_doixe['id_taixe'] != 0) {
                            $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe['id_taixe']);
                            $rstaixe = $taixe->fetch();
                            $rs_doixe['name_taixe'] = $rstaixe['name_taixe'];
                        } else {
                            $rs_doixe['name_taixe'] = 'Không có tài xế phụ trách';
                        }
                        //
                        $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Xe có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                        if($thoigianban_doixe == '')
                        {
                            $thoigianban_doixe ='Không có chuyến';
                        }
                        $ds .= ' 
                    <tr>
                        <td>' . $rs_doixe['loaixe'] . ' ' . $icon . '</td>
                        <td>' . $rs_doixe['biensoxe'] . '</td>
                        <td>' . $rs_doixe['name_taixe'] . '</td>
                        <td>'.$thoigianban_doixe.'</td>
                        <input type="hidden" name="id_taixe" value="' . $rs_doixe['id_taixe'] . '">
                        <input type="hidden" name="id_doixe" value="' . $rs_doixe['id'] . '">
                        <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                        <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_doixe['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                    </tr>
                    ';
                  }

               
            }
        }

        //html chung 
        $str .= '
            <div class="pop-up">
            
                <h2> Điều lệnh cho đơn hàng    <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Mã đơn: '.$oClass->id_decode($_POST['id_donhang']).'</span>
                <br>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Ngày: '.$rs_donhang['thoigian_giaohang'].'</span>
                <div class="search_phutrach">
                    <input class="search_phutrach-input '.$class_search.'"  type="text" name="search_phutrach-input" id="search_phutrach-input" placeholder ="Nhập tên or số điện thoại để tìm kiếm"> 
                </div>
                <div class="result_search-phutrach">
                    <ul>
                    
                    </ul>
                </div>
                <div class="table"> 
                    '.$title_khongban.'
                    <table>
                            <thead>
                               ' . $thead . '
                            <thead>
                            <tbody>

                            ' . $ds . '
                            </tbody>
                    <table>
                </div>
                <div class="table"> 
                '.$title_ban.'
                <table>
                        <thead>
                           ' . $thead_ban . '
                        <thead>
                        <tbody>

                        ' . $ds_ban . '
                        </tbody>
                <table>
            </div>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            </div>
        ';
        die(json_encode(
            array(
                'str' => $str,
                'status' => 1,

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
} else {
    die(json_encode(
        array(
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
