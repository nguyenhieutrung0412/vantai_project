<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $module = "'khohang'";

   $action = "'xacnhandonhangnhan'";


   $frm = "'frmAddupload'";
   $img_file = "'img_file'";

   $id = $oClass->id_decode($_POST['id']);
   $id_security = $oClass->id_encode($id);
    $str = '
    <div class="pop-up">
    <span class="close_pop">×</span>
    <h2>Hình ảnh xác nhận</h2>
    <form name="frmAddupload" id="frmAddupload" method="post" onsubmit = "return add('.$module.','.$action.','.$frm.','.$img_file.')"  enctype="multipart/form-data">
       
    <table class="table-input">
    <tbody>
        <tr>
            <td class="td-first">Ghi chú nội dung nhận</td>
            <td><input type="text"  name="ghichu_nhanhang" id="ghichu_nhanhang"  ></td>
        </tr>
        <tr>
            <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
           <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
        </tr>
      
       


    </tbody>
    </table>
       <input type="hidden" name="id" value="'.$id_security.'">
       <div class="btn-submit">
           
           <button type="submit" class="submit">Xác nhận</button>
           <button type="reset" onclick="return cancel2()"  class="cancel">Đóng</button>
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
}