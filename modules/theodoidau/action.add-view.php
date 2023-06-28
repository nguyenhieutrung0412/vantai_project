<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

   


    $module = "'theodoidau'";
  
    $add_line = "'add'";
    $add_taixe = "'gettaixe-view'";
    $add_xe = "'getxe-view'";
    $frm = "'frmUpdatetheodoidau'";

    $img_file = "'img_file'";
   
    $stt = 1;
   
//xử lý lấy số liệu dầu trước khi đổ

$dau = $oContent->view_table("php_theodoidau","msd_truockhido >= 0 ORDER BY msd_saukhido DESC LIMIT 1");
$rs_dau = $dau->fetch();
//end

    $str = '
        <div class="pop-up">
        <h3>Màn hình nhập liệu theo dõi dầu</h3>
        <form name="frmUpdatetheodoidau" autocomplete="off" id="frmUpdatetheodoidau" method="post" onsubmit = "return add(' . $module . ',' . $add_line . ',' . $frm . ','.$img_file.')"  enctype="multipart/form-data">
        <div class="table table_scroll">
        <table class="table-input ">
        <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Ngày đổ dầu</th>
                            <th>Thời gian</th>
                            <th>Tên tài xế</th>
                            <th>Biển số xe</th>
                            <th>Km lúc đổ</th>
                            <th>Số lít</th>
                            <th>Nguồn dầu</th>
                            <th>Mã số dầu sau khi đổ</th>
                            <th>Đơn giá</th>
                            <th>Upload</th>
                           
                            <th>#</th>
                        </tr>

                    </thead>
        <tbody class="add-theodoidau">
            <tr>
                <td>'.$stt.'</td>
                <td><input type="text" class=" picker"  name="data['.$stt.'][ngay_do]"  required></td>
                <td>
                    <input type="number" max="24" min="0" class="time_input2" id="" name="data['.$stt.'][gio_do]"  placeholder ="giờ" required>
                    <br>
                    <br>
                    <input type="number" max="59" min="0" class="time_input2" id="" name="data['.$stt.'][phut_do]" value="00" placeholder ="phút"  required></td>
                <td> 
                    <input type="text" name="data['.$stt.'][tentaixe]" class="btn-phi" id="data_ten'.$stt.'"  onclick="return load_dulieu('.$module.','.$add_taixe.','.$stt.')">
                    <input type="hidden" name="data['.$stt.'][id_taixe]" id="data_id'.$stt.'" >
                </td>
                <td> 
                    <input type="text" name="data['.$stt.'][biensoxe]" class="btn-phi" id="biensoxe'.$stt.'"  onclick="return load_dulieu('.$module.','.$add_xe.','.$stt.')">
                    <input type="hidden" name="data['.$stt.'][id_xe]" id="idxe'.$stt.'" >
                </td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][km_luc_do]"  required></td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][so_lit]"  required></td>
                <td><select name ="data['.$stt.'][dau_ngoai]" id="daungoai_'.$stt.'" onchange="return GETMSD('.$stt.',this.value)">
                <option value="0" >Dầu nhà</option>
                <option value="1" >Dầu ngoài</option>
                </select></td>
               <input type="hidden" class=" " id="msd_truockhido_'.$stt.'" name="data['.$stt.'][msd_truockhido]" value="'.$rs_dau['msd_saukhido'].'">
                <td><input type="text" class=" " id="msd_saukhido_'.$stt.'" name="data['.$stt.'][msd_saukhido]" value="'.$rs_dau['msd_saukhido'].'"></td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][don_gia]"  required></td>
                <td><input type="file" name="data['.$stt.'][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td>
                <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" ></a></td>
            </tr>
          
           
            
        </tbody>
        </table>
        </div>
        
        
      
          
            <div class="addline">
                <a href="javascript:void(0)" class="btn-add-theodoidau" >Thêm dòng</a>
            </div>
            <div class="btn-submit">
                
                <button type="submit" class="submit">Cập nhật</button>
                <button type="reset" onclick="return cancel()" class="cancel">Đóng</button>
            </div>
        </form>
        </div>
        
        <script type="text/javascript" src="template/Default/js/main_load.js"></script>
        <script>
        $( function() {
                  
            $( ".picker" ).datepicker({
                dateFormat: "dd/m/yy"
            });
            $( "#datepicker2" ).datepicker({
                dateFormat: "dd/m/yy"
            });
            $(".btn-upload").on("click", function() {
                $(".popup-upload-img").toggleClass("in");
            })
        });
        </script>
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
            'status' => 2,
            'str' => '(2) Lỗi: không tồn tại thông tin'
        )
    ));
}
exit;
