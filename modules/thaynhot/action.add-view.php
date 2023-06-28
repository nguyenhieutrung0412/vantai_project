<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

   


    $module = "'thaynhot'";
  
    $add_line = "'add'";
    $add_taixe = "'gettaixe-view'";
    $add_xe = "'getxe-view'";
    $add_donvi = "'getdonvi-view'";
    $frm = "'frmUpdatetheodoisuachua'";

    $img_file = "'img_file'";
   
    $stt = 1;
   


    $str = '
        <div class="pop-up">
        <h3>Màn hình nhập liệu theo dõi thay nhớt</h3>
        <form name="frmUpdatetheodoisuachua" autocomplete="off" id="frmUpdatetheodoisuachua" method="post" onsubmit = "return add(' . $module . ',' . $add_line . ',' . $frm . ','.$img_file.')"  enctype="multipart/form-data">
        
        <table class="table-input">
        <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Ngày thay nhớt</th>
                          
                            <th>Tên tài xế</th>
                            <th>Biển số xe</th>
                            <th>Đơn vị sửa chữa</th>
                            <th>Km lúc thay nhớt</th>
                            <th>Nội dung</th>
                            <th>Tổng tiền</th>
                            <th>Upload</th>
                           
                            <th>#</th>
                        </tr>

                    </thead>
        <tbody class="add-thaynhot">
            <tr>
                <td>'.$stt.'</td>
                <td><input type="text" class="picker"  name="data['.$stt.'][ngay_thaynhot]"  required></td>
                <td> 
                    <input type="text" name="data['.$stt.'][tentaixe]" class="btn-phi" id="data_ten'.$stt.'"  onclick="return load_dulieu('.$module.','.$add_taixe.','.$stt.')">
                    <input type="hidden" name="data['.$stt.'][id_taixe]" id="data_id'.$stt.'" >
                </td>
                <td> 
                    <input type="text" name="data['.$stt.'][biensoxe]" class="btn-phi" id="biensoxe'.$stt.'"  onclick="return load_dulieu('.$module.','.$add_xe.','.$stt.')">
                    <input type="hidden" name="data['.$stt.'][id_xe]" id="idxe'.$stt.'" >
                </td>
                <td> 
                    <input type="text" name="data['.$stt.'][ten_donvi]" class="btn-phi" id="ten_donvi'.$stt.'"  onclick="return load_dulieu('.$module.','.$add_donvi.','.$stt.')">
                    <input type="hidden" name="data['.$stt.'][id_donvi]" id="id_donvi'.$stt.'" >
                </td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][km_luc_thaynhot]"  required></td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][noidung]"  required></td>
                <td><input type="text" class=" " id="" name="data['.$stt.'][tong_tien]"  required></td>
                <td><input type="file" name="data['.$stt.'][img_file]" id="img_file" value="" multiple accept= "image/*,.pdf" ></td>
                <td><a class=" color-0 btn_delete_line" href="javascript:void(0)" > <i class="fa-solid fa-trash icon-delete"></i></a></td>
            </tr>
          
           
            
        </tbody>
        </table>
        
        
      
          
            <div class="addline">
                <a href="javascript:void(0)" class="btn-add-thaynhot" >Thêm dòng</a>
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
