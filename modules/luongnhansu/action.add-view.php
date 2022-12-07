<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  
    $module = "'luongnhansu'";
    $add = "'add'";
    $frm = "'frmAddluongnhansu'";
    $img_file = 1;
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    $result3 = $oContent->view_table("php_nhansu");
    while($rs3 = $result3->fetch()){
        $nhansu .= ' <option value="'.$rs3['id'].'" >'.$rs3['name'].'</option>';
    }

    $listnhansu = "'listnhansu'";
    $idSelectThang = "'thang'";
    $idSelectNam = "'nam'";
    for($i = 1;$i<=12;$i++)
    {
        $thang_list .= '<option value="'.$i.'">Tháng '.$i.'</option>';
    }


        $prev_nam = date("Y") - 1;
        $next_nam = date("Y") + 1;
    
        $nam_list = '
        <option value="'.$prev_nam.'">Năm '.$prev_nam.'</option>    
        <option value="'.date("Y").'">Năm '.date("Y").'</option>    
        <option value="'.$next_nam.'">Năm '.$next_nam.'</option>    
        ';
    
        $str = '
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddluongnhansu" id="frmAddluongnhansu" method="post" onsubmit = "return add('.$module.','.$add.','.$frm.',1)"  enctype="multipart/form-data">
                <div class="select_filter">
                    <div class="card">
                        <select name="thang" id="thang"  onchange="return onchangeDateSelect('.$module.','.$listnhansu.','.$idSelectThang.','.$idSelectNam.');">
                            <option value="0">---Chọn tháng---</option>
                            '.$thang_list.'
                        </select>
                    </div>
                    <div class="card fix">
                        <select  name="nam" id="nam" onchange="return onchangeDateSelect('.$module.','.$listnhansu.','.$idSelectThang.','.$idSelectNam.');">
                            <option value="0">---Chọn năm---</option>
                           '.$nam_list.'
                        </select>
                    </div>
                </div>
                <div class="card_all">
                    <input type="checkbox" name ="checkbox-all" id="checkbox-all" onclick="return check_All();" >
                    <label class="color-0">Chọn tất cả</label> <br>
                
                </div>
                <div class="list_nhansu">
                </div>
                <div class="status">
                </div>

                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Tạo bảng lương</button>
                    <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
                </div>
            </form>
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
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
       ));
}
exit;