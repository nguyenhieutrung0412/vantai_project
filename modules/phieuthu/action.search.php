<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['ma_phieuthu'] != '')
    {
        
        $result = $oContent->view_table("php_phieuthu", "`id`=".$_POST['ma_phieuthu']."  LIMIT 1");
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

            $result2 = $oContent->view_table("php_loaithu", "`id`=".$rs['loai_thu']." LIMIT 1");
            $rs2 = $result2->fetch();

            $action = "'phieuthu'";
            $module= "'info'";
            $module2= "'active'";
            $module3= "'print-phieuthu'";
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
                            <td>'.$rs2['loaithu'].'</td>
                            <td  class="color-1 info" onclick="return info('.$action.','.$module.','.$rs['id_security'].')">'.$rs['name_nguoithu'].'</td>
                            <td>'.$rs['diachi_nguoithu'].'</td>
                            <td>'.$rs['phone_nguoithu'].'</td>
                            <td>'.$rs['ngaytao_phieuthu'].'</td>
                            <td>'.$rs['sotien_thu'].'</td>
                            <td>'.$rs['noidung_thu'].'</td>
                            <td>'.$rs['tennguoitao_thu'].'</td>
                        
                            <td class="{detail.color-red}">'.$rs['ngaygio_xetduyet'].'</td>
                            <td class="active" ><a '.$rs['active'].'  onclick="return active_user('.$action.','.$module2.','.$rs['id_security'].')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select2">
                                <a class ="print" onclick="return Print('.$action.','.$module3.','.$rs['id_security'].')"><i class="fa-solid fa-print"></i></a>
                                <a class="btn-update  {xuly.sua} '.$rs['edit_delete'].'"  onclick="return update_view('.$action.','.$module4.','.$rs['id_security'].')" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" '.$rs['edit'].'  '.$rs['edit_delete'].'" onclick="return popup()"> <i class="fa-solid fa-pen-to-square"></i></a>
                                <a class=" {xuly.xoa} '.$rs['edit_delete'].'" onclick= "return _delete('.$action.','.$module5.','.$rs['id_security'].')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
    
    }else{
        
        die(json_encode(
            array(
                'status' => 2,
                'msg' => 'Không tìm thấy mã này'
            )
           ));
    }
    die(json_encode(
        array(
            'status' => 0,
            'msg' => 'Không tìm thấy mã này'
        )
       ));

}
