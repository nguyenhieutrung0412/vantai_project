<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $module = "'donhangroi'";
        $action = "'dieulenh-update'";
        //lấy dữ liệu của đơn hàng
        $id = $oClass->id_decode($_POST['id_donhang']);
        $donhang = $oContent->view_table("php_donhangroi","id=".$id);
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
     
       
    if ($_POST['data'] != "") {
        $str_list = '';
        if($_POST['name'] == 'taixe')
        {
            $name_phutrach = "'taixe'";
            $tx_result =  $model->db->query("SELECT * FROM php_taixe WHERE name_taixe LIKE '%" . $_POST['data'] . "%' OR phone_taixe LIKE '%" . $_POST['data'] . "%'");
            $count = $tx_result->num_rows();
            while ($rs = $tx_result->fetch()) {
                if(in_array($rs['id'],$arr_taixedangban))
                {
                    $str_list .= '<li><a >' . $rs['name_taixe'] . ' - ' . $rs['phone_taixe'] . ' - <span class="color-0">Tài xế có đơn vào ngày: '.$thoigian_donhanghientai[0].' </span> <span class="click"> Chọn<span></a></li>';
                }
                else{
                    $str_list .= '<li><a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs['id'] . ',' . $name_phutrach . ')">' . $rs['name_taixe'] . ' - ' . $rs['phone_taixe'] . ' <span class="click"> Chọn<span></a></li>';
                }
                
            };

            if ($count > 0) {
                $str = '
                
                ';
               
                die(json_encode(
                    array(
    
                        'status' => 1,
                        'str' => $str,
                        'str_list' => $str_list,
                    )
                ));
            } else {
                $str_list = '
                
                    <li><div class="str color-0" >Không có tài xế trong danh sách!</div></li>
               
                
                ';
                die(json_encode(
                    array(
    
                        'status' => 2,
                        'str' => $str,
                        'str_list' => $str_list,
                        'msg' => 'Không có khách hàng tồn tại, hãy thêm khách hàng'
                    )
                ));
            }
        }
        elseif($_POST['name'] == 'phuxe'){
           
             $name_phutrach = "'phuxe'";
            $px_result =  $model->db->query("SELECT * FROM php_nhansu WHERE position_id = 5 AND (name LIKE '%" . $_POST['data'] . "%' OR phone LIKE '%" . $_POST['data'] . "%')");
            $count = $px_result->num_rows();
            while ($rs = $px_result->fetch()) {
                if(in_array($rs['id'],$arr_phuxedangban))
                {
                    $str_list .= '<li><a >' . $rs['name'] . ' - ' . $rs['phone'] . ' - <span class="color-0">Phụ xe có đơn vào ngày: '.$thoigian_donhanghientai[0].' </span> <span class="click"> Chọn<span></a></li>';
                }
                else{
                    $str_list .= '<li><a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs['id'] . ',' . $name_phutrach . ')">' . $rs['name'] . ' - ' . $rs['phone'] . ' <span class="click"> Chọn<span></a></li>';
                }
                
            };

            if ($count > 0) {
                $str = '
                
                ';
               
                die(json_encode(
                    array(
    
                        'status' => 1,
                        'str' => $str,
                        'str_list' => $str_list,
                    )
                ));
            } else {
                $str_list = '
                
                <div class="str color-0" >Không có phụ xe trong danh sách!</div>
               
                
                ';
                die(json_encode(
                    array(
    
                        'status' => 2,
                        'str' => $str,
                        'str_list' => $str_list,
                       
                    )
                ));
            }
        }
        elseif($_POST['name'] == 'doixe'){
             $name_phutrach = "'doixe'";
            $dx_result =  $model->db->query("SELECT * FROM php_doixe WHERE loaixe LIKE '%" . $_POST['data'] . "%' OR biensoxe LIKE '%" . $_POST['data'] . "%'");
            $count = $dx_result->num_rows();
            while ($rs = $dx_result->fetch()) {
                if(in_array($rs['id'],$arr_doixedangban))
                {
                    $str_list .= '<li><a >' . $rs['loaixe'] . ' - ' . $rs['biensoxe'] . ' - <span class="color-0">Xe có đơn vào ngày: '.$thoigian_donhanghientai[0].' </span> <span class="click"> Chọn<span></a></li>';
                }
                else{
                    $str_list .= '<li><a onclick="return dieulenh_update(' . $module . ',' . $action . ',' . $_POST['id_donhang'] . ',' . $rs['id'] . ',' . $name_phutrach . ')">' . $rs['loaixe'] . ' - ' . $rs['biensoxe'] . ' <span class="click"> Chọn<span></a></li>';
                }
                
            };

            if ($count > 0) {
                $str = '
                
                ';
               
                die(json_encode(
                    array(
    
                        'status' => 1,
                        'str' => $str,
                        'str_list' => $str_list,
                    )
                ));
            } else {
                $str_list = '
                
                <div class="str color-0" >Không có tài xế trong danh sách!</div>
               
                
                ';
                die(json_encode(
                    array(
    
                        'status' => 2,
                        'str' => $str,
                        'str_list' => $str_list,
                        'msg' => 'Không có khách hàng tồn tại, hãy thêm khách hàng'
                    )
                ));
            }
        }

       
   
        
    }
}
