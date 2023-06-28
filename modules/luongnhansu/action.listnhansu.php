<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    if( $_POST['data'] !=  '0' && $_POST['data2'] !=  '0')
    {

    
        $result = $oContent->view_table("php_luongnhansu", "`thang`=".$_POST['data']." AND nam = ".$_POST['data2']);
        $total = $result->num_rows();
        
       

        if($total == 0)
        {
            $nhansu = $oContent->view_table("php_nhansu");
            $num = 1;
            while($rs_nhansu = $nhansu->fetch()){
                if($rs_nhansu['position_id'] != 0 ){
                if($num%4==0){$rs_nhansu['fix'] = ' fix';};
                $str .= '   
                <div class="card '.$rs_nhansu['fix'].'">
                    <input class="check" type="checkbox" name = "nhansu['.$rs_nhansu['id'].']" >
                    <label class="color-1">'.$rs_nhansu['name'].'</label> <br>
                </div>
            ';
            $num++;
                }
            }
            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str
                )
            ));
        }
        else{
            $nhansu = $oContent->view_table("php_nhansu");
            $num = 1;
            $str ='';
            while($rs_nhansu = $nhansu->fetch()){
               

                $result_luongnhansu = $model->db->query("SELECT * FROM php_luongnhansu WHERE user_id =".$rs_nhansu['id']."  AND`thang`=".$_POST['data']." AND nam = ".$_POST['data2']." LIMIT 1");
                $total_nhansu = $result_luongnhansu->num_rows();
                
                if($total_nhansu == 0)
                {
                    if($rs_nhansu['position_id'] != 0 ){
                       
                  
                        if($num%4==0){$rs_nhansu['fix'] = ' fix';};
                        $str .= '   
                            <div class="card '.$rs_nhansu['fix'].'">
                                <input class="check" type="checkbox" name = "nhansu['.$rs_nhansu['id'].']" >
                                <label class="color-1">'.$rs_nhansu['name'].'</label> <br>
                            </div>
                        ';
                        $num++;
                    }
                }
            }
            if($str == '')
            {
                $str = 'Đã tạo bảng lương cho tất cả nhân viên của tháng '.$_POST['data'].' năm ' .$_POST['data2'] ;  
                die(json_encode(
                    array(
                        'status' => 0,
                        'str' => $str
                    )
                ));
            }
            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str
                )
            ));

        }
    }
    else{
        $str = 'Vui lòng chọn cả năm và tháng';

        die(json_encode(
            array(
                'status' => 0,
                'str' => $str
            )
        ));
    }
}