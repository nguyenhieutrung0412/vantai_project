<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['ma_phieuchi'] != '')
    {
        $result = $oContent->view_table("php_phieuchi", "`id`=".$_POST['ma_phieuchi']."  LIMIT 1");
        $total = $result->num_rows();
        $rs = $result->fetch();
        if($total == 1)
        {

       
            $rs['id_security'] = $oClass->id_encode($rs['id']);
            if($rs['active'] == 0){
                $rs['active'] = ' class="active-account-die"';
                $rs['edit_delete'] = '';
            }
            else{
                $rs['active'] = ' class="active-account"';
                $rs['edit_delete'] = ' remove';
            }
            if($rs['ngaygio_xetduyet'] == ''){
                $rs['ngaygio_xetduyet'] = 'Chưa được xét duyệt';
            }
            
            if($xuly['xoa'] == ' remove')
            {
               
                $rs['delete'] = ' remove';
            }
            else{
                $rs['delete'] ='';
            }
            if($xuly['sua'] == ' remove')
            {
                $rs['edit'] = ' remove';
            }
            else{
                $rs['edit'] ='';
            }



            $result2 = $oContent->view_table("php_loaichi", "`id`=".$rs['loai_chi']." LIMIT 1");
            $rs2 = $result2->fetch();

            $action = "'phieuchi'";
            $module= "'info'";
            $module2= "'active'";
            $module3= "'print-phieuchi'";
            $module4= "'update-view'";
            $module5 = "'delete'";
            $str = '
            <div class="pop-up">
                <h2> Kết quả tìm kiếm    <a class="exit-btn" onclick="return cancel2()">Thoát</a></h2>
        
                <div class="table"> 
                    <table>
                            <thead>
                                <tr class="title-table">
                                <th>Mã phiếu thu</th>
                                <th>Tên loại thu</th>
                                <th>Tên người thu</th>
                                <th>Địa chỉ người thu</th>
                                <th>Số điện thoại người thu</th>
                                <th>Ngày giờ tạo phiếu</th>
                                <th>Số tiền thu</th>
                                <th>Nội dung để thu</th>
                                <th>Tên người tạo</th>
                                
                                <th>Ngày giờ được xét duyệt</th>                 
                                <th>Xét duyệt</th>
                                <th>Lựa chọn</th>
                                <tr>
                            <thead>
                            <tbody>
                            <tr>
                            <td>'.$rs['id'].'</td>
                            <td>'.$rs2['loai_chi'].'</td>
                            <td  class="color-1 info" onclick="return info('.$action.','.$module.','.$rs['id_security'].')">'.$rs['name_nguoinhan'].'</td>
                            <td>'.$rs['diachi_nguoinhan'].'</td>
                            <td>'.$rs['phone_nguoinhan'].'</td>
                            <td>'.$rs['ngaytao_phieuchi'].'</td>
                            <td>'.$rs['sotien_chi'].'</td>
                            <td>'.$rs['noidung_chi'].'</td>
                            <td>'.$rs['tennguoitao_chi'].'</td>
                        
                            <td class="{detail.color-red}">'.$rs['ngaygio_xetduyet'].'</td>
                            <td class="active" ><a '.$rs['active'].'  onclick="return active_user('.$action.','.$module2.','.$rs['id_security'].')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select2">
                                <a class ="print" onclick="return Print('.$action.','.$module3.','.$rs['id_security'].')"><i class="fa-solid fa-print"></i></a>
                                <a class="btn-update  '.$rs['edit'].' '.$rs['edit_delete'].'"  onclick="return update_view('.$action.','.$module4.','.$rs['id_security'].')" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" '.$rs['edit'].'  '.$rs['edit_delete'].'" onclick="return popup()"> <i class="fa-solid fa-pen-to-square"></i></a>
                                <a class=" '.$rs['delete'].' '.$rs['edit_delete'].'" onclick= "return _delete('.$action.','.$module5.','.$rs['id_security'].')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                            </tr>
                            </tbody>
                    <table>
                </div>
            </div>
            '; 
            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str
                )
               ));
        }
        else{
            die(json_encode(
                array(
                    'status' => 2,
                    'msg' => 'Không tìm thấy mã này'
                )
               ));
        }
    }
    die(json_encode(
        array(
            'status' => 2,
            'msg' => 'Không tìm thấy mã này'
        )
       ));

}
