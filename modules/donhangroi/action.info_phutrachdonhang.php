<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //lấy dữ liệu của đơn hàng
        $id = $oClass->id_decode($_POST['id_donhang']);
        $donhang = $oContent->view_table("php_donhangroi","id=".$id);
        $rs_donhang = $donhang->fetch();
        $thoigian_donhanghientai = explode(" ",$rs_donhang['thoigian_giaohang']);
         //lấy thời gian của tất cả đơn hàng
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
    //xử lý nếu xuất bến thì không cho sửa thông tin tài xế
    $remove = '';
    if($rs_donhang['tinhtrangdon'] > 0)
    {
        $remove = 'remove';
    }


    //kiểm tra xem có người phụ trách chuyến này chưa
    if ($_POST['id_phutrach'] != 0) {

        $module = "'donhangroi'";
        $action = "'update-phutrach'";
        //kiểm tra xem đang điều xe cho đối tượng nào
        if ($_POST['name_phutrach'] == 'taixe') {

            $class_search ='taixe_search-input';
            $title = 'Tài Xế';
            $name_phutrach = "'taixe'";

            $list_taixe = $oContent->view_table("php_taixe", "id = " . $_POST['id_phutrach']);

            $rs_taixe = $list_taixe->fetch();

            $taixe_khac = $oContent->view_table("php_taixe");
            while ($rs_taixe_khac = $taixe_khac->fetch()) {
                if ($rs_taixe_khac['id'] != $_POST['id_phutrach']) {
                        $icon = '';
                        
                        //danh sách thời gian tài xế đó bận
                        $thoigian_taixeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_taixe = ".$rs_taixe_khac['id']." AND active =0");
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
                        if(in_array($rs_taixe_khac['id'],$arr_taixedangban))
                        {
                            $thead_ban = '
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="5">Thông tin tài xế có chuyến vào ngày '.$thoigian_donhanghientai[0].'</th>
                                </tr>
                            
                                <tr>
                                <th>Tên tài xế </th>
                                <th>Số điện thoại tài xế </th>
                                <th>Thời gian có chuyến </th>
                                
                                <th>Action </th>
                                </tr>
                            </thead>';

                            $title_ban = '<div style="color:red;font-size:16px"> <h4>Tài xế đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                            $ds_ban .= ' 
                            <tr>
                                <td>' . $rs_taixe_khac['name_taixe'] . ' ' . $icon . '</td>
                                <td>' . $rs_taixe_khac['phone_taixe'] . '</td>
                                <td>'.$thoigianban_taixe.'</td>
                                <input type="hidden" name="id_taixe" value="' . $rs_taixe_khac['id'] . '">
                                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                                <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                            </tr>
                            ';
                        }
                        else{
                            $thead = '
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="5">Thông tin tài xế có thể thực hiện đơn ngày '.$thoigian_donhanghientai[0].'</th>
                                </tr>
                            
                                <tr>
                                <th>Tên tài xế </th>
                                <th>Số điện thoại tài xế </th>
                                <th>Thời gian có chuyến </th>
                                
                                <th>Action </th>
                                </tr>
                            </thead>';
                            $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Tài xế có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                            if($thoigianban_taixe == '')
                            {
                                $thoigianban_taixe ='Không có chuyến';
                            }
                            $ds .= ' 
                            <tr>
                                <td>' . $rs_taixe_khac['name_taixe'] . ' ' . $icon . '</td>
                                <td>' . $rs_taixe_khac['phone_taixe'] . '</td>
                                <td>'.$thoigianban_taixe.'</td>
                            
                                <input type="hidden" name="id_taixe" value="' . $rs_taixe_khac['id'] . '">
                                <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                                <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_taixe_khac['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                            </tr>
                            ';
                        }

                    
                    }
                };



            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Mã đơn: '.$oClass->id_decode($_POST['id_donhang']).'</span><br>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Ngày: '.$rs_donhang['thoigian_giaohang'].'</span>
                <div class="list_luongnhansu">
                <div class="table"> 
                    <table >
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="2">Thông tin tài xế đang phụ trách</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td  class="first">Họ và tên:</td>
                                <td>' . $rs_taixe['name_taixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Hạng bằng lái:</td>
                                <td>' . $rs_taixe['hangbanglai'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Số điện thoại:</td>
                                <td>' . $rs_taixe['phone_taixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Địa chỉ:</td>
                                <td>' . $rs_taixe['address_taixe'] . '</td>
                            </tr>
                            <input type="hidden" name="id_phuxe" value="' . $rs_taixe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                <div class="search_phutrach '.$remove.'">
                    <input class="search_phutrach-input '.$class_search.'"  type="text" name="search_phutrach-input" id="search_phutrach-input" placeholder ="Nhập tên hoặc số điện thoại để điều tài xế khác"> 
                </div>
                <div class="result_search-phutrach '.$remove.'">
                    <ul>
                    
                    </ul>
                </div>
                <div class="table '.$remove.'"> 
                    <table >
                            
                            '.$thead.'
                            <tbody>
                            '.$ds.'
                            </tbody>
                    </table>
                </div>
                <div class="table '.$remove.'"> 
                    <table >
                          
                            '.$thead_ban.'
                            <tbody>
                            '.$ds_ban.'
                            </tbody>
                    </table>
                </div>
                <script type="text/javascript" src="template/Default/js/main_load.js"></script>
                </div>
              
            </div>
        ';
        } else if ($_POST['name_phutrach'] == 'phuxe') {
            $class_search ='phuxe_search-input';
            $title = 'Phụ xe';
            $name_phutrach = "'phuxe'";
            $list_phuxe = $oContent->view_table("php_nhansu", "position_id= 5 AND id=" . $_POST['id_phutrach']);
            $rs_phuxe = $list_phuxe->fetch();

            $phuxe_khac = $oContent->view_table("php_nhansu", "position_id= 5 ");
            while ($rs_phuxe_khac = $phuxe_khac->fetch()) {
                if ($rs_phuxe_khac['id'] != $_POST['id_phutrach']) {
                    $icon = '';
                    
                    //danh sách thời gian tài xế đó bận
                    $thoigian_phuxeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_nhansu = ".$rs_phuxe_khac['id']." AND active =0");
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
                    if(in_array($rs_phuxe_khac['id'],$arr_phuxedangban))
                    {
                        $thead_ban = '
                        <thead>
                            <tr class="title-table">
                                <th class="" colspan="5">Thông tin phụ xe có chuyến vào ngày '.$thoigian_donhanghientai[0].'</th>
                            </tr>
                       
                            <tr>
                            <th>Tên người phụ xe </th>
                            <th>Số điện thoại </th>
                            <th>Ngày có chuyến </th>
                            <th>Action </th>
                            </tr>
                        </thead>';

                        $title_ban = '<div style="color:red;font-size:16px"> <h4>Phụ xe đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                        $ds_ban .= ' 
                        <tr>
                            <td>' . $rs_phuxe_khac['name'] . ' ' . $icon . '</td>
                            <td>' . $rs_phuxe_khac['phone'] . '</td>
                            <td>'.$thoigianban_phuxe.'</td>
                            <input type="hidden" name="id_phuxe" value="' . $rs_phuxe_khac['id'] . '">
                                    <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                            <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                        </tr>
                        ';
                    }
                    else{
                        $thead = ' 
                        <thead>
                            <tr class="title-table">
                                <th class="" colspan="5">Thông tin phụ xe có thể thực hiện đơn ngày '.$thoigian_donhanghientai[0].'</th>
                            </tr>
                        
                            <tr>
                            <th>Tên người phụ xe </th>
                            <th>Số điện thoại </th>
                            <th>Chức vụ </th>
                            <th>Action </th>
                            </tr>
                        </thead>';
                        $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Phụ xe có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                        if($thoigianban_phuxe == '')
                        {
                            $thoigianban_phuxe ='Không có chuyến';
                        }
                        $ds .= ' 
                                <tr>
                                    <td>' . $rs_phuxe_khac['name'] . ' ' . $icon . '</td>
                                    <td>' . $rs_phuxe_khac['phone'] . '</td>
                                    <td>'.$thoigianban_phuxe.'</td>
                                    <input type="hidden" name="id_phuxe" value="' . $rs_phuxe_khac['id'] . '">
                                    <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                                    <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_phuxe_khac['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                                </tr>
                                ';
                    }

                    
                }
            };

            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Mã đơn: '.$oClass->id_decode($_POST['id_donhang']).'</span>
                <br>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Ngày: '.$rs_donhang['thoigian_giaohang'].'</span>
                <div class="list_luongnhansu">
                <div class="table"> 
                    <table >
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="2">Thông tin phụ xe đang phụ trách</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td  class="first">Họ và tên:</td>
                                <td>' . $rs_phuxe['name'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Ngày tháng năm sinh:</td>
                                <td>' . $rs_phuxe['dateofbirth'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Số điện thoại:</td>
                                <td>' . $rs_phuxe['phone'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Chức vụ:</td>
                                <td>' . $rs_phuxe['position'] . '</td>
                            </tr>
                            <input type="hidden" name="id_phuxe" value="' . $rs_phuxe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    </table>
                </div>
                </div>
                <div class="search_phutrach '.$remove.'">
                    <input class="search_phutrach-input '.$class_search.'"  type="text" name="search_phutrach-input" id="search_phutrach-input" placeholder ="Nhập tên hoặc số điện thoại để điều người phụ xe khác"> 
                </div>
                <div class="result_search-phutrach '.$remove.'">
                    <ul>
                    
                    </ul>
                </div>
                <div class="table '.$remove.'"> 
                <table >
                       
                        '.$thead.'
                        <tbody>
                        '.$ds.'
                        </tbody>
                </table>
            </div>
            <div class="table '.$remove.'"> 
                <table >
                        
                        '.$thead_ban.'
                        <tbody>
                        '.$ds_ban.'
                        </tbody>
                </table>
            </div>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            </div>
        ';


            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str,

                )
            ));
            exit;
        } else if ($_POST['name_phutrach'] == 'doixe') {
            $class_search ='doixe_search-input';
            $title = 'Đội xe';
            $name_phutrach = "'doixe'";

            $list_doixe = $oContent->view_table("php_doixe", "active= 1 AND id=" . $_POST['id_phutrach']);

            $rs_doixe = $list_doixe->fetch();
            //xử lý tên tài xế
            if ($rs_doixe['id_taixe'] != 0) {
                $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe['id_taixe']);
                $rstaixe = $taixe->fetch();
                $rs_doixe['name_taixe'] = $rstaixe['name_taixe'];
            } else {
                $rs_doixe['name_taixe'] = 'Không có tài xế phụ trách';
            }

            $doixe_khac = $oContent->view_table("php_doixe");
            while ($rs_doixe_khac = $doixe_khac->fetch()) {
                if ($rs_doixe_khac['id'] != $_POST['id_phutrach']) {
                    $icon = '';
                   
    
                      //danh sách thời gian đội xe xe đó bận
                      $thoigian_doixeban = $model->db->query("SELECT thoigian_giaohang FROM php_donhangroi WHERE id_doixe = ".$rs_doixe_khac['id']." AND active =0");
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

                      if(in_array($rs_doixe_khac['id'],$arr_doixedangban))
                      {
                          $thead_ban = ' 
                          <thead>
                          <tr class="title-table">
                              <th class="" colspan="5">Thông tin Xe có chuyến vào ngày '.$thoigian_donhanghientai[0].'</th>
                          </tr>
                      
                          <tr>
                          <th>Loại xe </th>
                          <th>Biển số xe </th>
                          <th>Tài xế phụ trách</th>
                          <th>Thời gian có chuyến</th>
    
                          <th>Action </th>
                          </tr>
                          </thead>
                          ';
                             //xử lý tên tài xế
                            if ($rs_doixe_khac['id_taixe'] != 0) {
                                $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe_khac['id_taixe']);
                                $rstaixe = $taixe->fetch();
                                $rs_doixe_khac['name_taixe'] = $rstaixe['name_taixe'];
                            } else {
                                $rs_doixe_khac['name_taixe'] = 'Không có tài xế phụ trách';
                            }
      
                          $title_ban = '<div style="color:red;font-size:16px"> <h4>Xe đã có chuyến vào ngày '.$thoigian_donhanghientai[0].' </h4></div>';
                          $ds_ban .= ' 
                          <tr>
                              <td>' . $rs_doixe_khac['loaixe'] . ' ' . $icon . '</td>
                              <td>' . $rs_doixe_khac['biensoxe'] . '</td>
                              <td>' . $rs_doixe_khac['name_taixe'] . '</td>
                              <td>'.$thoigianban_doixe.'</td>
                              <input type="hidden" name="id_taixe" value="' . $rs_doixe_khac['id_taixe'] . '">
                              <input type="hidden" name="id_doixe" value="' . $rs_doixe_khac['id'] . '">
                              <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                              <td class="center"><a class="button" style="background-color: #445656" disabled="disabled" >Điều lệnh</a></td>
                          </tr>
                          ';
                      }else{
                            $thead = '
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="5">Thông tin Xe có thể thực hiện đơn ngày '.$thoigian_donhanghientai[0].'</th>
                                </tr>
                            
                            <tr>
                            <th>Loại xe </th>
                            <th>Biển số xe </th>
                            <th>Tài xế phụ trách</th>
                            <th>Thời gian có chuyến</th>
                            <th>Action </th>
                            </tr></thead>';
                         //xử lý tên tài xế
                            if ($rs_doixe_khac['id_taixe'] != 0) {
                                $taixe = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs_doixe_khac['id_taixe']);
                                $rstaixe = $taixe->fetch();
                                $rs_doixe_khac['name_taixe'] = $rstaixe['name_taixe'];
                            } else {
                                $rs_doixe_khac['name_taixe'] = 'Không có tài xế phụ trách';
                            }
                            //
                            $title_khongban = '<div style="color:#39c449;padding:10px;font-size:16px"> <h4> Xe có thể chạy vào thời gian '.$thoigian_donhanghientai[0].' </h4></div>';
                            if($thoigianban_doixe == '')
                            {
                                $thoigianban_doixe ='Không có chuyến';
                            }
                            $ds .= ' 
                        <tr>
                            <td>' . $rs_doixe_khac['loaixe'] . ' ' . $icon . '</td>
                            <td>' . $rs_doixe_khac['biensoxe'] . '</td>
                            <td>' . $rs_doixe_khac['name_taixe'] . '</td>
                            <td>'.$thoigianban_doixe.'</td>
                            <input type="hidden" name="id_taixe" value="' . $rs_doixe_khac['id_taixe'] . '">
                            <input type="hidden" name="id_doixe" value="' . $rs_doixe_khac['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                            <td class="center"><a class="button" onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs_doixe_khac['id'] . ',' . $name_phutrach . ')">Điều lệnh</a></td>
                        </tr>
                        ';
                      }
                }
            };

            $str .= '
            <div class="pop-up">
                <h2> Thông tin ' . $title . ' phụ trách   <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Mã đơn: '.$oClass->id_decode($_POST['id_donhang']).'</span>
                <br>
                <span class="color-0" style="text-align:center;display: block;font-size: 16px;">Ngày: '.$rs_donhang['thoigian_giaohang'].'</span>
                <div class="list_luongnhansu">
                <div class="table"> 
                    <table>
                            <thead>
                                <tr class="title-table">
                                    <th class="" colspan="2">Thông tin xe đang phụ trách</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td  class="first">Loại xe:</td>
                                <td>' . $rs_doixe['loaixe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Biển số xe:</td>
                                <td>' . $rs_doixe['biensoxe'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Tải trọng xe:</td>
                                <td>' . $rs_doixe['tai_trong'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Số khối xe:</td>
                                <td>' . $rs_doixe['so_khoi'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Hạn đăng kiểm:</td>
                                <td class="color-0" >' . $rs_doixe['han_dang_kiem'] . '</td>
                            </tr>
                            <tr>
                                <td  class="first">Tên tài xế phụ trách xe:</td>
                                <td>' . $rs_doixe['name_taixe'] . '</td>
                            </tr>
                           
                            <input type="hidden" name="id_phuxe" value="' . $rs_doixe['id'] . '">
                            <input type="hidden" name="id_donhang" value="' . $_POST['id_donhang'] . '">
                           
                        </tr>
                            </tbody>
                    </table>
                </div>
                </div>
                <div class="search_phutrach '.$remove.'">
                    <input class="search_phutrach-input '.$class_search.'"  type="text" name="search_phutrach-input" id="search_phutrach-input" placeholder ="Nhập tên hoặc số điện thoại để điều xe khác"> 
                </div>
                <div class="result_search-phutrach '.$remove.'">
                    <ul>
                    
                    </ul>
                </div>
                <div class="table '.$remove.'"> 
                <table >
                       
                        '.$thead.'
                        <tbody>
                        '.$ds.'
                        </tbody>
                </table>
            </div>
            <div class="table '.$remove.'"> 
                <table >
                       
                        '.$thead_ban.'
                        <tbody>
                        '.$ds_ban.'
                        </tbody>
                </table>
            </div>
            <script type="text/javascript" src="template/Default/js/main_load.js"></script>
            </div>
        ';
        }

        //html chung 

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
