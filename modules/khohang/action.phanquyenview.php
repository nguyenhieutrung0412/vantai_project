<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){

    $id = $oClass->id_decode($_POST['id']);

    $result = $oContent->view_table("php_kho", "`id`=".$id."  LIMIT 1");
    $rs = $result->fetch();
    $rs['id_security'] = $oClass->id_encode($rs['id']);

    //lấy tất cả id trực kho của kho có id đc chọn 
    $truckho = explode(',',$rs['truckho']);
     
    //danh sách trực kho 
    $count = count($truckho);
    if($count > 0)
    {
        for($i = 0;$i < $count;$i++){
            //tìm tên nhân viên trực kho
            $nv = $oContent->view_table("php_nhansu"," id = ".$truckho[$i]);
            while($rs_nv = $nv->fetch())
            {

                $list_truckho_hientai .= ' <label for="id_truckho_hientai_'.$truckho[$i].'"><input class="input-checkbox " type="checkbox" name="id_truckho_hientai[]" id="id_truckho_hientai_'.$truckho[$i].'" value="'.$truckho[$i].'" checked> '.$rs_nv['name'].'</label> ';
            }
             //end 
           
        }
    }
    //end danh sách trực kho
    //end 
    //danh sách nhân viên không có trực kho của id đc chọn
    $nhansu = $oContent->view_table("php_nhansu","position_id = 6");
    while($rs_nhansu = $nhansu->fetch())
    {
        if(!in_array($rs_nhansu['id'],$truckho))
        {
            $list_truckho_bosung .= '<label for="id_truckho_bosung_'.$rs_nhansu['id'].'"><input class="input-checkbox " type="checkbox" name="id_truckho_bosung[]" id="id_truckho_bosung_'.$rs_nhansu['id'].'" value="'.$rs_nhansu['id'].'" >  '.$rs_nhansu['name'].'</label> ';
        }
    }
    //end
  if($list_truckho_hientai == '')
  {
    $list_truckho_hientai = '<label class="color-0">Danh sách rỗng!!!</label>';
  }
  if($list_truckho_bosung == '')
  {
    $list_truckho_bosung = '<label class="color-0">Danh sách rỗng!!!</label>';
  }

    $module ="'khohang'";
    $action ="'update-phanquyen'";
    $form ="'frmUpdatequyen'";
   
        $str = '
        <div class="pop-up">
        
        <form name="frmUpdatequyen" id="frmUpdatequyen" method="post" onsubmit = "return _edit('.$module.','.$action.','.$form.',1)"  enctype="multipart/form-data">
           <table class="table-input">
            <h3>Danh sách trực kho: '.$rs['ten_kho'].' <label class="color-2">(Hiện tại)</label>  </h3>

                    <tbody>
                        <div class="checkbox-popup">
                        '.$list_truckho_hientai.'
                        </div>
                    </tbody>
            </table>
            <hr>
            <table class="table-input">
            <h3>Danh sách trực kho: '.$rs['ten_kho'].' <label class="color-0">(Bổ sung thêm)</label>  </h3>
                    <tbody>
                    <div class="checkbox-popup">
                        '.$list_truckho_bosung.'
                        </div>
                    </tbody>
            </table>
                <input type="hidden" name="id_kho" value="'.$rs['id_security'].'">
            <div class="btn-submit">
                
                <button type="submit" class="submit">Update</button>
                <button type="reset" onclick="return cancel2()" class="cancel">Đóng</button>
            </div>
        </form>

        </div>';
        die(json_encode(
            array(
                'status' => 1,
                'str' => $str,
                
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